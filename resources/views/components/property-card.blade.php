@props(['property'])

<div class="bg-white shadow-lg rounded-lg overflow-hidden">
    <div class="p-4">
        <h2 class="text-xl font-bold text-primary">{{ $property->name }}</h2>
        <p class="text-gray-800 text-sm mt-2">{{ $property->description }}</p>
        <p class="text-gray-800 font-semibold mt-2">{{ number_format($property->price_per_night, 2, ',', ' ') }} € / nuit</p>
        <livewire:booking-manager :property-id="$property->id" />
    </div>
</div>
