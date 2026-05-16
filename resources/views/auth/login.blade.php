@extends('layouts.app')

@section('content')
<div class="min-h-[calc(100vh-4rem)] flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 bg-gray-50/50 relative overflow-hidden">
    <div class="absolute inset-0 bg-blue-50/30 backdrop-blur-[1px]"></div>
    
    <div class="max-w-md w-full space-y-8 bg-white p-10 rounded-3xl shadow-xl shadow-blue-100/50 border border-white/60 relative z-10 backdrop-blur-md">
        <div>
            <div class="mx-auto w-12 h-12 bg-blue-600 rounded-xl flex items-center justify-center mb-6">
                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path></svg>
            </div>
            <h2 class="mt-2 text-center text-3xl font-extrabold text-gray-900 tracking-tight">
                Acesse sua conta
            </h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                Ou <a href="{{ route('register') }}" class="font-medium text-blue-600 hover:text-blue-500 transition-colors">crie uma nova conta gratuitamente</a>
            </p>
        </div>
        
        <form class="mt-8 space-y-6" action="{{ route('login') }}" method="POST">
            @csrf
            <div class="space-y-4">
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
                    <input id="email" name="email" type="email" required class="appearance-none relative block w-full px-4 py-3 border border-gray-200 placeholder-gray-400 text-gray-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm transition-all mt-1" placeholder="seu@email.com" value="{{ old('email') }}">
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Senha</label>
                    <input id="password" name="password" type="password" required class="appearance-none relative block w-full px-4 py-3 border border-gray-200 placeholder-gray-400 text-gray-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm transition-all mt-1" placeholder="••••••••">
                </div>
            </div>

            <div>
                <button type="submit" class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-xl text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all shadow-md shadow-blue-200 hover:shadow-lg hover:shadow-blue-300">
                    Entrar no UniHouse
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
