<x-frontPage.layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <h2 class="text-3xl font-bold mb-2">{{ $title }}</h2>
    <div class="grid grid-cols-1 pt-6 xl:grid-cols-3 xl:gap-4 dark:bg-gray-900">
        <div class="col-span-2">
            
            <div class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                <div class="flow-root">
                    <div class="space-y-2">
                        <img alt="{{ $event->title }}" src="{{ getImages($event->images) }}" class="select-none rounded-md bg-secondary mx-auto w-full max-w-4xl object-contain" width="900" height="450">
                        <section class="site-section flex flex-wrap justify-between gap-4">
                            <div>
                            </div>
                            <p class="text-xs text-muted-foreground">Updated <time>{{ formatDateUpdatedAt($event->updated_at) }}</time>
                            </p>
                        </section>
                        
                        <section class="site-header">
                            <h1 class="text-3xl font-bold mb-6">{{ $event->title }}</h1>    
                            <div class="space-y-4 md:space-y-2">
                            <p class="flex flex-col justify-between gap-1 md:flex-row md:gap-4">
                                <b class="md:basis-4/12">Category:</b>
                                
                                <span class="md:basis-8/12">
                                <span class="bg-blue-100 text-blue-800 text-md font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400">{{ $event->category->name }}</span>
                                    
                                </span>
                            </p>
                            
                            <p class="flex flex-col justify-between gap-1 md:flex-row md:gap-4">
                                <b class="md:basis-4/12">Start Date:</b>
                                <span class="md:basis-8/12">
                                <span class="text-muted-foreground">{{ formatDate($event->start_date) }}</span>
                            </p>
                            <p class="flex flex-col justify-between gap-1 md:flex-row md:gap-4">
                                <b class="md:basis-4/12">End Date:</b>
                                <span class="md:basis-8/12">
                                <span class="text-muted-foreground">{{ formatDate($event->end_date) }}</span>
                            </p>
                            <p class="flex flex-col justify-between gap-1 md:flex-row md:gap-4">
                                <b class="md:md:basis-4/12">Type:</b>
                                <span class="md:md:basis-8/12">
                                <span class="bg-yellow-100 text-yellow-800 text-md font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-yellow-300 border border-yellow-300">{{ $event->is_paid ? 'Fee' : 'Free'}}</span>
                                </span>
                            </p>
                            @if($event->is_paid)
                            <p class="flex flex-col justify-between gap-1 md:flex-row md:gap-4">
                                <b class="md:basis-4/12">Price:</b>
                                <span class="md:basis-8/12">
                                <span class="text-muted-foreground">{{ formatRupiah($event->price) }}</span>
                            </p>
                            @endif
                            
                            <p class="flex flex-col justify-between gap-1 md:flex-row md:gap-4">
                                <b class="md:basis-4/12">Location:</b>
                                <span class="md:basis-8/12">
                                <span class="text-muted-foreground">{{ $event->location }}</span>
                            </p>
                            
                            </div>
                        </section>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-span-full xl:col-auto">
            @if($paymentUser)
            <div class="w-full bg-white shadow-lg rounded-lg overflow-hidden mb-4">

                <div class="bg-gradient-to-r from-blue-500 to-indigo-600 p-6">
                    <h1 class="text-white text-2xl font-bold">PasundanDevFest</h1>
                    <p class="text-indigo-200 text-sm mt-1">{{ $paymentUser->event->title }}</p>
                </div>

                <div class="p-6 space-y-4">
                    <div class="flex justify-between items-center">
                        <h2 class="font-semibold text-gray-800">Ticket ID:</h2>
                        <span class="text-indigo-600 font-bold">{{ $paymentUser->payment_code }}</span>
                    </div>

                    <div class="flex justify-between items-center">
                        <h2 class="font-semibold text-gray-800">Name:</h2>
                        <span class="text-gray-700">{{ $paymentUser->member->fullname }}</span>
                    </div>

                    <div class="flex justify-between items-center">
                        <h2 class="font-semibold text-gray-800">Start Date:</h2>
                        <span class="text-gray-700">{{ formatDate($paymentUser->event->start_date) }}</span>
                    </div>

                    <div class="flex justify-between items-center">
                        <h2 class="font-semibold text-gray-800">End Date:</h2>
                        <span class="text-gray-700">{{ formatDate($paymentUser->event->end_date) }}</span>
                    </div>

                    <div class="flex justify-between items-center">
                        <h2 class="font-semibold text-gray-800">Price:</h2>
                        <span class="text-gray-700">{{ $paymentUser->event->price == 0 ? 'Free' : formatRupiah($paymentUser->event->price) }}</span>
                    </div>

                    <div class="flex flex-col">
                        <h2 class="font-semibold text-gray-800">Location:</h2>
                        <span class="text-gray-700">{{ $paymentUser->event->location }}</span>
                    </div>
                </div>

                <div class="border-t p-6">
                    <h2 class="font-semibold text-gray-800">Payment Status:</h2>
                    <div class="flex items-center mt-2">
                        <div class="w-3 h-3 rounded-full bg-{{ paymentStatus($paymentUser->payment_status) }}-500 mr-2"></div>
                        <span class="text-{{ paymentStatus($paymentUser->payment_status) }}-600 font-semibold">{{ $paymentUser->payment_status }}</span>
                    </div>
                </div>

                @if($paymentUser->payment_status == 'Success')

                <div class="border-t p-6 flex justify-center">
                    <img src="https://via.placeholder.com/100x100" alt="QR Code" class="w-24 h-24">
                </div>

                <div class="bg-gray-50 p-4 text-center">
                    <p class="text-sm text-gray-500">Please show this ticket at the entrance.</p>
                </div>
                @endif
            </div>
            @endif

            @if(isset($paymentUser))
            @if($paymentUser->payment_status != 'Success')
            <div class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                <div class="flow-root">
                    <div class="-my-3 divide-y divide-gray-200 dark:divide-gray-800">
                        <dl class="flex items-center justify-between gap-4 py-3">
                            <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Subtotal</dt>
                            <dd class="text-base font-medium text-gray-900 dark:text-white">{{ $event->price ? formatRupiah($event->price) : 'Free' }}</dd>
                        </dl>
                        <dl class="flex items-center justify-between gap-4 py-3">
                            <dt class="text-base font-bold text-gray-900 dark:text-white">Total</dt>
                            <dd class="text-base font-bold text-gray-900 dark:text-white">{{ $event->price ? formatRupiah($event->price) : 'Free' }}</dd>
                        </dl>
                    </div>
                </div>
                <div class="space-y-3 mt-4">
                    <form id="payment-form" action="{{ route('payments.store', $event->slug) }}" method="post">
                        @csrf
                        <button id="pay-button" type="submit" class="flex w-full items-center justify-center rounded-lg bg-primary-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4  focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Buy</button>
                                    
                    </form>
                </div>
            </div>
            @endif
            @else
            <div class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                <div class="flow-root">
                    <div class="-my-3 divide-y divide-gray-200 dark:divide-gray-800">
                        <dl class="flex items-center justify-between gap-4 py-3">
                            <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Subtotal</dt>
                            <dd class="text-base font-medium text-gray-900 dark:text-white">{{ $event->price ? formatRupiah($event->price) : 'Free' }}</dd>
                        </dl>
                        <dl class="flex items-center justify-between gap-4 py-3">
                            <dt class="text-base font-bold text-gray-900 dark:text-white">Total</dt>
                            <dd class="text-base font-bold text-gray-900 dark:text-white">{{ $event->price ? formatRupiah($event->price) : 'Free' }}</dd>
                        </dl>
                    </div>
                </div>
                <div class="space-y-3 mt-4">
                    <form id="payment-form" action="{{ route('payments.store', $event->slug) }}" method="post">
                        @csrf
                        <button id="pay-button" type="submit" class="flex w-full items-center justify-center rounded-lg bg-primary-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4  focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">{{ $event->price ? 'Buy' : 'Register Now' }}</button>
                                    
                    </form>
                </div>
            </div>
            @endif
        </div>
    </div>


    <div class="flex justify-between items-center">
        <a class="px-6 py-5 inline-flex select-none items-center justify-center text-sm font-semibold ring-offset-background transition focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-slate-200 text-secondary-foreground hover:bg-secondary/80 h-8 gap-2 rounded-md px-3" 
            href="{{ url('events/'. $event->slug) }}">
            <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" class="iconify iconify--ph mr-2" width="1em" height="1em" viewBox="0 0 256 256">
                <path fill="currentColor" d="M165.66 202.34a8 8 0 0 1-11.32 11.32l-80-80a8 8 0 0 1 0-11.32l80-80a8 8 0 0 1 11.32 11.32L91.31 128Z"></path>
            </svg>
            <span>Back</span>
        </a>
    </div>

    @push('scripts')
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
   
    <script type="text/javascript">
        let type = {{ $event->is_paid }}

        document.getElementById('payment-form').addEventListener('submit', function (e) {
            if(type == 1){
            e.preventDefault();
            $.post(this.action, $(this).serialize(), function (response) {
                snap.pay(response.snap_token, {
                    // Optional
                    onSuccess: function(result){
                        callback(result)
                    },
                    // Optional
                    onPending: function(result){
                        callback(result)
                    },
                    // Optional
                    onError: function(result){
                        callback(result)
                    },
                    onClose: function (result) {
                        callback(result)
                    },
                });
            });
            }
        });

        function callback(result)
        {
            fetch('/events/{{ $event->slug }}/callback', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify(result) 
            })
            .then(response => response.json())
            .then(data => {
                location.reload();
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
    </script>
    @endpush
</x-frontPage.layout>