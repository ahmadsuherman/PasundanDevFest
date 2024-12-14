<x-frontPage.layout>
    <x-slot:title>Event Detail - PasundanDev</x-slot:title>

    <h2 class="text-3xl font-bold mb-2">{{ $title }}</h2>
    
    <div class="site-container space-y-8 pt-10 sm:pt-10">
        <img src="{{ asset('storage/events/'. $event->images) }}" class="select-none rounded-md bg-secondary mx-auto w-full max-w-4xl object-contain" width="900" height="450">
        <section class="site-section flex flex-wrap justify-between gap-4">
            <div>
            </div>
            <p class="text-xs text-muted-foreground">Updated <time>{{ formatDateUpdatedAt($event->updated_at) }}</time>
            </p>
        </section>
        
        <header class="site-header">
            <h1 class="text-3xl font-bold mb-6">{{ $event->title }}</h1>    
            <div class="space-y-4 md:space-y-2">
            <p class="flex flex-col justify-between gap-1 md:flex-row md:gap-4">
                <b class="md:basis-4/12">Date and Time:</b>
                <span class="md:basis-8/12">
                <span>{{ $event->start_date }}</span>
                <br>
                <span class="text-muted-foreground">{{ $event->end_date }}</span>
                </span>
            </p>
            <p class="flex flex-col justify-between gap-1 md:flex-row md:gap-4">
                <b class="md:md:basis-4/12">Tipe:</b>
                <span class="md:md:basis-8/12">
                <span class="bg-yellow-100 text-yellow-800 text-md font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-yellow-300 border border-yellow-300">{{ $event->is_paid ? formatRupiah($event->price) : 'Gratis'}}</span>
                </span>
            </p>
            <p class="flex flex-col justify-between gap-1 md:flex-row md:gap-4">
                <b class="md:basis-4/12">Category:</b>
                <span class="md:basis-8/12">
                <span class="bg-blue-100 text-blue-800 text-md font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400">{{ $event->category->name }}</span>
                    
                </span>
            </p>
            <p class="flex flex-col justify-between gap-1 md:flex-row md:gap-4">
                <b class="md:basis-4/12">Location:</b>
                <span class="md:basis-8/12">
                <span class="text-muted-foreground">{{ $event->location }} lorem</span>
            </p>
            
            </div>
        </header>
        
        <section class="site-section">
            {!! $event->description !!}
        </section>
    
        <section>
            <h2 class="text-3xl font-bold mb-2">Speakers</h2>
            <div class="grid grid-cols-1 justify-items-center gap-5 sm:grid-cols-2 sm:justify-items-stretch md:grid-cols-3 md:gap-4 lg:gap-6 lg:grid-cols-4">
            @forelse($event->speakers as $key => $speaker)
            <div class="mx-auto flex w-full flex-col items-center gap-4 py-8 text-center md:px-8 md:py-4 lg:px-12">
                <img src="{{ asset($speaker->avatar) }}" alt="{{ $speaker->fullname }}" class="mb-4 inline-block h-40 w-40 rounded-full object-cover" />
                <p class="font-bold">{{ $speaker->fullname }}</p>
                <p class="text-center text-sm text-gray-500"> {{ $speaker->username }} </p>
            </div>
            @empty
            <h3 class="mb-10 sm:text-lg text-slate-400 text-center col-span-4">There are no speakers yet</h3>
            @endforelse
            </div>
        </section>

        <section>
            <h2 class="text-3xl font-bold mb-2">Member Participation</h2>
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gray-50 dark:bg-gray-800">
                    <tr>
                        <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            Registration Date
                        </th>

                        <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            Members
                        </th>

                        <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            Status
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                    @forelse($event->members as $members)
                    <tr>
                        <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">{{ formatDate($members->pivot->created_at) }}</td>
                        
                        <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                            <div class="flex items-center gap-x-2">
                                <img class="object-cover w-8 h-8 rounded-full" src="{{ $members->avatar }}" alt="{{ $members->fullname }}">
                                <div>
                                    <h2 class="text-sm font-medium text-gray-800 dark:text-white ">{{ $members->fullname }}</h2>
                                </div>
                            </div>
                        </td>

                        <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                            <div class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 text-{{ $members->pivot->payment_status ? 'emerald' : 'red' }}-500 bg-{{ $members->pivot->payment_status ? 'emerald' : 'red' }}-100/60 dark:bg-gray-800">
                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10 3L4.5 8.5L2 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>

                                <h2 class="text-sm font-normal">{{ $members->pivot->payment_status ? 'Paid' : 'Unpaid' }}</h2>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="p-4 text-center text-slate-400 text-sm">No members have registered yet</td>
                    </tr>
                    @endforelse
                    
                </tbody>
            </table>
        </section>

        <section class="site-section">
        <div class="flex justify-between items-center">
            <a class="px-6 py-5 inline-flex select-none items-center justify-center text-sm font-semibold ring-offset-background transition focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-slate-200 text-secondary-foreground hover:bg-secondary/80 h-8 gap-2 rounded-md px-3" 
                href="{{ url('events') }}">
                <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" class="iconify iconify--ph mr-2" width="1em" height="1em" viewBox="0 0 256 256">
                    <path fill="currentColor" d="M165.66 202.34a8 8 0 0 1-11.32 11.32l-80-80a8 8 0 0 1 0-11.32l80-80a8 8 0 0 1 11.32 11.32L91.31 128Z"></path>
                </svg>
                <span>All Events</span>
            </a>

            @if($event->is_registration_open)
            <a class="px-6 py-5 bg-gray-800 text-white inline-flex select-none items-center justify-center text-sm font-semibold ring-offset-background transition focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-secondary text-secondary-foreground hover:bg-secondary/80 h-8 gap-2 rounded-md px-3" 
                href="{{ url('events/'. $event->slug . '/register') }}">
                <span class="mr-2">Registration Event</span>
            </a>
            @endif
        </div>
        </section>
    </div>
</x-frontPage.layout>
