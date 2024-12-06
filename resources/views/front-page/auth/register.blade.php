<x-frontPage.layout>
    <x-slot:title>Register</x-slot:title>

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
                        Create your account
                    </h1>

                    <form class="space-y-4 md:space-y-6" action="/register" method="POST">
                        @csrf
                        <!-- Full Name -->
                        <div>
                            <label for="full_name" class="block mb-2 text-sm font-medium text-gray-900 @error('full_name') text-red-700 @enderror">Full Name</label>
                            <input type="text" name="full_name" id="full_name" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 @error('full_name') bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 @enderror" placeholder="Your Full Name" required="" value="{{ old('full_name') }}">
                            @error('full_name')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 @error('email') text-red-700 @enderror">Email</label>
                            <input type="email" name="email" id="email" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 @error('email') bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 @enderror" placeholder="name@gmail.com" required="" value="{{ old('email') }}">
                            @error('email')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 @error('password') text-red-700 @enderror">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 @error('password') bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 @enderror" required="">
                            @error('password')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div>
                            <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="••••••••" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required="">
                        </div>

                        <!-- Role Selection -->
                        <div>
                            <label class="block mb-4 text-sm font-medium text-gray-900">Register As</label>
                            <div class="flex justify-between items-center">
                                <!-- Members -->
                                <div class="flex items-center">
                                    <input id="member" type="radio" name="role" value="member" class="w-6 h-6 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 rounded-full" required>
                                    <label for="member" class="ml-3 text-sm font-medium text-gray-900">Members</label>
                                </div>
                                <!-- Speakers -->
                                <div class="flex items-center">
                                    <input id="speaker" type="radio" name="role" value="speaker" class="w-6 h-6 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 rounded-full" required>
                                    <label for="speaker" class="ml-3 text-sm font-medium text-gray-900">Speakers</label>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Register</button>
                        
                        <!-- Redirect to Login -->
                        <p class="text-sm font-light text-gray-500">
                            Already have an account? <a href="/login" class="font-medium text-blue-600 hover:underline">Sign in</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-frontPage.layout>
