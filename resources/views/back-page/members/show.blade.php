<x-backPage.layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    
    <div class="grid grid-cols-1 pt-6 xl:grid-cols-3 xl:gap-4 dark:bg-gray-900">

      <div class="col-span-full xl:col-auto">
          <div class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
              <div class="items-center sm:flex xl:block 2xl:flex sm:space-x-4 xl:space-x-0 2xl:space-x-4">
                  <img class="mb-4 rounded-lg w-28 h-28 sm:mb-0 xl:mb-4 2xl:mb-0" src="{{ getAvatar($member->avatar) }}" alt="{{ $member->fullname }}">
                  <div>
                      <h3 class="mb-1 text-xl font-bold text-gray-900 dark:text-white">Profile picture</h3>
                      
                  </div>
              </div>
          </div>
          <div class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
              <div class="flow-root">
                  <h3 class="text-xl font-semibold dark:text-white">Links</h3>
                  <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                      @if(isset($member->links))
                      @foreach($member->links as $link)
                      <li class="py-4">
                          <div class="flex items-center space-x-4">
                              <div class="flex-1 min-w-0">
                                  <span class="block text-base font-semibold text-gray-900 truncate dark:text-white">
                                      {{ $link['text'] }}
                                  </span>
                                  <a target="_blank" href="{{ $link['url'] }}" class="block text-sm font-normal truncate text-primary-700 hover:underline dark:text-primary-500">
                                    {{ $link['url'] }}
                                  </a>
                              </div>
                          </div>
                      </li>
                      @endforeach
                      @endif
                  </ul>
              </div>
          </div>
      </div>
      <div class="col-span-2">
          <div class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
              <h3 class="mb-4 text-xl font-semibold dark:text-white">General information</h3>
                  <div class="grid grid-cols-6 gap-6">
                      <div class="col-span-6 sm:col-span-3">
                          <div class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Username</div>
                          <div class="block text-sm">{{ $member->username }}</div>
                      </div>
                      <div class="col-span-6 sm:col-span-3">
                          <div class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Fullname</div>
                          <div class="block text-sm">{{ $member->fullname }}</div>
                      </div>
                      <div class="col-span-6 sm:col-span-3">
                          <div class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Email</div>
                          <div class="block text-sm">{{ $member->email }}</div>
                      </div>
                      <div class="col-span-6 sm:col-span-3">
                          <div class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Roles</div>
                          <div class="block text-sm">{{ $member->roles }}</div>
                      </div>

                      <div class="col-span-12 sm:col-span-3">
                          <div class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Bio</div>
                          <div class="block text-sm">{{ $member->bio }}</div>
                      </div>
                      
                      <div class="col-span-6 sm:col-full flex items-center space-x-4">
                        <a href="{{ url('admin/members') }}" type="button" class="inline-flex items-center py-2 px-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                              
                          <svg class="w-5 h-5 text-white-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"  fill="none" viewBox="0 0 24 24">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 6v12m8-12v12l-8-6 8-6Z"/>
                          </svg>
                          Back
                        </a>

                        <a href="{{ route('members.edit', $member->username) }}" type="button" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-yellow-700 rounded-lg hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">
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
</x-backPage.layout>