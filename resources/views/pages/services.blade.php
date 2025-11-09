<x-guest-layout>

<x-breadcrumb 
    :items="[
        ['label' => 'Home', 'url' => route('home')],
        ['label' => 'Our Services'],
    ]" 
/>

@include('layouts.frontend.services')



    </x-guest-layout>