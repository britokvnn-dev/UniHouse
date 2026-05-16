@extends('layouts.app')

@section('content')
<div class="bg-gray-50/50 py-8 min-h-[calc(100vh-4rem)]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Breadcrumb & Actions -->
        <div class="flex items-center justify-between mb-6">
            <nav class="flex text-sm text-gray-500 font-medium">
                <a href="{{ route('listings.index') }}" class="hover:text-blue-600 flex items-center gap-1 transition-colors bg-white px-4 py-2 rounded-full shadow-sm border border-gray-100">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Voltar para imóveis
                </a>
            </nav>
        </div>

        <div class="bg-white rounded-[2rem] shadow-sm border border-gray-100 overflow-hidden">
            <!-- Image Gallery Header -->
            <div class="relative h-64 sm:h-80 lg:h-[28rem] w-full bg-gray-100 group">
                @if($listing->coverImage)
                    <img src="{{ Storage::url($listing->coverImage->path) }}" alt="{{ $listing->title }}" class="w-full h-full object-cover">
                @else
                    <div class="w-full h-full flex items-center justify-center bg-blue-50">
                        <svg class="w-24 h-24 text-blue-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    </div>
                @endif
                <div class="absolute top-6 left-6 bg-white/90 backdrop-blur-md px-4 py-1.5 rounded-full text-sm font-bold text-blue-700 uppercase tracking-wider shadow-sm">
                    {{ $listing->type }}
                </div>
            </div>

            <div class="p-6 sm:p-10 lg:p-12">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                    
                    <!-- Main Content -->
                    <div class="lg:col-span-2 space-y-10">
                        <div>
                            <h1 class="text-3xl sm:text-4xl font-extrabold text-gray-900 tracking-tight leading-tight">{{ $listing->title }}</h1>
                            <p class="mt-4 text-lg text-gray-500 flex items-start sm:items-center gap-2">
                                <svg class="w-6 h-6 text-blue-500 flex-shrink-0 mt-0.5 sm:mt-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                {{ $listing->address->street ?? '' }}, {{ $listing->address->number ?? '' }} - {{ $listing->address->neighborhood ?? '' }}, {{ $listing->address->city ?? '' }} - {{ $listing->address->state ?? '' }}
                            </p>
                        </div>

                        <!-- Features Grid -->
                        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 py-8 border-y border-gray-100">
                            <div class="flex flex-col items-center p-5 bg-blue-50/50 rounded-2xl border border-blue-100/50">
                                <svg class="w-8 h-8 text-blue-600 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                                <span class="text-xl font-bold text-gray-900">{{ $listing->bedrooms }}</span>
                                <span class="text-xs font-medium text-gray-500 uppercase tracking-wider mt-1">Quartos</span>
                            </div>
                            <div class="flex flex-col items-center p-5 bg-blue-50/50 rounded-2xl border border-blue-100/50">
                                <svg class="w-8 h-8 text-blue-600 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                                <span class="text-xl font-bold text-gray-900">{{ $listing->bathrooms }}</span>
                                <span class="text-xs font-medium text-gray-500 uppercase tracking-wider mt-1">Banheiros</span>
                            </div>
                            <div class="flex flex-col items-center p-5 bg-blue-50/50 rounded-2xl border border-blue-100/50">
                                <svg class="w-8 h-8 {{ $listing->furnished ? 'text-blue-600' : 'text-gray-400' }} mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                                <span class="text-xl font-bold text-gray-900">{{ $listing->furnished ? 'Sim' : 'Não' }}</span>
                                <span class="text-xs font-medium text-gray-500 uppercase tracking-wider mt-1">Mobiliado</span>
                            </div>
                            <div class="flex flex-col items-center p-5 bg-blue-50/50 rounded-2xl border border-blue-100/50">
                                <svg class="w-8 h-8 {{ $listing->pets_allowed ? 'text-blue-600' : 'text-gray-400' }} mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"></path></svg>
                                <span class="text-xl font-bold text-gray-900">{{ $listing->pets_allowed ? 'Sim' : 'Não' }}</span>
                                <span class="text-xs font-medium text-gray-500 uppercase tracking-wider mt-1">Pets</span>
                            </div>
                        </div>

                        <div>
                            <h3 class="text-2xl font-bold text-gray-900 mb-4">Descrição do Imóvel</h3>
                            <div class="prose prose-blue max-w-none text-gray-600 text-lg leading-relaxed">
                                {!! nl2br(e($listing->description)) !!}
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar Pricing & Contact -->
                    <div class="lg:col-span-1">
                        <div class="bg-white border border-blue-100 rounded-3xl p-8 shadow-2xl shadow-blue-50/50 sticky top-24">
                            <div class="mb-8 pb-8 border-b border-gray-100">
                                <p class="text-sm font-bold text-gray-500 uppercase tracking-widest mb-2">Valor do Aluguel</p>
                                <div class="flex items-end gap-1">
                                    <p class="text-5xl font-extrabold text-blue-600 tracking-tighter">{{ $listing->price_formatted }}</p>
                                    <span class="text-gray-500 font-medium mb-2">/mês</span>
                                </div>
                            </div>
                            
                            <div class="mb-8">
                                <h4 class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-4">Anunciante</h4>
                                <div class="flex items-center gap-4 bg-gray-50 p-4 rounded-2xl">
                                    <div class="w-14 h-14 bg-blue-100 rounded-full flex items-center justify-center text-blue-700 font-bold text-xl shadow-sm border border-blue-200">
                                        {{ substr($listing->user->name ?? 'A', 0, 1) }}
                                    </div>
                                    <div>
                                        <p class="font-bold text-gray-900 text-lg">{{ $listing->user->name ?? 'Anônimo' }}</p>
                                        <p class="text-sm text-blue-600 flex items-center gap-1 font-medium mt-0.5">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                            Locador verificado
                                        </p>
                                    </div>
                                </div>
                            </div>

                            @auth
                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $listing->user->phone ?? '') }}?text=Olá,%20tenho%20interesse%20no%20imóvel:%20{{ $listing->title }}" target="_blank" class="w-full flex items-center justify-center gap-3 px-6 py-4 border border-transparent text-lg font-bold rounded-2xl text-white bg-[#25D366] hover:bg-[#128C7E] transition-all shadow-lg shadow-[#25D366]/30 hover:shadow-xl hover:-translate-y-0.5">
                                    <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 00-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                                    Entrar em Contato
                                </a>
                            @else
                                <div class="bg-blue-50/50 rounded-2xl p-6 text-center border border-blue-100 border-dashed">
                                    <svg class="w-10 h-10 text-blue-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                                    <p class="text-sm text-blue-800 font-medium mb-4">Faça login para ver o contato do locador</p>
                                    <a href="{{ route('login') }}" class="inline-block w-full py-3 px-4 bg-white shadow-sm border border-blue-200 text-blue-700 font-bold rounded-xl hover:bg-blue-50 hover:border-blue-300 transition-colors">Entrar agora</a>
                                </div>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
