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

    <form id="form" data-form="validate" action="{{ route('events.store') }}" method="post" class="bg-white p-6" enctype="multipart/form-data">
        @csrf

        <h3 class="text-lg font-medium leading-none text-gray-900 dark:text-white">Create {{ $title }}</h3>
        <p class="mt-1 mb-4 pe-5 text-sm font-normal text-gray-500 dark:text-gray-400">Create new {{ $title }}</p>

        <div class="grid gap-4 mb-4 sm:grid-cols-2">
            <div>
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                <input type="text" name="title" id="title" class="rounded bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter your event title" required="" data-parsley-trigger="keyup" value="{{ old('title') }}">
            </div>

            <div>
                <label for="slug" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Slug</label>
                <input type="text" name="slug" id="slug" class="rounded bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" readonly required="" data-parsley-trigger="keyup" value="{{ old('slug') }}">
            </div>

            <div>
                <label for="start_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Start Date</label>
                <input type="datetime-local" name="start_date" id="start_date" class="rounded bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required data-parsley-trigger="keyup" value="{{ old('start_date') }}">
            </div>

            <div>
                <label for="end_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">End Date</label>
                <input type="datetime-local" name="end_date" id="end_date" class="rounded bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required data-parsley-trigger="keyup" value="{{ old('end_date') }}">
            </div>

            <div>
                <label for="category_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                <select id="category_id" name="category_id" class="rounded bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required data-parsley-trigger="change" required>
                    <option value="" selected>Choose your category event</option>
                    @foreach($categories as $id => $category)
                    <option value="{{ $id }}">{{ $category }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="is_paid" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type</label>
                <select id="is_paid" name="is_paid" class="rounded bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required data-parsley-trigger="change" required>
                    <option value="" selected>Choose your type event</option>
                    <option value="1">Fee</option>
                    <option value="0">Free</option>
                </select>
            </div>

            <div>
                <label for="location" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Location</label>
                <input type="text" name="location" id="location" class="rounded bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter your event location" required data-parsley-trigger="keyup" value="{{ old('location') }}">
            </div>


            <div style="display: none;" id="input-price">
                <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                <input type="text" name="price" id="price" class="rounded bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter your event price" value="{{ old('price') }}">
            </div>

        </div>

        <div class="mb-4">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="images">Upload Image</label>
            <input onchange="previewImage()" type="file" name="images" id="images" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" required data-parsley-trigger="keyup" value="{{ old('images') }}">
            <img src="" class="rounded mt-2 text-sm text-gray-500 dark:text-gray-300 img-preview max-w-96">
        </div>

        <div class="mb-4">
            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
            <input id="description" 
                value="{{ old('description') }}" 
                type="hidden" 
                name="description" 
                data-parsley-errors-container="#description-error">
                <trix-editor input="description"></trix-editor>
            <div id="description-error"></div>
        </div>

        <div class="mb-4">
            <label for="speakers" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Speakers</label>
            <select required data-parsley-errors-container="#select2-error" id="speakers" name="speakers[]" multiple="multiple" class="block w-full mt-1 rounded-md shadow-sm border-gray-300">
                <option value="">Choose your event speakers</option>
                @foreach($speakers as $id => $speaker)
                <option value="{{ $id }}">{{ $speaker }}</option>
                @endforeach
            </select>
            
        <div id="select2-error"></div>
        </div>
        
        <div class="mb-4">
            <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
            <select id="status" name="status" class="rounded bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required data-parsley-trigger="change" required>
                <option value="">Choose your status event</option>
                <option value="1">Published</option>
                <option value="0">Draft</option>
            </select>
        </div>

        <button type="submit" class="p-6 px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        <svg class="w-5 h-5 text-white-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"  fill="none" viewBox="0 0 24 24">
        <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M11 16h2m6.707-9.293-2.414-2.414A1 1 0 0 0 16.586 4H5a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V7.414a1 1 0 0 0-.293-.707ZM16 20v-6a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v6h8ZM9 4h6v3a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1V4Z"/>
        </svg>
        &nbsp Save
        </button>
    </form>

    @push('styles')
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css" rel="stylesheet">
    @endpush

    @push('scripts')
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>
    @include('components.parsley') 
    <script>
        $(function () {
            
            const urlInput = document.querySelector('input.trix-input[type="url"]');
            if (urlInput) {
                urlInput.removeAttribute('required');
            }

            new TomSelect('#speakers', {
                create: false,
                plugins: ['remove_button'],
                placeholder: 'Pilih speakers...',
                allowEmptyOption: false,
            });
        })

        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');
        
        title.addEventListener('change', function() {
        fetch('/admin/events/checkSlug?title=' + title.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
        });

        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        })

        function previewImage() {
            const image = document.querySelector('#images');
            const imgPreview = document.querySelector('.img-preview');
            imgPreview.classList.add("block");

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);
            oFReader.onload = function(oFREVent) {
                imgPreview.src = oFREVent.target.result;
            }
        }

        const eventTypeSelect = document.getElementById('is_paid');
        const priceInputContainer = document.getElementById('input-price');

        eventTypeSelect.addEventListener('change', function() {
            const selectedValue = eventTypeSelect.value;
            if (selectedValue == 0) {
                priceInputContainer.style.display = 'none';
                document.getElementById('price').value = '';
            } else {

                priceInputContainer.style.display = 'block';
            }
        });
    </script>
    @endpush
</x-backPage.layout>
