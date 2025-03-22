

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Gestion des Réservations')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-gray-100 text-gray-900">
<header class="bg-primary text-white p-4">
    <h1 class="text-xl">Gestion des Réservations</h1>
</header>

<main class="container mx-auto p-6">
    @yield('content')
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($properties as $property)

            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="p-4">
                    <h2 class="text-xl font-bold text-primary">{{ $property->name }}</h2>
                    <p class="text-gray-800 text-sm mt-2">{{ $property->description }}</p>
                    <p class="text-gray-800 font-semibold mt-2">{{ number_format($property->price_per_night, 2, ',', ' ') }} € / nuit</p>
                    <x-primary-button class="mt-4 w-full bg-secondary hover:bg-purple-700" wire:click="showDetails({{ $property->id }})">Détails</x-primary-button>
                </div>
            </div>
        @endforeach
    </div>
</main>

<footer class="text-center p-4 mt-6 bg-primary text-white">
    <p>&copy; 2025 - Mon Application</p>
</footer>
@livewireScripts
</body>
</html>
