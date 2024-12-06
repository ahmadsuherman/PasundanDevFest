<x-backPage.layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <section class="bg-white py-8 antialiased dark:bg-gray-900 md:py-8">
    <div class="py-4 md:py-8 p-6">
      <div class="mb-4 grid gap-4 sm:grid-cols-2 sm:gap-8 lg:gap-16">
        <div class="space-y-4">
          <div class="flex space-x-4">
            <img class="h-16 w-16 rounded-lg" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/helene-engels.png" alt="Helene avatar" />
            <div>
              <span class="mb-2 inline-block rounded bg-primary-100 px-2.5 py-0.5 text-xs font-medium text-primary-800 dark:bg-primary-900 dark:text-primary-300"> Speakers </span>
              <h2 class="flex items-center text-xl font-bold leading-none text-gray-900 dark:text-white sm:text-2xl">Fullname</h2>
            </div>
          </div>
          <dl class="">
            <dt class="font-semibold text-gray-900 dark:text-white">Username</dt>
            <dd class="text-gray-500 dark:text-gray-400">user_</dd>
          </dl>
          <dl class="">
            <dt class="font-semibold text-gray-900 dark:text-white">Email Address</dt>
            <dd class="text-gray-500 dark:text-gray-400">user@example.com</dd>
          </dl>
          <dl class="">
            <dt class="font-semibold text-gray-900 dark:text-white">Bio</dt>
            <dd class="text-gray-500 dark:text-gray-400">Lorem ipsum dolor sit amet.
            </dd>
          </dl>
        </div>
        <div class="space-y-4">
          <dl class="">
            <dt class="font-semibold text-gray-900 dark:text-white">Links</dt>
            <dd class="text-gray-500 dark:text-gray-400">https://example.com
            </dd>
          </dl>
          
        </div>
      </div>
      <a href="/admin/speakers/user/edit" data-modal-target="accountInformationModal2" data-modal-toggle="accountInformationModal2" class="inline-flex w-full items-center justify-center rounded-lg bg-primary-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 sm:w-auto">
        <svg class="-ms-0.5 me-1.5 h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"></path>
        </svg>
        Edit your data
    </a>
    </div>
</section>
</x-backPage.layout>