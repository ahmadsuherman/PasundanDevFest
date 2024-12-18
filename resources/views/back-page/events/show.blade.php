<x-backPage.layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    
    <div class="grid grid-cols-1 pt-6 xl:grid-cols-3 xl:gap-4 dark:bg-gray-900">

      <div class="col-span-full xl:col-auto">
          <div class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
          <h3 class="text-xl font-semibold dark:text-white mb-4">Images</h3>   
          <div class="items-center sm:flex xl:block 2xl:flex sm:space-x-4 xl:space-x-0 2xl:space-x-4">
                  <img class="mb-4 rounded-lg w-full h-full sm:mb-0 xl:mb-4 2xl:mb-0" src="{{ getImages($event->images) }}" alt="{{ $event->title }}">
              </div>
          </div>
          <div class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
              <div class="flow-root">
                  <h3 class="text-xl font-semibold dark:text-white mb-4">Detail {{ $title }}</h3>
                  <div class="grid grid-cols-6 gap-6">
                      <div class="col-span-6 sm:col-span-3">
                          <div class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Title</div>
                          <div class="block text-sm">{{ $event->title }}</div>
                      </div>
                      <div class="col-span-6 sm:col-span-3">
                          <div class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Slug</div>
                          <div class="block text-sm text-blue-500">
                            <a href="{{ url('events/'. $event->slug) }}">{{ $event->slug }}</a></div>
                      </div>
                      <div class="col-span-6 sm:col-span-3">
                          <div class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Start Date</div>
                          <div class="block text-sm">{{ formatDateTime($event->start_date) }}</div>
                      </div>
                      <div class="col-span-6 sm:col-span-3">
                          <div class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">End Date</div>
                          <div class="block text-sm">{{ formatDateTime($event->end_date) }}</div>
                      </div>

                      <div class="col-span-6 sm:col-span-3">
                          <div class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Category</div>
                          <div class="block text-sm">{{ $event->category->name }}</div>
                      </div>

                      <div class="col-span-6 sm:col-span-3">
                          <div class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Status</div>
                          <span class="py-1 px-1 bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-300 border border-blue-300">{{ $event->status ? 'Published' : 'Draf' }}</span>
                      </div>

                      <div class="col-span-6 sm:col-span-3">
                          <div class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Type</div>
                          <span class="py-1 px-1 bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-yellow-300 border border-yellow-300">{{ $event->is_paid ? 'Fee' : 'Free' }}</span>
                      </div>

                      @if($event->is_paid)
                      <div class="col-span-6 sm:col-span-6">
                          <div class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Price</div>
                          <div class="block text-sm">{{ $event->price }}</div>
                      </div>
                      @endif 
                      <div class="col-span-6 sm:col-span-6">
                          <div class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Location</div>
                          <div class="block text-sm">{{ $event->location }}</div>
                      </div>
                    </div>
              </div>
          </div>
      </div>
      <div class="col-span-2">
          <div class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                <div class="grid grid-cols-6 gap-6">
                    
                    <div class="col-span-12 sm:col-span-6">
                        <div class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Description</div>
                        <div class="block text-sm">{!! $event->description !!}</div>
                    </div>
                    
                    <div class="col-span-6 sm:col-full flex items-center space-x-4">
                    <a href="{{ url('admin/events') }}" type="button" class="inline-flex items-center py-2 px-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                            
                        <svg class="w-5 h-5 text-white-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"  fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 6v12m8-12v12l-8-6 8-6Z"/>
                        </svg>
                        Back
                    </a>

                    <a href="{{ route('events.edit', $event->slug) }}" type="button" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-yellow-700 rounded-lg hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">
                        <svg class="w-5 h-5 text-white-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                        </svg>    
                    Edit
                    </a>

                    </div>
                </div>
          </div>
      </div>
      
    </div>

    <div class="grid grid-cols-1 xl:grid-cols-2 xl:gap-4">
    <div class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800 xl:mb-0">
        <div class="flow-root">
            <h3 class="text-xl font-semibold dark:text-white">Speakers</h3>
            <p class="text-sm font-normal text-gray-500 dark:text-gray-400">List of event {{ $event->title }} speakers</p>
            
            <ul class="mt-4 divide-y divide-gray-200 dark:divide-gray-700">
                @forelse($event->speakers as $speaker)
                <li class="py-3">
                    <div class="flex justify-between xl:block">
                        <div class="flex space-x-4 2xl:mb-0">
                            <div>
                                <img class="w-12 h-12 rounded-full" src="{{ getAvatar($speaker->avatar) }}" alt="{{ $speaker->fullname }}">                            
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-base font-semibold text-gray-900 leading-none truncate mb-0.5 dark:text-white">
                                    {{ $speaker->fullname }}
                                </p>
                                <p class="mb-1 text-sm font-normal truncate text-slate-700 dark:text-white-500">
                                    {{ $speaker->username }}
                                </p>
                            </div>
                        </div>
                    </div>
                </li>
                @empty
                <h3 class="text-sm text-slate-400 text-center">There are no speakers again yet</h3>
                @endforelse
            </ul>
        </div>
    </div>

    <div class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800 xl:mb-0">
    <div class="flow-root">
        <h3 class="text-xl font-semibold dark:text-white">Member Participation</h3>
        <p class="text-sm font-normal text-gray-500 dark:text-gray-400">
            List of event {{ $event->title }} member participation
        </p>
        
        <div class="divide-y divide-gray-200 dark:divide-gray-700">
            <ul class="mt-4 divide-y divide-gray-200 dark:divide-gray-700">
                @forelse($event->members as $member)
                <li class="py-3">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <div>
                                <img class="w-12 h-12 rounded-full" src="{{ getAvatar($member->avatar) }}" alt="{{ $member->fullname }}">                            
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-base font-semibold text-gray-900 leading-none truncate mb-0.5 dark:text-white">
                                    {{ $member->fullname }}
                                </p>
                                <p class="mb-1 text-sm font-normal truncate text-slate-700 dark:text-white-500">
                                    {{ $member->username }}
                                </p>
                            </div>
                        </div>

                        <div>
                            <span class="bg-{{ $member->pivot->payment_status ? 'green' : 'yellow' }}-100 text-{{ $member->pivot->payment_status ? 'green' : 'yellow' }}-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-{{ $member->pivot->payment_status ? 'green' : 'yellow' }}-400 border border-{{ $member->pivot->payment_status ? 'green' : 'yellow' }}-400">
                                {{ $member->pivot->payment_status ? 'Paid' : 'Unpaid' }}
                            </span>                         
                        </div>
                    </div>
                </li>
                @empty
                <h3 class="text-sm text-slate-400 text-center">There are no member participation again yet</h3>
                @endforelse
            </ul>
        </div>
    </div>
</div>

</div>
</x-backPage.layout>