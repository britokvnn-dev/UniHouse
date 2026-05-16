@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
    <div class="md:flex md:items-center md:justify-between mb-8">
        <div class="flex-1 min-w-0">
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">Imóveis Disponíveis</h2>
        </div>
        <div class="mt-4 flex md:mt-0 md:ml-4">
            <form action="{{ route('listings.index') }}" method="GET" class="flex w-full md:w-auto shadow-sm rounded-lg overflow-hidden">
                <input type="text" name="search" placeholder="Buscar por título, cidade..." value="{{ request('search') }}" class="w-full md:w-80 px-4 py-2 border-0 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none">
                    Buscar
                </button>
            </form>
        </div>
    </div>

    @if($listings->isEmpty())
        <div class="text-center py-12 bg-white rounded-3xl border border-gray-100 shadow-sm">
            <svg class="mx-auto h-12 w-12 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
            <h3 class="mt-2 text-sm font-medium text-gray-900">Nenhum imóvel encontrado</h3>
            <p class="mt-1 text-sm text-gray-500">Tente ajustar sua busca ou limpar os filtros.</p>
            @if(request('search'))
                <div class="mt-6">
                    <a href="{{ route('listings.index') }}" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-full text-blue-700 bg-blue-50 hover:bg-blue-100 transition-colors">
                        Limpar Busca
                    </a>
                </div>
            @endif
        </div>
    @else
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            @foreach($listings as $listing)
                <a href="{{ route('listings.show', $listing) }}" class="group bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-xl hover:shadow-blue-100/50 transition-all duration-300 flex flex-col hover:-translate-y-1">
                    <div class="relative w-full h-56 bg-gray-100 overflow-hidden">
                        @if($listing->coverImage)
                            <img src="{{ Storage::url($listing->coverImage->path) }}" alt="{{ $listing->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-blue-200 bg-blue-50">
                                <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                            </div>
                        @endif
                        <div class="absolute top-3 right-3 bg-white/90 backdrop-blur-md px-3 py-1 rounded-full text-xs font-bold text-blue-700 uppercase tracking-wider shadow-sm">
                            {{ $listing->type }}
                        </div>
                    </div>
                    <div class="p-6 flex-1 flex flex-col">
                        <div class="flex justify-between items-start">
                            <h3 class="text-lg font-bold text-gray-900 line-clamp-2 group-hover:text-blue-600 transition-colors leading-tight">{{ $listing->title }}</h3>
                        </div>
                        <p class="mt-2 text-sm text-gray-500 flex items-center gap-1">
                            <svg class="w-4 h-4 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            {{ $listing->address->city ?? 'Cidade não informada' }} - {{ $listing->address->state ?? '' }}
                        </p>
                        
                        <div class="mt-4 flex items-center gap-4 text-sm font-medium text-gray-600 border-t border-gray-100 pt-4">
                            <div class="flex items-center gap-1.5 bg-gray-50 px-2 py-1 rounded-md">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                                <span>{{ $listing->bedrooms }} Qts</span>
                            </div>
                            <div class="flex items-center gap-1.5 bg-gray-50 px-2 py-1 rounded-md">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                                <span>{{ $listing->bathrooms }} Banh</span>
                            </div>
                        </div>

                        <div class="mt-5 pt-4 flex items-center justify-between border-t border-gray-100">
                            <p class="text-2xl font-extrabold text-blue-600 tracking-tight">{{ $listing->price_formatted }}<span class="text-sm font-normal text-gray-500">/mês</span></p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

        <div class="mt-10">
            {{ $listings->links() }}
        </div>
    @endif
</div>
@endsection
