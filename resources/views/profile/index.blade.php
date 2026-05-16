@extends('layouts.app')

@section('content')
<div class="bg-gray-50/50 py-12 min-h-[calc(100vh-4rem)]">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight mb-8">Meu Perfil</h1>

        @if(session('success'))
            <div class="mb-8 bg-green-50 border border-green-200 text-green-700 px-6 py-4 rounded-2xl flex items-center gap-3">
                <svg class="w-6 h-6 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <span class="font-medium">{{ session('success') }}</span>
            </div>
        @endif

        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden mb-8">
            <div class="p-8 sm:p-10 flex items-center gap-6">
                <div class="w-24 h-24 bg-blue-100 rounded-full flex items-center justify-center text-blue-700 font-bold text-3xl shadow-sm border border-blue-200 flex-shrink-0">
                    {{ substr($user->name, 0, 1) }}
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-gray-900">{{ $user->name }}</h2>
                    <p class="text-gray-500 mb-2">{{ $user->email }}</p>
                    <div class="inline-flex items-center px-3 py-1 rounded-full text-sm font-bold tracking-wide {{ $user->isLandlord() ? 'bg-blue-100 text-blue-800' : 'bg-gray-100 text-gray-800' }}">
                        {{ ucfirst($user->role) }}
                    </div>
                </div>
            </div>
        </div>

        @if($user->isStudent())
            <div class="bg-gradient-to-br from-blue-600 to-blue-800 rounded-3xl shadow-xl shadow-blue-200 overflow-hidden relative">
                <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-5 rounded-full blur-3xl transform translate-x-1/2 -translate-y-1/2"></div>
                <div class="p-8 sm:p-10 relative z-10 flex flex-col sm:flex-row items-center justify-between gap-8">
                    <div class="text-white text-center sm:text-left">
                        <h3 class="text-2xl font-extrabold mb-3">Tem um imóvel para alugar?</h3>
                        <p class="text-blue-100 max-w-md leading-relaxed">
                            Você está cadastrado como estudante, mas se você tiver uma vaga, quarto ou imóvel, pode se tornar um <strong class="text-white">Locador</strong> agora mesmo, de forma totalmente gratuita!
                        </p>
                    </div>
                    <form action="{{ route('profile.upgrade') }}" method="POST" class="w-full sm:w-auto">
                        @csrf
                        <button type="submit" class="w-full sm:w-auto whitespace-nowrap px-8 py-4 bg-white text-blue-700 font-extrabold rounded-2xl shadow-lg hover:bg-blue-50 transition-all hover:-translate-y-1 hover:shadow-xl focus:ring-4 focus:ring-white/30">
                            Quero ser Locador
                        </button>
                    </form>
                </div>
            </div>
        @elseif($user->isLandlord())
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8 sm:p-10">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-8 border-b border-gray-100 pb-6">
                    <h3 class="text-xl font-bold text-gray-900">Meus Anúncios Publicados</h3>
                    <a href="{{ route('listings.create') }}" class="text-sm font-bold bg-blue-50 text-blue-700 px-5 py-2.5 rounded-xl hover:bg-blue-100 transition-colors text-center">Criar Novo Anúncio</a>
                </div>
                
                @if($user->listings->isEmpty())
                    <div class="text-center py-12 bg-gray-50 rounded-2xl border border-dashed border-gray-200">
                        <svg class="mx-auto h-12 w-12 text-gray-300 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                        <p class="text-gray-500 font-medium">Você ainda não tem imóveis anunciados.</p>
                        <p class="text-gray-400 text-sm mt-1">Crie seu primeiro anúncio clicando no botão acima.</p>
                    </div>
                @else
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach($user->listings as $listing)
                            <div class="flex items-center gap-4 p-4 bg-gray-50 border border-gray-100 rounded-2xl hover:bg-white hover:shadow-md hover:border-blue-100 transition-all group">
                                <div class="w-20 h-20 bg-gray-200 rounded-xl overflow-hidden flex-shrink-0">
                                    @if($listing->coverImage)
                                        <img src="{{ Storage::url($listing->coverImage->path) }}" class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full bg-blue-50 flex items-center justify-center text-blue-200">
                                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        </div>
                                    @endif
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h4 class="font-bold text-gray-900 truncate group-hover:text-blue-600 transition-colors">{{ $listing->title }}</h4>
                                    <p class="text-sm font-medium text-blue-600">{{ $listing->price_formatted }}</p>
                                    <p class="text-xs text-gray-500 mt-1 uppercase tracking-wide">{{ $listing->type }}</p>
                                </div>
                                <a href="{{ route('listings.show', $listing) }}" class="p-2 text-gray-400 hover:text-blue-600 bg-white rounded-full shadow-sm border border-gray-100 hover:bg-blue-50 transition-colors" title="Ver Anúncio">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                                </a>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        @endif

    </div>
</div>
@endsection
