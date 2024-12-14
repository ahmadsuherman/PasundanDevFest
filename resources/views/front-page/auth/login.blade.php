<x-frontPage.layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <section class="login">
        <div class="w-full-md">
            <h2 class="text-3xl font-bold mb-2">Log in to continue</h2>
            <h3 class="mb-10 font-normal sm:text-lg">Don't have an account? <a class="text-blue-500" href="{{ url('register') }}">Register</h3>
            <div class="grid grid-cols-1 gap-8">
            @if (session()->has('success'))
            <div class="flex items-center p-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50" role="alert">
                <div>
                    {{ session('success') }}
                </div>
            </div>
            @endif

            @if (session()->has('error'))
            <div class="flex items-center p-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50" role="alert">
                <div>
                    {{ session('error') }}
                </div>
            </div>
            @endif

            <a href="{{ url('login/google') }}" class="bg-white flex items-center text-gray-700 dark:text-gray-300 justify-center gap-x-3 text-sm sm:text-base  dark:bg-gray-900 dark:border-gray-700 dark:hover:bg-gray-800 rounded-lg hover:bg-gray-100 duration-300 transition-colors border px-8 py-2.5">
                <svg class="w-5 h-5 sm:h-6 sm:w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_3033_94454)">
                    <path d="M23.766 12.2764C23.766 11.4607 23.6999 10.6406 23.5588 9.83807H12.24V14.4591H18.7217C18.4528 15.9494 17.5885 17.2678 16.323 18.1056V21.1039H20.19C22.4608 19.0139 23.766 15.9274 23.766 12.2764Z" fill="#4285F4"/>
                    <path d="M12.2401 24.0008C15.4766 24.0008 18.2059 22.9382 20.1945 21.1039L16.3276 18.1055C15.2517 18.8375 13.8627 19.252 12.2445 19.252C9.11388 19.252 6.45946 17.1399 5.50705 14.3003H1.5166V17.3912C3.55371 21.4434 7.7029 24.0008 12.2401 24.0008Z" fill="#34A853"/>
                    <path d="M5.50253 14.3003C4.99987 12.8099 4.99987 11.1961 5.50253 9.70575V6.61481H1.51649C-0.18551 10.0056 -0.18551 14.0004 1.51649 17.3912L5.50253 14.3003Z" fill="#FBBC04"/>
                    <path d="M12.2401 4.74966C13.9509 4.7232 15.6044 5.36697 16.8434 6.54867L20.2695 3.12262C18.1001 1.0855 15.2208 -0.034466 12.2401 0.000808666C7.7029 0.000808666 3.55371 2.55822 1.5166 6.61481L5.50264 9.70575C6.45064 6.86173 9.10947 4.74966 12.2401 4.74966Z" fill="#EA4335"/>
                    </g>
                    <defs>
                    <clipPath id="clip0_3033_94454">
                    <rect width="24" height="24" fill="white"/>
                    </clipPath>
                    </defs>
                </svg>

                <span>Sign in with Google</span>
            </a>
            
            </div>
        </div>
    </section>
</x-frontPage.layout>
