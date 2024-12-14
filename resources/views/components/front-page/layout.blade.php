<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="{{ asset('logoapp.png') }}">
    <title>PasundanDevFest - {{ $title }}</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

</head>
<body class="h-full">
    <div class="min-h-full">
        <x-FrontPage.Navbar></x-FrontPage.Navbar>
        <!-- <x-front-page.Header>{{ $title }}</x-front-page.Header> -->

        <main>
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                {{ $slot }}
            </div>
        </main>
    </div>

<footer class="bg-white text-gray-800 py-10">
  <div class="container mx-auto px-4">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
      <div>
        <h2 class="text-2xl font-bold mb-2">PasundanDevFest</h2>
        <p class="text-gray-600">PasundanDevFest developer community website</p>
        <div class="flex space-x-3 mt-4">
          <a href="#" class="text-gray-600 hover:text-gray-900">
            <i class="fab fa-github"></i>
          </a>
          <a href="#" class="text-gray-600 hover:text-gray-900">
            <i class="fab fa-twitter"></i>
          </a>
          <a href="#" class="text-gray-600 hover:text-gray-900">
            <i class="fab fa-linkedin"></i>
          </a>
          <a href="#" class="text-gray-600 hover:text-gray-900">
            <i class="fab fa-youtube"></i>
          </a>
          <a href="#" class="text-gray-600 hover:text-gray-900">
            <i class="fab fa-facebook"></i>
          </a>
          <a href="#" class="text-gray-600 hover:text-gray-900">
            <i class="fab fa-instagram"></i>
          </a>
          <a href="#" class="text-gray-600 hover:text-gray-900">
            <i class="fab fa-telegram"></i>
          </a>
        </div>
      </div>

      <div class="grid grid-cols-2 gap-6">
        <div>
          <h3 class="font-bold mb-2">Pages</h3>
          <ul class="space-y-1 text-gray-600">
            <li><a href="{{ url('/') }}" class="hover:underline">Homepage</a></li>
            <li><a href="{{ url('/about') }}" class="hover:underline">About</a></li>
            <li><a href="{{ url('/events') }}" class="hover:underline">Events</a></li>
            <li><a href="{{ url('/members') }}" class="hover:underline">Members</a></li>
            <li><a href="{{ url('/speakers') }}" class="hover:underline">Speakers</a></li>
          </ul>
        </div>

        <div>
          <h3 class="font-bold mb-2">Links</h3>
          <ul class="space-y-1 text-gray-600">
            <li><a href="https://github.com/ahmadsuherman/PasundanDevFest" target="_blank" class="hover:underline">GitHub</a></li>
          </ul>
        </div>

        
      </div>
    </div>

    <div class="mt-8 border-t border-gray-300 pt-6 flex flex-col md:flex-row justify-between items-center text-gray-600">
      <p>© 2024 PasundanDevFest. All rights reserved.</p>
      <p>This PasundanDevFest website is <a href="https://github.com/ahmadsuherman/PasundanDevFest" target="_blank" class="underline text-gray-800 hover:text-blue-600">open sourced on GitHub</a>.</p>
    </div>
  </div>
</footer>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    @stack('scripts')
</body>
</html>