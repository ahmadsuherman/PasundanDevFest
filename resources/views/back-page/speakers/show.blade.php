<x-backPage.layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    
    <div class="grid grid-cols-1 pt-6 xl:grid-cols-3 xl:gap-4 dark:bg-gray-900">

      <div class="col-span-full xl:col-auto">
          <div class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
              <div class="items-center sm:flex xl:block 2xl:flex sm:space-x-4 xl:space-x-0 2xl:space-x-4">
                  <img class="mb-4 rounded-lg w-28 h-28 sm:mb-0 xl:mb-4 2xl:mb-0" src="{{ getAvatar($speaker->avatar) }}" alt="{{ $speaker->fullname }}">
                  <div>
                      <h3 class="mb-1 text-xl font-bold text-gray-900 dark:text-white">Profile picture</h3>
                      
                  </div>
              </div>
          </div>
          <div class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
              <div class="flow-root">
                  <h3 class="text-xl font-semibold dark:text-white">Links</h3>
                  <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                      @if(isset($speaker->links))
                      @foreach($speaker->links as $link)
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
                          <div class="block text-sm">{{ $speaker->username }}</div>
                      </div>
                      <div class="col-span-6 sm:col-span-3">
                          <div class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Fullname</div>
                          <div class="block text-sm">{{ $speaker->fullname }}</div>
                      </div>
                      <div class="col-span-6 sm:col-span-3">
                          <div class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Email</div>
                          <div class="block text-sm">{{ $speaker->email }}</div>
                      </div>
                      <div class="col-span-6 sm:col-span-3">
                          <div class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Roles</div>
                          <div class="block text-sm">{{ $speaker->roles }}</div>
                      </div>

                      <div class="col-span-6 sm:col-span-3">
                          <div class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Status</div>
                          <span class="py-1 px-1 bg-{{ $speaker->is_verified ? 'green' : 'yellow'}}-100 text-{{ $speaker->is_verified ? 'green' : 'yellow'}}-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-{{ $speaker->is_verified ? 'green' : 'yellow'}}-300 border border-{{ $speaker->is_verified ? 'green' : 'yellow'}}-300">{{ $speaker->is_verified ? 'Verified' : 'Not Verified'}}</span>
                      </div>
                      

                      <div class="col-span-12 sm:col-span-3">
                          <div class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Bio</div>
                          <div class="block text-sm">{{ $speaker->bio }}</div>
                      </div>
                      
                      <div class="col-span-6 sm:col-full flex items-center space-x-4">
                        <a href="{{ url('admin/speakers') }}" type="button" class="inline-flex items-center py-2 px-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                              
                          <svg class="w-5 h-5 text-white-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"  fill="none" viewBox="0 0 24 24">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 6v12m8-12v12l-8-6 8-6Z"/>
                          </svg>
                          Back
                        </a>

                        <a href="{{ route('speakers.edit', $speaker->username) }}" type="button" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-yellow-700 rounded-lg hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">
                          <svg class="w-5 h-5 text-white-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                          </svg>    
                        Edit
                        </a>

                        @if(!$speaker->is_verified)
                        <button onclick="verifiedSpeaker('{{ $speaker->username }}')" type="button" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                          <svg class="w-5 h-5 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                          <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm13.707-1.293a1 1 0 0 0-1.414-1.414L11 12.586l-1.793-1.793a1 1 0 0 0-1.414 1.414l2.5 2.5a1 1 0 0 0 1.414 0l4-4Z" clip-rule="evenodd"/>
                        </svg>
                          &nbsp Verified
                        </button>
                        <form id="verified-{{ $speaker->username }}" action="{{ route('speakers.verified', $speaker->username) }}" method="POST" class="d-none"> @csrf @method('PATCH') </form>
                        </form>
                        @endif
                      </div>
                  </div>
          </div>
      </div>
    </div>

    @push('scripts')
        <script>
            function verifiedSpeaker(username)
            {
                Swal.fire({
                title: "Are you sure?",
                text: "Speakers will be verified",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes",
                cancelButtonText: "No",
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('verified-' + username).submit();
                    }
                });
            }
        </script>
    @endpush
</x-backPage.layout>