

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Gestion des Réservations')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    @filamentStyles
</head>
<body class="bg-gray-100 text-gray-900">
<header class="bg-primary text-white p-5 flex justify-between">
    <h1 class="text-xl">Gestion des Réservations</h1>
    <div class="flex items-center space-x-4">
        @auth
            @if(auth()->user()->canAccessPanel(\Filament\Facades\Filament::getPanel('admin')))
                <x-nav-link href="{{  url('/admin') }}"
                            class="text-white hover:text-gray-200">
                    Administration
                </x-nav-link>
            @endif

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

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($properties as $property)
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <x-property-card :property="$property"></x-property-card>
            </div>
        @endforeach

    </div>
</main>

<footer class="text-center p-4 mt-6 bg-primary text-white bottom-0 left-0 right-0">
    <p>&copy; 2025 - itsantho</p>
</footer>
@livewireScripts
@filamentScripts
</body>
</html>
