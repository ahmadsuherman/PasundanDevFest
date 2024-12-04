<x-backPage.layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <h1>Hi, {{ Auth()->user()->fullname ?? 'User' }}</h1>
</x-backPage.layout>