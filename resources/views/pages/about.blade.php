<x-guest-layout>

    <x-breadcrumb :items="[
    ['label' => 'Home', 'url' => route('home')],
    ['label' => 'About Us'],
]" />

@include('layouts.frontend.about')


    </x-guest-layout>