<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket ID {{ $paymentUser->payment_code }} - {{ $paymentUser->member->fullname }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            position: relative;
        }
        .container {
            padding: 20px;
            border: 1px solid #ddd;
            position: relative;
            overflow: hidden;
        }
        .header {
            text-align: center;
            background-color: #4f46e5;
            color: #fff;
            padding: 5px;
            border-radius: 5px;
        }
        .content {
            margin-top: 20px;
        }
        .content p {
            display: flex;
            justify-content: space-between;
        }
        .value {
            float: right;
        }
        .qr-code {
            text-align: center;
            margin-top: 20px;
        }
        .watermark {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            background-image: url('logoapp.png');
            background-repeat: repeat;
            /* background-position: center; */
            opacity: 0.1; 
        }
        .footer {
            text-align: center;
            margin-top: 20px;
        }
        .status{
            color: green;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="watermark"></div>
        <div class="header">
            <h1>PasundanDevFest</h1>
            <p>{{ $paymentUser->event->title }}</p>
        </div>
        <div class="content">
            <p><strong>Ticket ID:</strong> <span class="value">{{ $paymentUser->payment_code }}</span></p>
            <p><strong>Member:</strong> <span class="value">{{ $paymentUser->member->fullname }}</span></p>
            <p><strong>Category:</strong> <span class="value">{{ $paymentUser->event->category->name }}</span></p>
            <p><strong>Start Date:</strong> <span class="value">{{ formatDate($paymentUser->event->start_date) }}</span></p>
            <p><strong>End Date:</strong> <span class="value">{{ formatDate($paymentUser->event->end_date) }}</span></p>
            <p><strong>Price:</strong> <span class="value">{{ $paymentUser->event->price == 0 ? 'Free' : formatRupiah($paymentUser->event->price) }}</span></p>
            <p><strong>Location:</strong> <span class="value">{{ $paymentUser->event->location }}</span></p>
            <p><strong>Payment Status:</strong> <span class="value status">{{ $paymentUser->payment_status }}</span></p>
        </div>
        <div class="qr-code">
            <img src="data:image/png;base64,{{ $qrCodeBase64 }}" alt="QR Code" style="height: 150px;">
        </div>
        <div class="footer">
            <p>Please show this ticket at the entrance.</p>
        </div>
    </div>
</body>
</html>
