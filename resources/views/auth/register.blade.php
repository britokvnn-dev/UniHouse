@extends('layouts.app')

@section('content')
<div class="min-h-[calc(100vh-4rem)] flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 bg-gray-50/50 relative overflow-hidden">
    <div class="absolute inset-0 bg-blue-50/30 backdrop-blur-[1px]"></div>
    
    <div class="max-w-xl w-full space-y-8 bg-white p-10 rounded-3xl shadow-xl shadow-blue-100/50 border border-white/60 relative z-10 backdrop-blur-md">
        <div>
            <div class="mx-auto w-12 h-12 bg-blue-600 rounded-xl flex items-center justify-center mb-6">
                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
            </div>
            <h2 class="mt-2 text-center text-3xl font-extrabold text-gray-900 tracking-tight">
                Crie sua conta
            </h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                Já tem uma conta? <a href="{{ route('login') }}" class="font-medium text-blue-600 hover:text-blue-500 transition-colors">Faça login</a>
            </p>
        </div>
        
        <form class="mt-8 space-y-6" action="{{ route('register') }}" method="POST">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="md:col-span-2">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nome Completo</label>
                    <input id="name" name="name" type="text" required class="appearance-none relative block w-full px-4 py-3 border border-gray-200 placeholder-gray-400 text-gray-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm transition-all mt-1" value="{{ old('name') }}">
                    @error('name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                <div class="md:col-span-2">
                    <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
                    <input id="email" name="email" type="email" required class="appearance-none relative block w-full px-4 py-3 border border-gray-200 placeholder-gray-400 text-gray-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm transition-all mt-1" value="{{ old('email') }}">
                    @error('email')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Senha</label>
                    <input id="password" name="password" type="password" required class="appearance-none relative block w-full px-4 py-3 border border-gray-200 placeholder-gray-400 text-gray-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm transition-all mt-1">
                    @error('password')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirmar Senha</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" required class="appearance-none relative block w-full px-4 py-3 border border-gray-200 placeholder-gray-400 text-gray-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm transition-all mt-1">
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Eu sou um(a):</label>
                    <div class="grid grid-cols-2 gap-4">
                        <label class="relative flex cursor-pointer rounded-xl border border-gray-200 bg-white p-4 shadow-sm hover:border-blue-200 hover:bg-blue-50 focus:outline-none transition-all has-[:checked]:border-blue-500 has-[:checked]:ring-1 has-[:checked]:ring-blue-500">
                            <input type="radio" name="role" value="estudante" class="sr-only" required>
                            <span class="flex flex-col">
                                <span class="block text-sm font-medium text-gray-900">Estudante</span>
                                <span class="block text-xs text-gray-500 mt-1">Quero alugar um imóvel</span>
                            </span>
                        </label>

                        <label class="relative flex cursor-pointer rounded-xl border border-gray-200 bg-white p-4 shadow-sm hover:border-blue-200 hover:bg-blue-50 focus:outline-none transition-all has-[:checked]:border-blue-500 has-[:checked]:ring-1 has-[:checked]:ring-blue-500">
                            <input type="radio" name="role" value="locador" class="sr-only" required>
                            <span class="flex flex-col">
                                <span class="block text-sm font-medium text-gray-900">Locador / Dono</span>
                                <span class="block text-xs text-gray-500 mt-1">Quero anunciar meus imóveis</span>
                            </span>
                        </label>
                    </div>
                    @error('role')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
            </div>

            <div class="pt-2">
                <button type="submit" class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-xl text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all shadow-md shadow-blue-200 hover:shadow-lg hover:shadow-blue-300">
                    Criar Conta
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
