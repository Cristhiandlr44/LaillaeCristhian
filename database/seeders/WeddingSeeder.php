<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Story;
use App\Models\Venue;
use App\Models\Gift;

class WeddingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Stories
        $stories = [
            [
                'title' => 'Nosso Primeiro Encontro',
                'content' => 'Foi em uma tarde ensolarada de verão que nossos caminhos se cruzaram pela primeira vez. Cristhian estava na biblioteca da universidade quando Lailla entrou procurando um livro. Ele não conseguiu tirar os olhos dela, e quando ela pediu ajuda para encontrar o livro, ele soube que aquele era o momento mais importante da sua vida. A conversa fluiu naturalmente, como se já se conhecessem há anos. Naquele dia, descobrimos que tínhamos muito mais em comum do que imaginávamos - os mesmos gostos musicais, filmes favoritos e, principalmente, os mesmos sonhos para o futuro.',
                'image_url' => 'https://images.unsplash.com/photo-1516589178581-6cd7833ae3b2?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                'story_date' => '2020-03-15',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'O Primeiro "Eu Te Amo"',
                'content' => 'Três meses depois do nosso primeiro encontro, em uma caminhada no parque onde costumávamos nos encontrar, Cristhian finalmente teve coragem de dizer as três palavras mágicas. Era uma noite estrelada, e estávamos sentados no nosso banco favorito, observando o lago. Quando ele disse "Eu te amo", Lailla sentiu o coração acelerar e respondeu que também o amava. Naquele momento, soubemos que nosso amor era verdadeiro e que queríamos construir algo especial juntos. Foi o início oficial da nossa história de amor.',
                'image_url' => 'https://images.unsplash.com/photo-1518621012620-d9c8b60e5b7d?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                'story_date' => '2020-06-22',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Morando Juntos',
                'content' => 'Depois de um ano namorando, decidimos dar o próximo passo: morar juntos. Foi uma decisão natural, pois já passávamos a maior parte do tempo na casa um do outro. Encontramos um apartamento aconchegante que logo se tornou nosso lar. Aprendemos muito um sobre o outro nessa fase - descobrimos que Cristhian é quem cozinha melhor, enquanto Lailla tem um talento especial para decorar e organizar. Cada dia juntos fortalecia nossa relação e nossa certeza de que éramos feitos um para o outro.',
                'image_url' => 'https://images.unsplash.com/photo-1560472354-b33ff0c44a43?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                'story_date' => '2021-04-10',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'O Pedido de Casamento',
                'content' => 'Em uma viagem romântica para as montanhas, no mesmo local onde tivemos nosso primeiro "eu te amo", Cristhian preparou uma surpresa inesquecível. Durante o pôr do sol, com a vista mais linda que já vimos, ele se ajoelhou e pediu Lailla em casamento. Com lágrimas nos olhos e o coração transbordando de felicidade, ela disse "SIM!" sem hesitar. Aquele momento mágico selou nosso compromisso de amor eterno. O anel era perfeito, mas o mais importante era o amor sincero que compartilhávamos. Agora, estamos ansiosos para celebrar esse amor com todos que amamos.',
                'image_url' => 'https://images.unsplash.com/photo-1469371670807-013ccf25f16a?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                'story_date' => '2025-02-14',
                'order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($stories as $story) {
            Story::create($story);
        }

        // Create Venues
        $venues = [
            [
                'name' => 'Igreja São José',
                'type' => 'ceremony',
                'description' => 'Uma linda igreja histórica onde trocaremos nossos votos matrimoniais. Um local sagrado e especial para começarmos nossa jornada como marido e mulher.',
                'address' => 'Rua das Flores, 123',
                'city' => 'São Paulo',
                'state' => 'SP',
                'postal_code' => '01234-567',
                'latitude' => -23.5505,
                'longitude' => -46.6333,
                'phone' => '(11) 3456-7890',
                'website' => 'https://igrejasaojose.com.br',
                'image_url' => 'https://images.unsplash.com/photo-1519741497674-611481863552?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                'event_time' => '16:00:00',
                'event_date' => '2026-05-09',
            ],
            [
                'name' => 'Espaço Villa Jardim',
                'type' => 'reception',
                'description' => 'Um espaço encantador com jardins exuberantes onde celebraremos nossa recepção. Um ambiente perfeito para festejar com família e amigos.',
                'address' => 'Avenida dos Jardins, 456',
                'city' => 'São Paulo',
                'state' => 'SP',
                'postal_code' => '01234-890',
                'latitude' => -23.5615,
                'longitude' => -46.6562,
                'phone' => '(11) 9876-5432',
                'website' => 'https://villajardim.com.br',
                'image_url' => 'https://images.unsplash.com/photo-1464207687429-7505649dae38?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                'event_time' => '18:30:00',
                'event_date' => '2026-05-09',
            ],
        ];

        foreach ($venues as $venue) {
            Venue::create($venue);
        }

        // Create Gifts
        $gifts = [
            [
                'name' => 'Jogo de Panelas Antiaderente',
                'description' => 'Conjunto completo de panelas antiaderentes para nossa nova cozinha. Perfeito para começarmos a cozinhar juntos como família.',
                'price' => 299.90,
                'image_url' => 'https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                'store_url' => 'https://exemplo.com/panelas',
                'is_purchased' => false,
            ],
            [
                'name' => 'Edredom Casal King Size',
                'description' => 'Edredom confortável e elegante para nosso quarto. Tecido macio e design moderno para noites aconchegantes.',
                'price' => 189.90,
                'image_url' => 'https://images.unsplash.com/photo-1505693416388-ac5ce068fe85?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                'store_url' => 'https://exemplo.com/edredom',
                'is_purchased' => false,
            ],
            [
                'name' => 'Liquidificador Premium',
                'description' => 'Liquidificador potente para vitaminas, sucos e receitas especiais. Essencial para uma alimentação saudável.',
                'price' => 159.90,
                'image_url' => 'https://images.unsplash.com/photo-1570222094114-d054a817e56b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                'store_url' => 'https://exemplo.com/liquidificador',
                'is_purchased' => false,
            ],
            [
                'name' => 'Jogo de Toalhas de Banho',
                'description' => 'Conjunto de toalhas macias e absorventes. Qualidade premium para nosso banheiro.',
                'price' => 129.90,
                'image_url' => 'https://images.unsplash.com/photo-1584464491033-06628f3a6b7b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                'store_url' => 'https://exemplo.com/toalhas',
                'is_purchased' => false,
            ],
            [
                'name' => 'Cafeteira Elétrica',
                'description' => 'Cafeteira moderna para nossos cafés da manhã especiais. Para começar o dia com energia e amor.',
                'price' => 219.90,
                'image_url' => 'https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                'store_url' => 'https://exemplo.com/cafeteira',
                'is_purchased' => false,
            ],
            [
                'name' => 'Aspirador de Pó',
                'description' => 'Aspirador potente e prático para manter nossa casa sempre limpa e aconchegante.',
                'price' => 349.90,
                'image_url' => 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                'store_url' => 'https://exemplo.com/aspirador',
                'is_purchased' => true,
                'purchased_by' => 'Família Silva',
                'purchased_at' => now(),
            ],
            [
                'name' => 'Ferro de Passar a Vapor',
                'description' => 'Ferro moderno com vapor para manter nossas roupas sempre impecáveis.',
                'price' => 89.90,
                'image_url' => 'https://images.unsplash.com/photo-1582735689369-4fe89db7114c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                'store_url' => 'https://exemplo.com/ferro',
                'is_purchased' => false,
            ],
            [
                'name' => 'Conjunto de Pratos',
                'description' => 'Jogo de pratos elegante para 8 pessoas. Perfeito para nossas refeições em família e jantares com amigos.',
                'price' => 179.90,
                'image_url' => 'https://images.unsplash.com/photo-1578662996442-48f60103fc96?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                'store_url' => 'https://exemplo.com/pratos',
                'is_purchased' => false,
            ],
            [
                'name' => 'Micro-ondas Digital',
                'description' => 'Micro-ondas moderno e eficiente para nossa cozinha. Praticidade no dia a dia.',
                'price' => 399.90,
                'image_url' => 'https://images.unsplash.com/photo-1574269909862-7e1d70bb8078?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                'store_url' => 'https://exemplo.com/microondas',
                'is_purchased' => false,
            ],
        ];

        foreach ($gifts as $gift) {
            Gift::create($gift);
        }
    }
}
