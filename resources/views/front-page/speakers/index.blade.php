<x-frontPage.layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <section class="speakers">
        <div class="w-full-md">
            <h2 class="text-3xl font-bold mb-2">Community {{ $title }}</h2>

            <form class="max-md mx-auto mb-4" id="searchForm">
                <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                    <input type="search" id="default-search" name="search" class="block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search speakers..." required />
                </div>
            </form>

            <div id="speaker-list" class="grid grid-cols-1 justify-items-center gap-5 sm:grid-cols-2 sm:justify-items-stretch md:grid-cols-3 md:gap-4 lg:gap-6 lg:grid-cols-4">
                @forelse($speakers as $key => $speaker)
                <div class="mx-auto flex w-full flex-col items-center gap-4 py-8 text-center md:px-8 md:py-4 lg:px-12">
                    <img src="{{ getAvatar($speaker->avatar) }}" alt="{{ $speaker->fullname }}" class="mb-4 inline-block h-40 w-40 rounded-full object-cover" />
                    <p class="font-bold">{{ $speaker->fullname }}</p>
                    <p class="text-center text-sm text-gray-500"> {{ $speaker->username }} </p>
                </div>
                @empty
                <h3 class="mb-10 sm:text-lg text-slate-400 text-center col-span-4">There are no speakers again yet</h3>
                @endforelse
            </div>

            <div id="speaker-pagination" class="mt-8">
                {{ $speakers->links() }}
            </div>
        </div>
    </section>

    @push('scripts')
    <script>
    $(document).ready(function() {
        $('#default-search').on('input', function() {
            let query = $(this).val(); 
            fetchSpeakers(query);
        });

        function fetchSpeakers(query) {
            $.ajax({
                url: "{{ route('speakers') }}", 
                type: 'GET', 
                data: { search: query }, 
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
                },
                success: function(data) {
                    if(data.speakers == '')
                    {
                        $('#speaker-list').html(`<h3 class="col-span-3 text-slate-400">No Speakers found with keyword "${query}"</h3>`);
                        $('#speaker-pagination').html('');
                        return 0;
                    }
                    if (data.speakers) {
                        $('#speaker-list').html(data.speakers); 
                        $('#speaker-pagination').html(data.pagination);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching speakers:', error); 
                }
            });
        }
    });
    </script>
    @endpush
</x-frontPage.layout>
