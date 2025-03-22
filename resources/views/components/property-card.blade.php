@props(['property'])
@livewire('booking-manager')
<div class="bg-white shadow-lg rounded-lg overflow-hidden">
    <div class="p-4">
        <h2 class="text-xl font-bold">{{ $property->name }}</h2>
        <p class="text-gray-800 text-sm mt-2">{{ $property->description }}</p>
        <p class="text-gray-800 font-semibold mt-2">{{ number_format($property->price_per_night, 2, ',', ' ') }} € / nuit</p>
    </div>
</div>
