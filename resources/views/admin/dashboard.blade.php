@extends('layouts.app')

@section('content')
<div class="bg-gray-50/50 py-12 min-h-[calc(100vh-4rem)]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight mb-8">Painel do Administrador</h1>

        @if(session('success'))
            <div class="mb-8 bg-green-50 border border-green-200 text-green-700 px-6 py-4 rounded-2xl flex items-center gap-3">
                <svg class="w-6 h-6 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <span class="font-medium">{{ session('success') }}</span>
            </div>
        @endif

        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8 sm:p-10">
            <h3 class="text-xl font-bold text-gray-900 mb-6">Anúncios Pendentes de Aprovação</h3>

            @if($pendingListings->isEmpty())
                <div class="text-center py-12 bg-gray-50 rounded-2xl border border-dashed border-gray-200">
                    <svg class="mx-auto h-12 w-12 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 13l4 4L19 7"></path></svg>
                    <p class="text-gray-500 font-medium">Não há nenhum anúncio pendente no momento.</p>
                </div>
            @else
                <div class="space-y-4">
                    @foreach($pendingListings as $listing)
                        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 p-5 bg-gray-50 border border-gray-100 rounded-2xl hover:bg-white hover:shadow-md transition-all">
                            <div class="flex-1">
                                <div class="flex items-center gap-3 mb-1">
                                    <h4 class="font-bold text-gray-900 text-lg">{{ $listing->title }}</h4>
                                    <span class="bg-yellow-100 text-yellow-800 text-xs font-bold px-2 py-1 rounded-full uppercase tracking-wide">Pendente</span>
                                </div>
                                <p class="text-sm text-gray-500">Publicado por: <span class="font-medium text-gray-700">{{ $listing->user->name }}</span> ({{ $listing->user->email }})</p>
                                <p class="text-sm font-bold text-blue-600 mt-1">{{ $listing->price_formatted }} • {{ ucfirst($listing->type) }}</p>
                            </div>
                            
                            <div class="flex items-center gap-3">
                                <a href="{{ route('listings.show', $listing) }}" target="_blank" class="px-4 py-2 bg-white border border-gray-200 text-gray-700 font-bold rounded-xl hover:bg-gray-50 text-sm transition-colors">Visualizar</a>
                                
                                <form action="{{ route('admin.approve', $listing) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="px-4 py-2 bg-green-600 text-white font-bold rounded-xl hover:bg-green-700 text-sm shadow-sm shadow-green-200 transition-colors">Aprovar</button>
                                </form>

                                <form action="{{ route('admin.reject', $listing) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="px-4 py-2 bg-red-100 text-red-700 font-bold rounded-xl hover:bg-red-200 text-sm transition-colors">Rejeitar</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
