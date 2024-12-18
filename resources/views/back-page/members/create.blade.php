<x-backPage.layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    @if ($errors->any())
    <div class="bg-red-600 text-white p-3 rounded-lg mb-4">
        <ul>
            @foreach ($errors->all() as $key => $error)
                <li>{{ $key+1 }}. {{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form data-form="validate" action="{{ route('members.store') }}" method="post" class="bg-white p-6" enctype="multipart/form-data">
        @csrf

        <h3 class="text-lg font-medium leading-none text-gray-900 dark:text-white">Create {{ $title }}</h3>
        <p class="mt-1 mb-4 pe-5 text-sm font-normal text-gray-500 dark:text-gray-400">Create new {{ $title }}</p>
        <div class="grid gap-4 mb-4 sm:grid-cols-1">
            <div>
                <label for="avatar" class="block text-sm/6 font-medium text-gray-900">Avatar</label>
                <div class="mt-2 flex items-center gap-x-3">
                    <img class="img-preview size-24 text-gray-300 rounded-full" src="{{ asset('default-avatar.jpg') }}" alt="{{ old('fullname') }}"/>
                    <input onchange="previewImage()" type="file" name="avatar" id="avatar" class="btn-sm rounded bg-white text-xs font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50" />

                </div>
            </div>
        </div>

        <div class="grid gap-4 mb-4 sm:grid-cols-2">
            <div>
                <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                <input data-parsley-pattern="^[a-z0-9]+$"  type="text" name="username" id="username" class="rounded bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter your username" required="" data-parsley-trigger="keyup" value="{{ old('username') }}">
            </div>

            <div>
                <label for="fullname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fullname</label>
                <input type="text" name="fullname" id="fullname" class="rounded bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter your fullname" required="" data-parsley-trigger="keyup" value="{{ old('fullname') }}">
            </div>

            <div>
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                <input type="email" name="email" id="email" class="rounded bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter your email" required="" data-parsley-trigger="keyup" value="{{ old('email') }}">
            </div>


        </div>

        <div class="grid gap-4 mb-4 sm:grid-cols-1">
        <div>
            <label for="bio" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bio</label>
            <textarea rows="5" name="bio" id="bio" class="rounded bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="">{{ old('bio') }}</textarea>
        </div>

        <div>
            <label for="links" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Links</label>
            
            
            <div class="space-y-4" id="link-container">
                <div class="flex items-center gap-2 link-group">
                    <input
                         data-parsley-errors-container="#parsley-errors-list"
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
                <div class="mt-0 mb-0" id="parsley-errors-list"></div>
            </div>

            <div class="flex justify-between items-center mt-2">
                <button type="button"
                    id="add-link"
                    class="text-sm px-3 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 flex items-center gap-2"
                   
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>Add
                </button>
            </div>
            </div>
        </div>

        <button type="submit" class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
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

    document.querySelector('form[data-form="validate"]').addEventListener('submit', function(event) {
        const linkInputs = document.querySelectorAll('.link-group');
        const links = [];

        linkInputs.forEach(linkInput => {
            const url = linkInput.querySelector('input[type="url"]').value;
            const text = linkInput.querySelector('input[type="text"]').value;

            if (url && text) {
                links.push({ url: url, text: text });
            }
        });

        const linksInput = document.createElement('input');
        linksInput.type = 'hidden';
        linksInput.name = 'links';
        linksInput.value = JSON.stringify(links);
        this.appendChild(linksInput);
    });

        function previewImage() {
            const image = document.querySelector('#avatar');
            const imgPreview = document.querySelector('.img-preview');
            imgPreview.classList.add("rounded-full");

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);
            oFReader.onload = function(oFREVent) {
                imgPreview.src = oFREVent.target.result;
            }
        }
    </script>
    @endpush
</x-backPage.layout>
