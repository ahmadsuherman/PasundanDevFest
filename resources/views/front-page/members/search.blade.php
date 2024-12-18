@foreach($members as $key => $member)
    <div class="mx-auto flex w-full flex-col items-center gap-4 py-8 text-center md:px-8 md:py-4 lg:px-12">
        <img src="{{ getAvatar($member->avatar) }}" alt="{{ $member->fullname }}" class="mb-4 inline-block h-40 w-40 rounded-full object-cover" />
        <p class="font-bold">{{ $member->fullname }}</p>
        <p class="text-center text-sm text-gray-500">{{ $member->username }}</p>
    </div>
@endforeach
