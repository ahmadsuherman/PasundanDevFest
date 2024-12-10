<x-backPage.layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <form data-form="validate" action="{{ route('speakers.update', 'user') }}" method="post" class="bg-white p-6">
        @csrf
        @method('PATCH')
        <div class="grid gap-4 mb-4 sm:grid-cols-2">
            <div>
                <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                <input type="text" name="username" id="username" class="rounded bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  data-parsley-required-message="Username harus diisi" placeholder="Masukkan username" required="" data-parsley-trigger="keyup" value="user_">
            </div>
            
            <div>
                <label for="fullname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Lengkap</label>
                <input type="text" name="fullname" id="fullname" class="rounded bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  data-parsley-required-message="Nama lengkap harus diisi" placeholder="Masukkan nama lengkap" required="" data-parsley-trigger="keyup" value="Fullname">
            </div>
            
            <div>
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                <input type="email" name="email" id="email" class="rounded bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  data-parsley-required-message="Email harus diisi" placeholder="Masukkan email" required="" data-parsley-trigger="keyup" value="user@gmail.com">
            </div>
            
            
            <div>
                <label for="roles" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
                <input type="text" name="roles" id="roles" class="rounded bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  data-parsley-required-message="Peran harus diisi" placeholder="Masukkan peran" required="" data-parsley-trigger="keyup" value="Speaker">
            </div>
        
        </div>

        <div class="grid gap-4 mb-4 sm:grid-cols-1">
        <div>
            <label for="bio" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bio</label>
            <textarea rows="5" name="bio" id="bio" class="rounded bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=""></textarea>
        </div>

        <div>
            <label for="links" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Links</label>
            <div class="space-y-4" id="link-container">
                <div class="flex items-center gap-2 link-group">
                    <input
                        type="url"
                        placeholder=""
                        class="flex-1 px-3 py-2 border rounded-lg focus:ring focus:ring-blue-300 outline-none rounded bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    />
                    <input
                        type="text"
                        placeholder=""
                        class="w-36 px-3 py-2 border rounded-lg focus:ring focus:ring-blue-300 outline-none rounded bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    />
                    <button class="px-3 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 remove-link">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>

            <div class="flex justify-between items-center mt-2">
                <button type="button"
                    id="add-link"
                    class="text-sm px-3 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 flex items-center gap-2"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>Tambah
                </button>
            </div>
        </div>
        </div>

        <button type="submit" class="p-6 px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        <svg class="w-5 h-5 text-white-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"  fill="none" viewBox="0 0 24 24">
        <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M11 16h2m6.707-9.293-2.414-2.414A1 1 0 0 0 16.586 4H5a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V7.414a1 1 0 0 0-.293-.707ZM16 20v-6a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v6h8ZM9 4h6v3a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1V4Z"/>
        </svg>
        Simpan
        </button>
    </form>

    @push('scripts')
    @include('components.parsley')

    <script>
        document.getElementById('add-link').addEventListener('click', function() {
            const linkContainer = document.getElementById('link-container');

            const newLinkGroup = document.createElement('div');
            newLinkGroup.classList.add('flex', 'items-center', 'gap-2', 'link-group');
            newLinkGroup.innerHTML = `
                <input
                    type="url"
                    placeholder=""
                    class="flex-1 px-3 py-2 border rounded-lg focus:ring focus:ring-blue-300 outline-none rounded bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                />
                <input
                    type="text"
                    placeholder=""
                    class="w-36 px-3 py-2 border rounded-lg focus:ring focus:ring-blue-300 outline-none rounded bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                />
                <button class="px-3 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 remove-link">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            `;

            linkContainer.appendChild(newLinkGroup);

            const removeButton = newLinkGroup.querySelector('.remove-link');
            removeButton.addEventListener('click', function() {
                newLinkGroup.remove();
            });
        });

        document.querySelectorAll('.remove-link').forEach(button => {
            button.addEventListener('click', function() {
                button.closest('.link-group').remove();
            });
        });
    </script>
    @endpush
</x-backPage.layout>