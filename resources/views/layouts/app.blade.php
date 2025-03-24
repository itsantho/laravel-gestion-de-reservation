

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
<header class="bg-primary text-white p-5 flex justify-between">
    <h1 class="text-xl">Gestion des Réservations</h1>
    <div class="flex items-center space-x-4">
        @auth
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-nav-link href="{{ route('logout') }}"
                            onclick="event.preventDefault(); this.closest('form').submit();"
                            class="text-white hover:text-gray-200 cursor-pointer">
                    Déconnexion
                </x-nav-link>
            </form>
        @else
            <x-nav-link href="{{ route('login') }}" class="text-white hover:text-gray-200">
                Connexion
            </x-nav-link>
            <x-nav-link href="{{ route('register') }}" class="text-white hover:text-gray-200">
                Inscription
            </x-nav-link>
        @endauth
    </div>
</header>

<main class="container mx-auto p-6">
    @yield('content')
    <h2>Bonjour {{ auth()->user()->name }} !</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($properties as $property)
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <x-property-card :property="$property"></x-property-card>
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
