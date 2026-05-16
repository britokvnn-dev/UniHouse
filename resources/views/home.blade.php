@extends('layouts.app')

@section('content')
<div class="relative bg-white overflow-hidden min-h-[calc(100vh-4rem)] flex items-center">
    <div class="max-w-7xl mx-auto w-full">
        <div class="relative z-10 bg-white lg:max-w-2xl lg:w-full px-4 sm:px-6 lg:px-8 py-16 lg:py-0">
            <div class="sm:text-center lg:text-left">
                <span class="text-blue-600 font-semibold tracking-wide uppercase text-sm mb-4 block">Bem-vindo ao UniHouse</span>
                <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                    <span class="block">Sua moradia ideal</span>
                    <span class="block text-blue-600 mt-2">perto da faculdade</span>
                </h1>
                <p class="mt-6 text-base text-gray-500 sm:text-lg sm:max-w-xl sm:mx-auto md:text-xl lg:mx-0 leading-relaxed">
                    O UniHouse conecta estudantes a repúblicas, kitnets e apartamentos de forma rápida e segura. Encontre seu próximo lar com facilidade e foque no que importa: seus estudos.
                </p>
                <div class="mt-8 sm:flex sm:justify-center lg:justify-start gap-4">
                    <div class="rounded-full shadow-lg shadow-blue-200">
                        <a href="{{ route('listings.index') }}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-full text-white bg-blue-600 hover:bg-blue-700 md:py-4 md:text-lg md:px-10 transition-all hover:scale-105">
                            Ver Imóveis
                        </a>
                    </div>
                    <div class="mt-3 sm:mt-0">
                        <a href="{{ route('register') }}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-full text-blue-700 bg-blue-50 hover:bg-blue-100 md:py-4 md:text-lg md:px-10 transition-all hover:scale-105">
                            Criar Conta
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="hidden lg:block lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2 bg-blue-50/50 backdrop-blur-sm">
        <div class="h-full w-full flex items-center justify-center p-12">
            <div class="relative w-full max-w-lg aspect-square">
                <div class="absolute inset-0 bg-blue-200 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob"></div>
                <div class="absolute top-0 right-0 w-72 h-72 bg-blue-300 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob animation-delay-2000"></div>
                <div class="absolute -bottom-8 left-20 w-72 h-72 bg-blue-100 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob animation-delay-4000"></div>
                <div class="relative w-full h-full bg-white/40 backdrop-blur-md rounded-3xl border border-white/60 shadow-2xl overflow-hidden flex items-center justify-center">
                    <svg class="w-32 h-32 text-blue-400 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    @keyframes blob {
        0% { transform: translate(0px, 0px) scale(1); }
        33% { transform: translate(30px, -50px) scale(1.1); }
        66% { transform: translate(-20px, 20px) scale(0.9); }
        100% { transform: translate(0px, 0px) scale(1); }
    }
    .animate-blob {
        animation: blob 7s infinite;
    }
    .animation-delay-2000 {
        animation-delay: 2s;
    }
    .animation-delay-4000 {
        animation-delay: 4s;
    }
</style>
@endsection
