@foreach($events as $event) 
<li>
    <div class="flex flex-col justify-between gap-4 overflow-hidden md:flex-row md:gap-8">
        <div>
        <a class="focus-ring block transition hover:opacity-75 " href="{{ url('events/'. $event->slug) }}">
            <img class="rounded aspect-video w-full bg-cover object-cover md:h-60 md:max-w-xl lg:h-80" alt="{{ $event->title }}" src="{{ asset('storage/events/' . $event->images) }}">
        </a>
        </div>
        <div class="flex-1 shrink-0 space-y-4">
        <div>
            <h3 class="text-3xl font-bold">
            <a class="focus-ring transition hover:text-primary" href="{{ url('events/'. $event->slug) }}">{{ $event->title }}</a>
            </h3>
            <p>{{ Str::limit(strip_tags($event->description), 200, '...') }}</p>
        </div>
        <p class="text-sm text-muted-foreground">
            <span class="bg-blue-100 text-blue-800 text-md font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400">{{ $event->category->name }}</span>
            <span class="bg-yellow-100 text-yellow-800 text-md font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-yellow-300 border border-yellow-300">{{ $event->is_paid ? formatRupiah($event->price) : 'Gratis'}}</span>
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
        <a class="bg-slate-300 inline-flex select-none items-center justify-center text-sm font-semibold ring-offset-background transition focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-secondary text-secondary-foreground hover:bg-secondary/80 h-8 gap-2 rounded-md px-3" href="/events/2024-11-23">View Event</a>
        </div>
    </div>
</li> 
@endforeach 