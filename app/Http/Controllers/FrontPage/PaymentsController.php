<?php

namespace App\Http\Controllers\FrontPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Midtrans\Snap;
use Midtrans\Config;
use App\Models\Payment;
use App\Models\Event;
use Carbon\Carbon;
use Exception;
use App\Models\EventMember;

class PaymentsController extends Controller
{
    public function __construct()
    {
        // Set konfigurasi Midtrans
        Config::$serverKey      = config('midtrans.server_key');
        Config::$clientKey      = config('midtrans.client_key');
        Config::$isProduction   = config('midtrans.is_production');
        Config::$isSanitized    = config('midtrans.is_sanitized');
        Config::$is3ds          = config('midtrans.is_3ds');
    }
    
    public function store(Request $request, $slug)
    {
        try {
            $event  = Event::where('slug', $slug)->firstOrFail();
            $user   = Auth()->user();
    
            $payment = Payment::where('event_id', $event->id)->where('member_id', $user->id)->first();
    
            if(!$payment) {
                $payment = Payment::create([
                    'event_id'          => $event->id,
                    'member_id'         => $user->id,
                    'payment_code'      => strtoupper(uniqid('PAY-')),
                    'amount'            => $event->price ?? 0,
                    'payment_date'      => Carbon::now(),
                    'payment_status'    => $event->is_paid == 1 ? 'Pending' : 'Success',
                ]);
            } else {
                $payment->update([
                    'payment_code'      => strtoupper(uniqid('PAY-')),
                ]);
            }

            $eventMember    = EventMember::where('event_id', $event->id)->where('member_id', $user->id)->first();
            $paymentStatus  = $this->setPaymentStatus($payment->payment_status);
    
            if(!$eventMember) {
                $eventMember = EventMember::create([
                    'event_id'          => $event->id,
                    'member_id'         => $user->id,
                    'payment_status'    => $paymentStatus
                ]);
            } else {
                $eventMember->update([
                    'payment_status'    => $paymentStatus
                ]);
            }
            
            if($event->is_paid == 1)
            {
                $params = [
                    'transaction_details' => [
                        'order_id'      => $payment->payment_code,
                        'gross_amount'  => $payment->amount,
                    ],
                    'customer_details' => [
                        'first_name'    => $user->fullname,
                        'email'         => $user->email,
                    ],
                ];
        
                $snapToken = Snap::getSnapToken($params);
                
                return response()->json([
                    'success' => true,
                    'snap_token' => $snapToken,
                ]);
            } else {
                return back()->with('success', "Congratulations, you have successfully registered for the event ");
            }
            
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        };
        
    }

    public function receiveCallback(Request $request, $slug)
    {
        try{
            $payload = $request->all();
            $signatureKey = hash('sha512', $payload['order_id'] . $payload['status_code'] . $payload['gross_amount'] . config('midtrans.server_key'));
    
            $payment = Payment::where('payment_code', $payload['order_id'])->first();
    
            if (!$payment) {
                return response()->json(['message' => 'Payment not found'], 404);
            }
    
            $status = $this->getPaymentStatus($payload['transaction_status']);
            $payment->update([
                'payment_status'        => $status,
                'payment_method'        => $payload['payment_type'] ?? $payment->payment_method,
            ]);
    
            $user           = Auth()->user();
            $event          = Event::where('slug', $slug)->first();
            $eventMember    = EventMember::where('event_id', $event->id)->where('member_id', $user->id)->first();
            $paymentStatus  = $this->setPaymentStatus($payment->payment_status);
    
            if(!$eventMember) {
                $eventMember = EventMember::create([
                    'event_id'          => $event->id,
                    'member_id'         => $user->id,
                    'payment_status'    => $paymentStatus
                ]);
            } else {
                $eventMember->update([
                    'payment_status'    => $paymentStatus
                ]);
            }
    
            return response()->json(['message' => 'Payment status updated successfully']);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        };
    }

    private function getPaymentStatus($midtransStatus)
    {
        switch ($midtransStatus) {
            case 'capture':
            case 'settlement':
                return 'Success';
            case 'pending':
                return 'Pending';
            case 'deny':
            case 'cancel':
            case 'expire':
                return 'Cancel';
            default:
                return 'Pending';
        }
    }

    private function setPaymentStatus($paymentStatus)
    {
        switch ($paymentStatus) {
            case 'Success':
                return '1';
            case 'Pending':
                return '2';
            default:
                return '0';
        }
    }
}
