@props([
    'objeto' => null,
    'type' => 'Test'
])
<x-guest-layout>
    <h1>{{ $objeto->name }} - {{ $type }}</h1>
</x-guest-layout>

