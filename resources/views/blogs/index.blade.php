@props(['blogs'])

<x-layout>

    {{-- success message --}}
   <x-success-msg/>

   {{-- hero section --}}
    <x-hero />

    {{-- Blogs section --}}
    <x-blogs-section :blogs="$blogs" />

</x-layout>
