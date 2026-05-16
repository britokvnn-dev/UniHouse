<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'UniHouse') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 antialiased flex flex-col min-h-screen">
    
    <nav class="bg-white shadow-sm border-b border-gray-100 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center gap-2">
                        <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                        </div>
                        <span class="font-bold text-xl tracking-tight text-blue-900">UniHouse</span>
                    </a>
                    <div class="hidden sm:ml-8 sm:flex sm:space-x-8">
                        <a href="{{ route('listings.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium text-gray-500 hover:text-blue-600 hover:border-blue-600 transition-colors">Imóveis</a>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    @guest
                        <a href="{{ route('login') }}" class="text-sm font-medium text-gray-500 hover:text-gray-900">Entrar</a>
                        <a href="{{ route('register') }}" class="text-sm font-medium bg-blue-600 text-white px-4 py-2 rounded-full hover:bg-blue-700 transition-colors shadow-sm shadow-blue-200">Cadastrar</a>
                    @else
                        <div class="flex items-center gap-4">
                            @if(Auth::user()->isAdmin())
                                <a href="{{ route('admin.dashboard') }}" class="text-sm font-medium bg-red-50 text-red-700 px-4 py-2 rounded-full hover:bg-red-100 transition-colors">Painel Admin</a>
                            @elseif(Auth::user()->isLandlord())
                                <a href="{{ route('listings.create') }}" class="text-sm font-medium bg-blue-50 text-blue-700 px-4 py-2 rounded-full hover:bg-blue-100 transition-colors">Anunciar Imóvel</a>
                            @endif
                            <a href="{{ route('profile.index') }}" class="text-sm font-medium text-gray-700 hover:text-blue-600 transition-colors">{{ Auth::user()->name }}</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="text-sm font-medium text-red-500 hover:text-red-700">Sair</button>
                            </form>
                        </div>
                    @endguest
                </div>
            </div>
        </div>
    </nav>

    <main class="flex-grow">
        @yield('content')
    </main>

    <footer class="bg-white border-t border-gray-100 mt-auto">
        <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
            <p class="text-center text-sm text-gray-500">&copy; {{ date('Y') }} UniHouse. Todos os direitos reservados.</p>
        </div>
    </footer>
</body>
</html>
