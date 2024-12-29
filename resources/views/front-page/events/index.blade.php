<x-frontPage.layout>
  <x-slot:title>{{ $title }}</x-slot:title>
  <h2 class="text-3xl font-bold mb-2">{{ $title }}</h2>
  
  <form class="max-w mt-6 mb-6">
    <div class="flex">
      <div class="relative">
        <select id="select-category" class="block p-2.5 text-sm text-gray-900 bg-gray-50 border border-gray-300 rounded-s-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
          <option selected>All Category</option>
          @foreach($categories as $id => $category)
          <option value="{{ $id }}">{{ $category }}</option>
          @endforeach
        </select>
      </div>

      <div class="relative">
        <select id="select-type" class="block p-2.5 text-sm text-gray-900 bg-gray-50 border-t border-b border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
          <option selected>All Type</option>
          <option value="free">Free</option>
          <option value="fee">Fee</option>
        </select>
      </div>

      <div class="relative w-full">
          <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
              <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
              </svg>
          </div>
          <input type="search" id="search" class="ps-10 block p-2.5 w-full text-sm text-gray-900 bg-gray-50 border-t border-b border-gray-300 rounded-e-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white" placeholder="Search events..." required>
      </div>

    </div>
  </form>

  <section class="event">
    <div>
      <div class="grid grid-cols-1 gap-8">
        <ul class="space-y-10 md:space-y-16" id="event-list" > 
            @forelse($events as $event) 
            <li>
            <div class="flex flex-col justify-between gap-4 overflow-hidden md:flex-row md:gap-8">
              <div>
                <a class="focus-ring block transition hover:opacity-75 " href="{{ url('events/'. $event->slug) }}">
                  <img class="rounded aspect-video w-full bg-cover object-cover md:h-60 md:max-w-xl lg:h-80" alt="{{ $event->title }}" src="{{ getImages($event->images) }}">
                </a>
              </div>
              <div class="flex-1 shrink-0 space-y-4">
                <div>
                  <h3 class="text-3xl font-bold">
                    <a class="focus-ring transition hover:text-primary" href="{{ url('events/'. $event->slug) }}">{{ $event->title }}</a>
                  </h3>
                  <p>{{ Str::limit(strip_tags(html_entity_decode($event->description)), 200, '...') }}</p>
                </div>
                <p class="text-sm text-muted-foreground">
                  <span class="bg-blue-100 text-blue-800 text-md font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400">{{ $event->category->name }}</span>
                  <span class="bg-yellow-100 text-yellow-800 text-md font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-yellow-300 border border-yellow-300">{{ $event->is_paid ? 'Fee' : 'Free'}}</span>
                </p>
                <p class="text-sm text-muted-foreground">
                  <time>
                  <span>{{ formatDate($event->start_date) }}</span> s/d
                  <br>
                  <span class="text-muted-foreground">{{ formatDate($event->end_date) }}</span>
                  </time>
                </p>
                <p class="flex flex-row items-center gap-1">
                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="text-2xl iconify iconify--ph" width="1em" height="1em" viewBox="0 0 256 256">
                    <path fill="currentColor" d="M128 64a40 40 0 1 0 40 40a40 40 0 0 0-40-40m0 64a24 24 0 1 1 24-24a24 24 0 0 1-24 24m0-112a88.1 88.1 0 0 0-88 88c0 31.4 14.51 64.68 42 96.25a254.2 254.2 0 0 0 41.45 38.3a8 8 0 0 0 9.18 0a254.2 254.2 0 0 0 41.37-38.3c27.45-31.57 42-64.85 42-96.25a88.1 88.1 0 0 0-88-88m0 206c-16.53-13-72-60.75-72-118a72 72 0 0 1 144 0c0 57.23-55.47 105-72 118"></path>
                  </svg> {{ $event->location }}
                </p>
                <a class="bg-slate-300 inline-flex select-none items-center justify-center text-sm font-semibold ring-offset-background transition focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-secondary text-secondary-foreground hover:bg-secondary/80 h-8 gap-2 rounded-md px-3" href="{{ url('events/' . $event->slug) }}">View Event</a>
                @if($event->is_registration_open && (Auth::check() && Auth::user()->roles === 'Members' || Auth::guest()))
                <a class="bg-gray-800 text-white inline-flex select-none items-center justify-center text-sm font-semibold ring-offset-background transition focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-secondary text-secondary-foreground hover:bg-secondary/80 h-8 gap-2 rounded-md px-3" href="{{ url('events/'. $event->slug . '/register') }}">Registration Event</a>
                @endif
              </div>
            </div>
            </li> 
          @empty
          <h3 class="mb-10 sm:text-lg text-slate-400 text-center">There are no events again yet</h3>
          @endforelse 
        </ul>

        <div id="event-pagination" class="mt-8">
          {{ $events->links() }}
        </div>
        
      </div>
    </div>
  </section>

  @push('scripts')
  <script>
    $(function() {
        $('#search').on('input', function(event) {
            event.preventDefault();
            fetchEvents();
        });

        $('#select-category').on('change', function(event) {
            event.preventDefault();
            fetchEvents();
        });

        $('#select-type').on('change', function(event) {
            event.preventDefault();
            fetchEvents();
        });

        function fetchEvents() {
            let query = $('#search').val(); 
            let category = $('#select-category').val();
            let type = $('#select-type').val();
            
            $.ajax({
                url: "{{ route('events') }}", 
                type: 'GET', 
                data: { 
                    search: query, 
                    category: category, 
                    type: type 
                }, 
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
                },
                success: function(data) {
                    if(data.events == '') {
                        $('#event-list').html(`<h3 class="col-span-3 text-slate-400">No Events found with the applied filters</h3>`);
                        $('#event-pagination').html('');
                        return 0;
                    }
                    if (data.events) {
                        $('#event-list').html(data.events); 
                        $('#event-pagination').html(data.pagination);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching events:', error); 
                }
            });
        }
    });
  </script>
  @endpush
</x-frontPage.layout>