@extends('layouts.app')

@section('content')
<div class="bg-gray-50/50 py-12 min-h-[calc(100vh-4rem)]">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="mb-8">
            <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">Anunciar Novo Imóvel</h1>
            <p class="mt-2 text-sm text-gray-500">Preencha os dados abaixo para publicar seu imóvel no UniHouse.</p>
        </div>

        @if ($errors->any())
            <div class="mb-8 bg-red-50 border border-red-200 text-red-700 px-6 py-4 rounded-2xl">
                <ul class="list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white rounded-3xl shadow-xl shadow-blue-50/50 border border-gray-100 overflow-hidden">
            <form action="{{ route('listings.store') }}" method="POST" class="p-8 sm:p-10 space-y-10">
                @csrf

                <!-- Informações Básicas -->
                <div>
                    <h3 class="text-xl font-bold text-gray-900 border-b border-gray-100 pb-3 mb-6">Informações Básicas</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="md:col-span-2">
                            <label class="block text-sm font-bold text-gray-700 mb-2">Título do Anúncio</label>
                            <input type="text" name="title" value="{{ old('title') }}" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all bg-gray-50 focus:bg-white" placeholder="Ex: Apartamento 2 quartos próximo à UFMG">
                        </div>
                        
                        <div class="md:col-span-2">
                            <label class="block text-sm font-bold text-gray-700 mb-2">Descrição</label>
                            <textarea name="description" rows="4" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all bg-gray-50 focus:bg-white" placeholder="Descreva os detalhes do imóvel...">{{ old('description') }}</textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Tipo de Imóvel</label>
                            <select name="type" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all bg-gray-50 focus:bg-white">
                                <option value="casa" {{ old('type') == 'casa' ? 'selected' : '' }}>Casa</option>
                                <option value="apartamento" {{ old('type') == 'apartamento' ? 'selected' : '' }}>Apartamento</option>
                                <option value="quarto" {{ old('type') == 'quarto' ? 'selected' : '' }}>Quarto</option>
                                <option value="kitnet" {{ old('type') == 'kitnet' ? 'selected' : '' }}>Kitnet</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Valor do Aluguel (R$)</label>
                            <input type="number" step="0.01" name="price_cents" value="{{ old('price_cents') }}" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all bg-gray-50 focus:bg-white" placeholder="Ex: 1500.00">
                        </div>
                    </div>
                </div>

                <!-- Detalhes do Imóvel -->
                <div>
                    <h3 class="text-xl font-bold text-gray-900 border-b border-gray-100 pb-3 mb-6">Detalhes do Imóvel</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Quartos</label>
                            <input type="number" name="bedrooms" min="0" value="{{ old('bedrooms', 0) }}" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all bg-gray-50 focus:bg-white" placeholder="Ex: 2">
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Banheiros</label>
                            <input type="number" name="bathrooms" min="0" value="{{ old('bathrooms', 1) }}" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all bg-gray-50 focus:bg-white" placeholder="Ex: 1">
                        </div>
                    </div>

                    <div class="mt-8 flex flex-wrap gap-8">
                        <label class="relative flex items-center gap-3 cursor-pointer group">
                            <input type="checkbox" name="furnished" value="1" {{ old('furnished') ? 'checked' : '' }} class="w-6 h-6 text-blue-600 border-gray-300 rounded-md focus:ring-blue-500 transition-all group-hover:border-blue-400">
                            <span class="text-sm font-bold text-gray-700 group-hover:text-blue-700 transition-colors">Mobiliado</span>
                        </label>

                        <label class="relative flex items-center gap-3 cursor-pointer group">
                            <input type="checkbox" name="pets_allowed" value="1" {{ old('pets_allowed') ? 'checked' : '' }} class="w-6 h-6 text-blue-600 border-gray-300 rounded-md focus:ring-blue-500 transition-all group-hover:border-blue-400">
                            <span class="text-sm font-bold text-gray-700 group-hover:text-blue-700 transition-colors">Aceita Pets</span>
                        </label>

                        <label class="relative flex items-center gap-3 cursor-pointer group">
                            <input type="checkbox" name="internet_included" value="1" {{ old('internet_included') ? 'checked' : '' }} class="w-6 h-6 text-blue-600 border-gray-300 rounded-md focus:ring-blue-500 transition-all group-hover:border-blue-400">
                            <span class="text-sm font-bold text-gray-700 group-hover:text-blue-700 transition-colors">Internet Inclusa</span>
                        </label>
                    </div>
                </div>

                <!-- Endereço -->
                <div>
                    <h3 class="text-xl font-bold text-gray-900 border-b border-gray-100 pb-3 mb-6">Endereço</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="md:col-span-2">
                            <label class="block text-sm font-bold text-gray-700 mb-2">Rua / Avenida</label>
                            <input type="text" name="street" value="{{ old('street') }}" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all bg-gray-50 focus:bg-white">
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Número</label>
                            <input type="text" name="number" value="{{ old('number') }}" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all bg-gray-50 focus:bg-white">
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Bairro</label>
                            <input type="text" name="neighborhood" value="{{ old('neighborhood') }}" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all bg-gray-50 focus:bg-white">
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Cidade</label>
                            <input type="text" name="city" value="{{ old('city') }}" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all bg-gray-50 focus:bg-white">
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">UF</label>
                                <input type="text" name="state" value="{{ old('state') }}" maxlength="2" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all uppercase bg-gray-50 focus:bg-white" placeholder="SP">
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">CEP</label>
                                <input type="text" name="zipcode" value="{{ old('zipcode') }}" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all bg-gray-50 focus:bg-white" placeholder="00000000">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pt-8 border-t border-gray-100 flex items-center justify-end gap-4">
                    <a href="{{ route('listings.index') }}" class="px-6 py-3.5 border border-gray-200 shadow-sm text-sm font-bold rounded-xl text-gray-700 bg-white hover:bg-gray-50 hover:text-gray-900 transition-all">
                        Cancelar
                    </a>
                    <button type="submit" class="px-8 py-3.5 border border-transparent text-sm font-bold rounded-xl text-white bg-blue-600 hover:bg-blue-700 shadow-lg shadow-blue-200 hover:shadow-xl hover:shadow-blue-300 hover:-translate-y-0.5 transition-all">
                        Publicar Anúncio
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
