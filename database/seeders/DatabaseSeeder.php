<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Listing;
use App\Models\ListingImage;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Popula o banco de dados com dados de exemplo.
     */
    public function run(): void
    {
        // ── Usuários de exemplo ───────────────────────────────────────────────

        $admin1 = User::create([
            'name'     => 'Nathan Moraes Almeida',
            'email'    => 'nathanz.mrs@gmail.com',
            'password' => Hash::make('Nathan2829'),
            'role'     => 'admin',
        ]);

        $admin2 = User::create([
            'name'     => 'Kelvinn Brito Santos',
            'email'    => 'kelvinnbrito@gmail.com',
            'password' => Hash::make('123123'),
            'role'     => 'admin',
        ]);

        $locador1 = User::create([
            'name'     => 'Carlos Souza',
            'email'    => 'carlos.locador@unihouse.com',
            'password' => Hash::make('password'),
            'role'     => 'locador',
            'phone'    => '(31) 99999-0001',
        ]);

        $locador2 = User::create([
            'name'     => 'Mariana Lima',
            'email'    => 'mariana.locadora@unihouse.com',
            'password' => Hash::make('password'),
            'role'     => 'locador',
            'phone'    => '(11) 98888-0002',
        ]);

        User::create([
            'name'     => 'João Estudante',
            'email'    => 'joao.estudante@unihouse.com',
            'password' => Hash::make('password'),
            'role'     => 'estudante',
            'phone'    => '(31) 97777-0003',
        ]);

        User::create([
            'name'     => 'Ana Universitária',
            'email'    => 'ana.uni@unihouse.com',
            'password' => Hash::make('password'),
            'role'     => 'estudante',
        ]);

        // ── Anúncios de exemplo ───────────────────────────────────────────────

        $listing1 = Listing::create([
            'user_id'           => $locador1->id,
            'title'             => 'Quarto individual próximo à UFMG',
            'description'       => 'Quarto mobiliado em república estudantil. A 5 minutos da UFMG. Inclui internet, água e luz. Ambiente tranquilo para estudos.',
            'price_cents'       => 85000, // R$ 850,00
            'type'              => 'quarto',
            'status'            => 'ativo',
            'bedrooms'          => 1,
            'bathrooms'         => 1,
            'furnished'         => true,
            'pets_allowed'      => false,
            'internet_included' => true,
        ]);

        Address::create([
            'listing_id'   => $listing1->id,
            'street'       => 'Rua Professor Otávio Coelho',
            'number'       => '120',
            'complement'   => 'Quarto 3',
            'neighborhood' => 'Pampulha',
            'city'         => 'Belo Horizonte',
            'state'        => 'MG',
            'zip_code'     => '31270-140',
            'latitude'     => -19.869720,
            'longitude'    => -43.966240,
        ]);

        ListingImage::create([
            'listing_id' => $listing1->id,
            'image_url'  => '/storage/listings/quarto-pampulha-1.jpg',
            'is_cover'   => true,
            'order'      => 1,
        ]);

        // ──────────────────────────────────────────────────────────────────────

        $listing2 = Listing::create([
            'user_id'           => $locador1->id,
            'title'             => 'Kitnet completa no centro de BH',
            'description'       => 'Kitnet com cozinha, banheiro e área de serviço. Ideal para estudantes que buscam independência. Próxima ao metrô.',
            'price_cents'       => 120000, // R$ 1.200,00
            'type'              => 'kitnet',
            'status'            => 'ativo',
            'bedrooms'          => 1,
            'bathrooms'         => 1,
            'furnished'         => false,
            'pets_allowed'      => true,
            'internet_included' => false,
        ]);

        Address::create([
            'listing_id'   => $listing2->id,
            'street'       => 'Avenida Augusto de Lima',
            'number'       => '588',
            'complement'   => 'Apto 204',
            'neighborhood' => 'Centro',
            'city'         => 'Belo Horizonte',
            'state'        => 'MG',
            'zip_code'     => '30190-001',
            'latitude'     => -19.923330,
            'longitude'    => -43.938100,
        ]);

        ListingImage::create([
            'listing_id' => $listing2->id,
            'image_url'  => '/storage/listings/kitnet-centro-1.jpg',
            'is_cover'   => true,
            'order'      => 1,
        ]);

        // ──────────────────────────────────────────────────────────────────────

        $listing3 = Listing::create([
            'user_id'           => $locador2->id,
            'title'             => 'Apartamento compartilhado perto da USP',
            'description'       => 'Apartamento de 3 quartos para compartilhar com outros estudantes. Condomínio com academia e portaria 24h.',
            'price_cents'       => 95000, // R$ 950,00 por quarto
            'type'              => 'apartamento',
            'status'            => 'ativo',
            'bedrooms'          => 3,
            'bathrooms'         => 2,
            'furnished'         => true,
            'pets_allowed'      => false,
            'internet_included' => true,
        ]);

        Address::create([
            'listing_id'   => $listing3->id,
            'street'       => 'Rua do Lago',
            'number'       => '717',
            'complement'   => 'Bloco B, Apto 51',
            'neighborhood' => 'Butantã',
            'city'         => 'São Paulo',
            'state'        => 'SP',
            'zip_code'     => '05508-080',
            'latitude'     => -23.561350,
            'longitude'    => -46.730570,
        ]);

        ListingImage::create([
            'listing_id' => $listing3->id,
            'image_url'  => '/storage/listings/apto-butanta-1.jpg',
            'is_cover'   => true,
            'order'      => 1,
        ]);

        ListingImage::create([
            'listing_id' => $listing3->id,
            'image_url'  => '/storage/listings/apto-butanta-2.jpg',
            'is_cover'   => false,
            'order'      => 2,
        ]);
    }
}
