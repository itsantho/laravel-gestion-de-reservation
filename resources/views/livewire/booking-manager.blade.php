<div class="p-6 bg-white rounded-lg shadow">
    <h2 class="text-xl font-semibold mb-4">Réserver une propriété</h2>

    @if (session()->has('success'))
        <div class="p-2 mb-4 text-green-700 bg-green-200 rounded">
            {{ session('success') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div class="p-2 mb-4 text-red-700 bg-red-200 rounded">
            {{ session('error') }}
        </div>
    @endif

    <form wire:submit.prevent="bookProperty" class="space-y-4">

        <!-- Date de début -->
        <div>
            <label for="startDate" class="block font-medium text-gray-700">Date d'arrivée</label>
            <input type="date" wire:model="startDate" id="startDate" class="w-full p-2 border rounded">
            @error('startDate') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- Date de fin -->
        <div>
            <label for="endDate" class="block font-medium text-gray-700">Date de départ</label>
            <input type="date" wire:model="endDate" id="endDate" class="w-full p-2 border rounded">
            @error('endDate') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- Bouton de réservation -->
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            Réserver
        </button>
    </form>
</div>
