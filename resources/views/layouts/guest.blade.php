@extends('layouts.main')
@section('content')
@include('layouts.frontend.nav')
<main class="flex-grow">
    {{ $slot }}
</main>
@include('layouts.frontend.footer')
@endsection