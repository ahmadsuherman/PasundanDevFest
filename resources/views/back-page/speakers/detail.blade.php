@extends('layouts.app')

@section('content')
    <h1>{{ $title }}</h1>
    <p>Nama: {{ $speaker->fullname }}</p>
    <p>Email: {{ $speaker->email }}</p>
    <p>Role: {{ $speaker->roles }}</p>
    <p>Bio: {{ $speaker->bio }}</p>
@endsection