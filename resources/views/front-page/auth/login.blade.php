<x-frontPage.layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <section class="">
        <div class="flex flex-col justify-center items-center px-6 py-6 mx-auto md:h-screen lg:py-0">
            <div class="w-full rounded-lg shadow sm:max-w-md xl:p-0">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    @if (session()->has('success'))
                    <div class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50" role="alert">
                        <div>
                            {{ session('success') }}
                        </div>
                    </div>
                    @endif

                    @if (session()->has('error'))
                    <div class="flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50" role="alert">
                        <div>
                            {{ session('error') }}
                        </div>
                    </div>
                    @endif

                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
                        Sign in to your account
                    </h1>

                    <form class="space-y-4 md:space-y-6" action="/login" method="POST">
                        @csrf
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 @error('email') text-red-700 @enderror">Email</label>
                            <input type="email" name="email" id="email" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 @error('email') bg-red-50 border-red-500 text-red-900 placeholder-red-700 @enderror" placeholder="name@gmail.com" required="" value="{{ old('email') }}">
                            @error('email')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 @error('password') text-red-700 @enderror">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 @error('password') bg-red-50 border-red-500 text-red-900 placeholder-red-700 @enderror" required="">
                            @error('password')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Sign in</button>
                        <p class="text-sm font-light text-gray-500">
                            Don’t have an account yet? <a href="/register" class="font-medium text-blue-600 hover:underline">Sign up</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-frontPage.layout>
