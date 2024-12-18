@foreach($speakers as $key => $speaker)
    <div class="mx-auto flex w-full flex-col items-center gap-4 py-8 text-center md:px-8 md:py-4 lg:px-12">
        <img src="{{ getAvatar($speaker->avatar) }}" alt="{{ $speaker->fullname }}" class="mb-4 inline-block h-40 w-40 rounded-full object-cover" />
        <p class="font-bold">{{ $speaker->fullname }}</p>
        <p class="text-center text-sm text-gray-500">{{ $speaker->username }}</p>
    </div>
@endforeach
