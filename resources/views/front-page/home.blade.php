<x-frontPage.layout>
    <x-slot:title>Home - PasundanDev</x-slot:title>

<section>
  <!-- Hero Container -->
  <div class="mx-auto w-full max-w-7xl md:py-20">
    <!-- Component -->
    <div class="grid items-center justify-items-start gap-8 sm:gap-20 lg:grid-cols-2">
      <!-- Hero Content -->
      <div class="flex flex-col">
        <!-- Hero Title -->
        <h1 class="mb-4 text-4xl font-bold md:text-6xl"> PasundanDevFest </h1>
        <p class="mb-6 max-w-lg text-sm text-gray-500 sm:text-xl md:mb-10 lg:mb-12"> A thriving community for developers, programmers, and tech enthusiasts in Pasundan. </p>
        <!-- Hero Button -->
        <div class="flex items-center">
          <a href="{{ url('/register') }}" class="mr-5 items-center rounded-md bg-black px-6 py-3 font-semibold text-white md:mr-6 lg:mr-8"> Join Us</a>
          <a href="{{ url('/events') }}" class="flex max-w-full items-center font-bold bg-slate-300 px-6 py-3 rounded">
            <img src="https://assets.website-files.com/6458c625291a94a195e6cf3a/6458c625291a94bd85e6cf98_ArrowUpRight%20(4).svg" alt="Icon" class="mr-2 inline-block max-h-4 w-5" />
            <p>Explore Event</p>
          </a>
        </div>
      </div>
      <!-- Hero Image -->
      <img src="https://firebasestorage.googleapis.com/v0/b/flowspark-1f3e0.appspot.com/o/Tailspark%20Images%2FPlaceholder%20Image.svg?alt=media&token=375a1ea3-a8b6-4d63-b975-aac8d0174074" alt="" class="inline-block h-full w-full max-w-2xl" />
    </div>
  </div>
</section>


<!-- <div class="mx-auto mt-6 max-w-2xl sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-3 lg:gap-x-8 lg:px-8">
      <img src="https://tailwindui.com/plus/img/ecommerce-images/product-page-02-secondary-product-shot.jpg" alt="Two each of gray, white, and black shirts laying flat." class="hidden aspect-[3/4] size-full rounded-lg object-cover lg:block">
      <div class="hidden lg:grid lg:grid-cols-1 lg:gap-y-8">
        <img src="https://tailwindui.com/plus/img/ecommerce-images/product-page-02-tertiary-product-shot-01.jpg" alt="Model wearing plain black basic tee." class="aspect-[3/2] size-full rounded-lg object-cover">
        <img src="https://tailwindui.com/plus/img/ecommerce-images/product-page-02-tertiary-product-shot-02.jpg" alt="Model wearing plain gray basic tee." class="aspect-[3/2] size-full rounded-lg object-cover">
      </div>
      <img src="https://tailwindui.com/plus/img/ecommerce-images/product-page-02-featured-product-shot.jpg" alt="Model wearing plain white basic tee." class="aspect-[4/5] size-full object-cover sm:rounded-lg lg:aspect-[3/4]">
    </div>
     -->

<section class="upcoming-event">
  <div>
    <h2 class="text-3xl font-bold mb-2">Upcoming Events</h2>
    <h3 class="mb-10 font-normal sm:text-lg">See our upcoming events and join us!</h3>
    <div class="grid grid-cols-1 gap-8">
    <ul class="space-y-10 md:space-y-20">
    @forelse($upcomingEvents as $upcomingEvent)
      <li>
        <div class="flex flex-col justify-between gap-4 overflow-hidden md:flex-row md:gap-8">
          <div>
            <a class="focus-ring block transition hover:opacity-75 " href="{{ url('events/'. $upcomingEvent->slug) }}">
              <img class="rounded aspect-video w-full bg-cover object-cover md:h-60 md:max-w-xl lg:h-80" alt="{{ $upcomingEvent->title }}" src="{{ asset('storage/events/' . $upcomingEvent->images) }}">
            </a>
          </div>
          <div class="flex-1 shrink-0 space-y-4">
            <div>
              <h3 class="text-3xl font-bold">
                <a class="focus-ring transition hover:text-primary" href="{{ url('events/'. $upcomingEvent->slug) }}">{{ $upcomingEvent->title }}</a>
              </h3>
              <p>{{ Str::limit(strip_tags($upcomingEvent->description), 200, '...') }}</p>
            </div>
            
            <p class="text-sm text-muted-foreground">
            <span class="bg-blue-100 text-blue-800 text-md font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400">{{ $upcomingEvent->category->name }}</span>
            <span class="bg-yellow-100 text-yellow-800 text-md font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-yellow-300 border border-yellow-300">{{ $upcomingEvent->is_paid ? formatRupiah($upcomingEvent->price) : 'Gratis'}}</span>
            </p>

            <p class="text-sm text-muted-foreground">
              <time>
                <span>{{ formatDate($upcomingEvent->start_date) }}</span> s/d
                <br>
                <span class="text-muted-foreground">{{ formatDate($upcomingEvent->end_date) }}</span>
              </time>
            </p>
            <p class="flex flex-row items-center gap-1">
              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="text-2xl iconify iconify--ph" width="1em" height="1em" viewBox="0 0 256 256">
                <path fill="currentColor" d="M128 64a40 40 0 1 0 40 40a40 40 0 0 0-40-40m0 64a24 24 0 1 1 24-24a24 24 0 0 1-24 24m0-112a88.1 88.1 0 0 0-88 88c0 31.4 14.51 64.68 42 96.25a254.2 254.2 0 0 0 41.45 38.3a8 8 0 0 0 9.18 0a254.2 254.2 0 0 0 41.37-38.3c27.45-31.57 42-64.85 42-96.25a88.1 88.1 0 0 0-88-88m0 206c-16.53-13-72-60.75-72-118a72 72 0 0 1 144 0c0 57.23-55.47 105-72 118"></path>
              </svg> {{ $upcomingEvent->location }}
            </p>
            <a class="bg-slate-300 inline-flex select-none items-center justify-center text-sm font-semibold ring-offset-background transition focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-secondary text-secondary-foreground hover:bg-secondary/80 h-8 gap-2 rounded-md px-3" href="{{ url('events/'. $upcomingEvent->slug) }}">View Event</a>
            <a class="bg-gray-800 text-white inline-flex select-none items-center justify-center text-sm font-semibold ring-offset-background transition focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-secondary text-secondary-foreground hover:bg-secondary/80 h-8 gap-2 rounded-md px-3" href="{{ url('events/'. $upcomingEvent->slug . '/register') }}">Registration Event</a>
            
          </div>
        </div>
      </li>
    @empty
    <h3 class="mb-10 sm:text-lg text-slate-400 text-center">There are no upcoming events again yet</h3>
    @endforelse
    </ul>
    </div>
  </div>
</section>

<section class="past-event mt-10">
  <div>
    <h2 class="text-3xl font-bold mb-2">Past Events</h2>
    <h3 class="mb-10 font-normal sm:text-lg">Some of the finished events</h3>
    <div class="grid grid-cols-1 gap-8">
      <ul class="space-y-10 md:space-y-20">
        @forelse($pastEvents as $pastEvent)
        <li>
          <div class="flex flex-col justify-between gap-4 overflow-hidden md:flex-row md:gap-8">
            <div>
              <a class="focus-ring block transition hover:opacity-75 " href="{{ url('events/'. $pastEvent->slug) }}">
                <img class="rounded aspect-video w-full bg-cover object-cover md:h-60 md:max-w-xl lg:h-80" alt="{{ $pastEvent->title }}" src="{{ asset('storage/events/' . $pastEvent->images) }}">
              </a>
            </div>
            <div class="flex-1 shrink-0 space-y-4">
              <div>
                <h3 class="text-3xl font-bold">
                  <a class="focus-ring transition hover:text-primary" href="{{ url('events/'. $pastEvent->slug) }}">{{ $pastEvent->title }}</a>
                </h3>
                <p>{{ Str::limit(strip_tags($pastEvent->description), 200, '...') }}</p>
              </div>
              
              <p class="text-sm text-muted-foreground">
              <span class="bg-blue-100 text-blue-800 text-md font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400">{{ $pastEvent->category->name }}</span>
              <span class="bg-yellow-100 text-yellow-800 text-md font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-yellow-300 border border-yellow-300">{{ $pastEvent->is_paid ? formatRupiah($pastEvent->price) : 'Gratis'}}</span>
              </p>

              <p class="text-sm text-muted-foreground">
                <time>
                  <span>{{ formatDate($pastEvent->start_date) }}</span> s/d
                  <br>
                  <span class="text-muted-foreground">{{ formatDate($pastEvent->end_date) }}</span>
                </time>
              </p>
              <p class="flex flex-row items-center gap-1">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="text-2xl iconify iconify--ph" width="1em" height="1em" viewBox="0 0 256 256">
                  <path fill="currentColor" d="M128 64a40 40 0 1 0 40 40a40 40 0 0 0-40-40m0 64a24 24 0 1 1 24-24a24 24 0 0 1-24 24m0-112a88.1 88.1 0 0 0-88 88c0 31.4 14.51 64.68 42 96.25a254.2 254.2 0 0 0 41.45 38.3a8 8 0 0 0 9.18 0a254.2 254.2 0 0 0 41.37-38.3c27.45-31.57 42-64.85 42-96.25a88.1 88.1 0 0 0-88-88m0 206c-16.53-13-72-60.75-72-118a72 72 0 0 1 144 0c0 57.23-55.47 105-72 118"></path>
                </svg> {{ $pastEvent->location }}
              </p>
              <a class="bg-slate-300 inline-flex select-none items-center justify-center text-sm font-semibold ring-offset-background transition focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-secondary text-secondary-foreground hover:bg-secondary/80 h-8 gap-2 rounded-md px-3" href="{{ url('events/'. $pastEvent->slug) }}">View Event</a>
            </div>
          </div>
        </li>
        @empty
        <h3 class="mb-10 sm:text-lg text-slate-400 text-center">There are no past events again yet</h3>
        @endforelse
      </ul>
    </div>
    <div class="mt-10 flex justify-center">
      <a class="bg-gray-800 inline-flex select-none items-center justify-center text-sm font-semibold ring-offset-background transition focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 text-white hover:bg-slate-900 h-10 gap-3 rounded-md px-6" href="/events">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--ph" width="1em" height="1em" viewBox="0 0 256 256">
          <path fill="currentColor" d="M208 32h-24v-8a8 8 0 0 0-16 0v8H88v-8a8 8 0 0 0-16 0v8H48a16 16 0 0 0-16 16v160a16 16 0 0 0 16 16h160a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16M72 48v8a8 8 0 0 0 16 0v-8h80v8a8 8 0 0 0 16 0v-8h24v32H48V48Zm136 160H48V96h160z"></path>
        </svg>
        <span>See More Events</span>
      </a>
    </div>
  </div>
</section>

<section>
  <div class="mx-auto w-full max-w-7xl px-5 py-16 md:px-10 md:py-20">
  <h2 class="text-3xl font-bold mb-2 text-center"> Newly Joined Community Members </h2>
    <p class="mx-auto mb-8 mt-4 text-center text-sm text-gray-500 sm:text-base md:mb-12 lg:mb-16"> Join our community and meet other developers in PasundanDev </p>
    <div class="grid grid-cols-1 justify-items-center gap-5 sm:grid-cols-2 sm:justify-items-stretch md:grid-cols-3 md:gap-4 lg:gap-6 lg:grid-cols-4">
      @forelse($newMemberRegistrations as $newMemberRegistration)
      <div class="mx-auto flex w-full flex-col items-center gap-4 py-8 text-center md:px-8 md:py-4 lg:px-12">
        <img src="{{ $newMemberRegistration->avatar }}" alt="{{ $newMemberRegistration->fullname }}" class="mb-4 inline-block h-40 w-40 rounded-full object-cover" />
        <p class="font-bold">{{ $newMemberRegistration->fullname }}</p>
        <p class="text-center text-sm text-gray-500"> {{ $newMemberRegistration->username }} </p>
      </div>
      @empty
      <h3 class="mb-10 sm:text-lg text-slate-400 text-center col-span-4">There are no newly members again yet</h3>
      
      @endforelse
    </div>
    <div class="mt-10 flex justify-center">
      <a class="bg-gray-800 inline-flex select-none items-center justify-center text-sm font-semibold ring-offset-background transition focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 text-white hover:bg-slate-900 h-10 gap-3 rounded-md px-6" href="{{ url('members') }}">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--ph" width="1em" height="1em" viewBox="0 0 256 256">
          <path fill="currentColor" d="M208 32h-24v-8a8 8 0 0 0-16 0v8H88v-8a8 8 0 0 0-16 0v8H48a16 16 0 0 0-16 16v160a16 16 0 0 0 16 16h160a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16M72 48v8a8 8 0 0 0 16 0v-8h80v8a8 8 0 0 0 16 0v-8h24v32H48V48Zm136 160H48V96h160z"></path>
        </svg>
        <span>See More Members</span>
      </a>
    </div>
  </div>
  
</section>
</x-frontPage.layout>
