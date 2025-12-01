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
                'image_url' => 'https://images.unsplash.com/photo-1518621012620-d9c8b60e5b7b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
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

        // Create Gifts - Lista completa de presentes com imagens locais
        $gifts = [
            // ========== ELETRODOMÉSTICOS ==========
            [
                'name' => 'Aspirador de pó Robô Electrolux',
                'description' => 'Aspirador robô inteligente Electrolux com mapeamento por laser, sucção potente e controle via aplicativo. Perfeito para manter a casa sempre limpa enquanto aproveitamos nosso tempo juntos.',
                'price' => 899.90,
                'image_url' => '/imagens_loja/Aspirador de pó Robô Electrolux.jpg',
                'store_url' => null,
                'is_purchased' => false,
            ],
            [
                'name' => 'Cafeteira Nespresso',
                'description' => 'Cafeteira Nespresso para preparar cafés especiais e expressos cremosos em segundos. Ideal para começar nossas manhãs com o aroma delicioso de um bom café.',
                'price' => 389.50,
                'image_url' => '/imagens_loja/Cafeteira Nespresso.jpg',
                'store_url' => null,
                'is_purchased' => false,
            ],
            [
                'name' => 'Torradeira Electrolux',
                'description' => 'Torradeira Electrolux com controle de temperatura e função descongelamento. Para nossos cafés da manhã especiais com pães torrados na medida certa.',
                'price' => 133.00,
                'image_url' => '/imagens_loja/Torradeira Electrolux.jpg',
                'store_url' => null,
                'is_purchased' => false,
            ],
            [
                'name' => 'Sanduicheira Grill Electrolux',
                'description' => 'Sanduicheira e grill Electrolux com placas antiaderentes e abertura 180°. Versátil para preparar sanduíches, grelhados e muito mais.',
                'price' => 134.47,
                'image_url' => '/imagens_loja/Sanduicheira Grill Electrolux.jpg',
                'store_url' => null,
                'is_purchased' => false,
            ],
            [
                'name' => 'Processador de Alimentos',
                'description' => 'Processador de alimentos multifuncional com diversas lâminas e acessórios. Essencial para preparar receitas deliciosas com praticidade no nosso novo lar.',
                'price' => 189.90,
                'image_url' => '/imagens_loja/Processador de Alimentos.jpg',
                'store_url' => null,
                'is_purchased' => false,
            ],
            [
                'name' => 'Geladeira Electrolux Inverse',
                'description' => 'Geladeira Electrolux Frost Free Inverse com tecnologia de refrigeração inteligente. O coração da nossa cozinha para conservar alimentos frescos por mais tempo.',
                'price' => 3812.07,
                'image_url' => '/imagens_loja/Geladeira Electrolux Inverse.jpg',
                'store_url' => null,
                'is_purchased' => false,
            ],
            [
                'name' => 'Cooktop Electrolux',
                'description' => 'Cooktop de indução Electrolux com 4 bocas e controle touch. Design moderno e eficiência energética para cozinhar com segurança e praticidade.',
                'price' => 749.55,
                'image_url' => '/imagens_loja/Cooktop Electrolux.jpg',
                'store_url' => null,
                'is_purchased' => false,
            ],
            [
                'name' => 'Forno Elétrico Electrolux',
                'description' => 'Forno elétrico Electrolux de embutir com convecção e grill. Para assar com perfeição desde um bolo de aniversário até receitas sofisticadas.',
                'price' => 1599.00,
                'image_url' => '/imagens_loja/Forno Elétrico Electrolux.jpg',
                'store_url' => null,
                'is_purchased' => false,
            ],
            [
                'name' => 'Airfryer Mondial',
                'description' => 'Airfryer Mondial Family com grande capacidade para preparar alimentos crocantes e saudáveis sem óleo. Perfeito para nossos jantares em família.',
                'price' => 474.05,
                'image_url' => '/imagens_loja/Airfryer Mondial.jpg',
                'store_url' => null,
                'is_purchased' => false,
            ],
            [
                'name' => 'Ferro de Passar Philips Walita',
                'description' => 'Ferro a vapor Philips Walita com base antiaderente e vapor potente. Para manter nossas roupas sempre impecáveis e bem cuidadas.',
                'price' => 290.00,
                'image_url' => '/imagens_loja/Ferro de Passar Philips Walita.jpg',
                'store_url' => null,
                'is_purchased' => false,
            ],
            [
                'name' => 'Mixer Electrolux',
                'description' => 'Mixer de mão Electrolux com acessórios para bater, misturar e processar. Compacto e versátil para preparar sopas, vitaminas e molhos.',
                'price' => 161.39,
                'image_url' => '/imagens_loja/Mixer Electrolux.jpg',
                'store_url' => null,
                'is_purchased' => false,
            ],
            [
                'name' => 'Liquidificador Oster',
                'description' => 'Liquidificador Oster clássico com motor potente e jarra de vidro resistente. Essencial para sucos, vitaminas e receitas do dia a dia.',
                'price' => 209.93,
                'image_url' => '/imagens_loja/Liquidificador Oster.jpg',
                'store_url' => null,
                'is_purchased' => false,
            ],
            [
                'name' => 'Panela Elétrica Electrolux',
                'description' => 'Panela elétrica de arroz e legumes Electrolux com múltiplas funções. Praticidade para preparar arroz soltinho, legumes no vapor e muito mais.',
                'price' => 599.40,
                'image_url' => '/imagens_loja/Panela Elétrica Electrolux.jpg',
                'store_url' => null,
                'is_purchased' => false,
            ],
            [
                'name' => 'Pipoqueira Elétrica Mondial',
                'description' => 'Pipoqueira elétrica Mondial para preparar pipocas crocantes e saudáveis sem óleo. Para nossas sessões de cinema em casa!',
                'price' => 155.90,
                'image_url' => '/imagens_loja/Pipoqueira Elétrica Mondial.jpg',
                'store_url' => null,
                'is_purchased' => false,
            ],

            // ========== MESA POSTA E COZINHA ==========
            [
                'name' => 'Aparelho de Jantar Oxford',
                'description' => 'Aparelho de jantar Oxford em porcelana com 30 peças. Design elegante e atemporal para recebermos nossos convidados com sofisticação.',
                'price' => 549.90,
                'image_url' => '/imagens_loja/Aparelho de Jantar Oxford.jpg',
                'store_url' => null,
                'is_purchased' => false,
            ],
            [
                'name' => 'Aparelho de Jantar Tramontina',
                'description' => 'Aparelho de jantar Tramontina em cerâmica com 20 peças. Resistente e versátil para o uso cotidiano em nosso novo lar.',
                'price' => 204.16,
                'image_url' => '/imagens_loja/Aparelho de Jantar Tramontina.jpg',
                'store_url' => null,
                'is_purchased' => false,
            ],
            [
                'name' => 'Jogo de Copos',
                'description' => 'Jogo de copos de vidro com 12 peças em diferentes tamanhos. Para água, sucos e drinks nas nossas reuniões familiares.',
                'price' => 97.72,
                'image_url' => '/imagens_loja/Jogo de Copos.jpg',
                'store_url' => null,
                'is_purchased' => false,
            ],
            [
                'name' => 'Jogo de Taças',
                'description' => 'Jogo de taças de cristal com 6 peças para vinho e espumante. Para brindarmos aos momentos especiais da nossa vida juntos.',
                'price' => 162.99,
                'image_url' => '/imagens_loja/Jogo de Taças.jpg',
                'store_url' => null,
                'is_purchased' => false,
            ],
            [
                'name' => 'Jogo de Talheres Brinox',
                'description' => 'Jogo de talheres Brinox em aço inox com 48 peças. Qualidade e durabilidade para nossas refeições diárias.',
                'price' => 199.90,
                'image_url' => '/imagens_loja/Jogo de Talheres Brinox.jpg',
                'store_url' => null,
                'is_purchased' => false,
            ],
            [
                'name' => 'Faqueiro',
                'description' => 'Faqueiro completo em aço inox com maleta organizadora e 72 peças. Para ocasiões especiais e jantares elegantes.',
                'price' => 219.99,
                'image_url' => '/imagens_loja/Faqueiro.jpg',
                'store_url' => null,
                'is_purchased' => false,
            ],
            [
                'name' => 'Jogo de Panelas Brinox',
                'description' => 'Jogo de panelas Brinox com 7 peças em alumínio com revestimento antiaderente. Base para todas as delícias que prepararemos juntos.',
                'price' => 524.70,
                'image_url' => '/imagens_loja/Jogo de Panelas Brinox.jpg',
                'store_url' => null,
                'is_purchased' => false,
            ],
            [
                'name' => 'Jogo de Assadeiras Alumínio',
                'description' => 'Conjunto de assadeiras em alumínio com 5 peças em diferentes tamanhos. Para bolos, tortas, lasanhas e assados perfeitos.',
                'price' => 184.97,
                'image_url' => '/imagens_loja/Jogo de Assadeiras Alumínio.jpg',
                'store_url' => null,
                'is_purchased' => false,
            ],
            [
                'name' => 'Jogo de Assadeiras Vidro',
                'description' => 'Conjunto de assadeiras em vidro temperado com 3 peças. Ideal para ir do forno à mesa com elegância e praticidade.',
                'price' => 119.90,
                'image_url' => '/imagens_loja/Jogo de Assadeiras Vidro.jpg',
                'store_url' => null,
                'is_purchased' => false,
            ],
            [
                'name' => 'Kit Potes Herméticos',
                'description' => 'Kit com potes herméticos de 640ml para armazenar alimentos. Organizando nossa despensa e mantendo tudo fresquinho.',
                'price' => 124.00,
                'image_url' => '/imagens_loja/Kit Potes Herméticos.jpg',
                'store_url' => null,
                'is_purchased' => false,
            ],
            [
                'name' => 'Porta-Temperos',
                'description' => 'Porta-temperos giratório com 12 potes de vidro. Organizando os sabores que darão vida às nossas receitas.',
                'price' => 104.79,
                'image_url' => '/imagens_loja/Porta-Temperos.jpg',
                'store_url' => null,
                'is_purchased' => false,
            ],
            [
                'name' => 'Chaleira',
                'description' => 'Chaleira em aço inox com apito e cabo ergonômico. Para nossos chás da tarde e momentos de aconchego.',
                'price' => 129.90,
                'image_url' => '/imagens_loja/Chaleira.jpg',
                'store_url' => null,
                'is_purchased' => false,
            ],
            [
                'name' => 'Conjunto de Tigelas',
                'description' => 'Conjunto de tigelas em diferentes tamanhos para preparo e servir. Versáteis para saladas, massas e sobremesas.',
                'price' => 120.31,
                'image_url' => '/imagens_loja/Conjunto de Tigelas.jpg',
                'store_url' => null,
                'is_purchased' => false,
            ],
            [
                'name' => 'Escorredor de Louça Tramontina',
                'description' => 'Escorredor de louça Tramontina em aço inox com bandeja coletora. Design funcional para organizar nossa cozinha.',
                'price' => 199.00,
                'image_url' => '/imagens_loja/Escorredor de Louça Tramontina.jpg',
                'store_url' => null,
                'is_purchased' => false,
            ],

            // ========== DECORAÇÃO E MÓVEIS ==========
            [
                'name' => 'Kit Vasos Decorativos',
                'description' => 'Kit com vasos decorativos em cerâmica de diferentes tamanhos e formatos. Para flores e plantas que trarão vida ao nosso lar.',
                'price' => 206.36,
                'image_url' => '/imagens_loja/Kit Vasos Decorativos.jpg',
                'store_url' => null,
                'is_purchased' => false,
            ],
            [
                'name' => 'Tapetes para Sala',
                'description' => 'Tapete decorativo para sala de estar com design moderno e macio. Conforto e elegância para nosso cantinho especial.',
                'price' => 359.00,
                'image_url' => '/imagens_loja/Tapetes para Sala.jpg',
                'store_url' => null,
                'is_purchased' => false,
            ],
            [
                'name' => 'Kit Almofadas Decorativas',
                'description' => 'Kit com almofadas decorativas em tecidos variados e estampas modernas. Para deixar nosso sofá ainda mais aconchegante.',
                'price' => 199.80,
                'image_url' => '/imagens_loja/Kit Almofadas Decorativas.jpg',
                'store_url' => null,
                'is_purchased' => false,
            ],
            [
                'name' => 'Cama Queen Size',
                'description' => 'Cama Queen Size com estrutura robusta em madeira. O lugar onde descansaremos juntos após cada dia de alegrias.',
                'price' => 2029.99,
                'image_url' => '/imagens_loja/Cama Queen Size.jpg',
                'store_url' => null,
                'is_purchased' => false,
            ],
            [
                'name' => 'Cabeceira de Cama',
                'description' => 'Cabeceira estofada para cama Queen em tecido suede. Elegância e conforto para nosso quarto dos sonhos.',
                'price' => 601.73,
                'image_url' => '/imagens_loja/Cabeceira de Cama.jpg',
                'store_url' => null,
                'is_purchased' => false,
            ],
            [
                'name' => 'Rack para TV',
                'description' => 'Rack para TV com design moderno, gavetas e nichos para organização. Central de entretenimento do nosso lar.',
                'price' => 699.90,
                'image_url' => '/imagens_loja/Rack para TV.jpg',
                'store_url' => null,
                'is_purchased' => false,
            ],
            [
                'name' => 'Aparador',
                'description' => 'Aparador com gavetas em madeira para hall de entrada ou sala de jantar. Organização e charme para receber as visitas.',
                'price' => 559.99,
                'image_url' => '/imagens_loja/Aparador.jpg',
                'store_url' => null,
                'is_purchased' => false,
            ],
            [
                'name' => 'Cristaleira',
                'description' => 'Cristaleira em madeira com portas de vidro para exibir nossos jogos de louça e cristais. Peça central na sala de jantar.',
                'price' => 873.99,
                'image_url' => '/imagens_loja/Cristaleira.jpg',
                'store_url' => null,
                'is_purchased' => false,
            ],
            [
                'name' => 'Churrasqueira Grill',
                'description' => 'Churrasqueira Grill portátil para apartamento com sistema de exaustão. Para nossos churrascos de domingo com a família.',
                'price' => 539.24,
                'image_url' => '/imagens_loja/Churrasqueira Grill.jpg',
                'store_url' => null,
                'is_purchased' => false,
            ],
            [
                'name' => 'Poltrona',
                'description' => 'Poltrona confortável com design moderno para leitura e descanso. Nosso cantinho de relaxamento na sala.',
                'price' => 529.00,
                'image_url' => '/imagens_loja/Poltrona.jpg',
                'store_url' => null,
                'is_purchased' => false,
            ],
            [
                'name' => 'Kit de Banheiro',
                'description' => 'Kit completo para banheiro com porta-escovas, saboneteira, dispenser e lixeira. Organização e estilo para nosso banheiro.',
                'price' => 251.12,
                'image_url' => '/imagens_loja/Kit de Banheiro.jpg',
                'store_url' => null,
                'is_purchased' => false,
            ],

            // ========== CAMA, MESA E BANHO ==========
            [
                'name' => 'Jogo de Cama Completo',
                'description' => 'Jogo de cama Queen completo com lençóis, fronhas e porta travesseiros em percal 400 fios. Noites de sono com muito conforto.',
                'price' => 699.90,
                'image_url' => '/imagens_loja/Jogo de Cama Completo.jpg',
                'store_url' => null,
                'is_purchased' => false,
            ],
            [
                'name' => 'Jogo de Toalhas de Rosto',
                'description' => 'Jogo com 4 toalhas de rosto em algodão egípcio, macias e absorventes. Cuidado e suavidade para nosso dia a dia.',
                'price' => 114.90,
                'image_url' => '/imagens_loja/Jogo de Toalhas de Rosto.jpg',
                'store_url' => null,
                'is_purchased' => false,
            ],
            [
                'name' => 'Jogo de Toalhas de Banho',
                'description' => 'Jogo com 2 toalhas de banho gigantes em algodão premium. Maciez e absorção para nossos momentos de relaxamento.',
                'price' => 289.00,
                'image_url' => '/imagens_loja/Jogo de Toalhas de Banho.jpg',
                'store_url' => null,
                'is_purchased' => false,
            ],
            [
                'name' => 'Edredom Queen',
                'description' => 'Edredom Queen macio e quentinho com enchimento de pluma sintética. Para noites aconchegantes abraçadinhos.',
                'price' => 319.90,
                'image_url' => '/imagens_loja/Edredom Queen.jpg',
                'store_url' => null,
                'is_purchased' => false,
            ],
            [
                'name' => 'Kit 2 Travesseiros',
                'description' => 'Kit com 2 travesseiros de fibra siliconizada com toque de plumas. Sono tranquilo e reparador todas as noites.',
                'price' => 161.49,
                'image_url' => '/imagens_loja/Kit 2 Travesseiros.jpg',
                'store_url' => null,
                'is_purchased' => false,
            ],
            [
                'name' => 'Jogo Americano',
                'description' => 'Jogo americano com 6 peças em tecido impermeável. Para refeições especiais com muito estilo e praticidade.',
                'price' => 169.00,
                'image_url' => '/imagens_loja/Jogo Americano.jpg',
                'store_url' => null,
                'is_purchased' => false,
            ],

            // ========== EXPERIÊNCIAS ==========
            [
                'name' => 'Jantar Romântico 1',
                'description' => 'Contribuição para um jantar romântico especial em restaurante fino. Um momento a dois para celebrar nosso amor.',
                'price' => 345.50,
                'image_url' => '/imagens_loja/Jantar Romântico 1.jpg',
                'store_url' => null,
                'is_purchased' => false,
            ],
            [
                'name' => 'Jantar Romântico 2',
                'description' => 'Contribuição para um jantar romântico premium com menu degustação e harmonização de vinhos. Uma experiência gastronômica inesquecível.',
                'price' => 680.00,
                'image_url' => '/imagens_loja/Jantar Romântico 2.png',
                'store_url' => null,
                'is_purchased' => false,
            ],
            [
                'name' => 'Cota de Lua de Mel 1',
                'description' => 'Contribuição para nossa lua de mel dos sonhos. Cada cota nos aproxima da viagem que sempre sonhamos fazer juntos.',
                'price' => 120.00,
                'image_url' => '/imagens_loja/Cota de Lua de Mel 1.jpg',
                'store_url' => null,
                'is_purchased' => false,
            ],
            [
                'name' => 'Cota de Lua de Mel 2',
                'description' => 'Contribuição para nossa lua de mel dos sonhos. Ajude-nos a criar memórias inesquecíveis em nossa primeira viagem como casados.',
                'price' => 230.00,
                'image_url' => '/imagens_loja/Cota de Lua de Mel 2.jpg',
                'store_url' => null,
                'is_purchased' => false,
            ],
            [
                'name' => 'Cota de Lua de Mel 3',
                'description' => 'Contribuição para nossa lua de mel dos sonhos. Sua generosidade tornará nossa viagem ainda mais especial.',
                'price' => 350.00,
                'image_url' => '/imagens_loja/Cota de Lua de Mel 3.jpg',
                'store_url' => null,
                'is_purchased' => false,
            ],
            [
                'name' => 'Cota de Lua de Mel 4',
                'description' => 'Contribuição para nossa lua de mel dos sonhos. Com seu presente, poderemos conhecer lugares incríveis juntos.',
                'price' => 510.00,
                'image_url' => '/imagens_loja/Cota de Lua de Mel 4.jpg',
                'store_url' => null,
                'is_purchased' => false,
            ],
            [
                'name' => 'Cota de Lua de Mel 5',
                'description' => 'Contribuição para nossa lua de mel dos sonhos. Uma cota especial para experiências únicas em nossa viagem.',
                'price' => 860.00,
                'image_url' => '/imagens_loja/Cota de Lua de Mel 5.jpg',
                'store_url' => null,
                'is_purchased' => false,
            ],
            [
                'name' => 'Cota de Lua de Mel 6',
                'description' => 'Contribuição especial para nossa lua de mel dos sonhos. A maior cota para tornar nossa viagem perfeita e inesquecível.',
                'price' => 1200.00,
                'image_url' => '/imagens_loja/Cota de Lua de Mel 6.jpg',
                'store_url' => null,
                'is_purchased' => false,
            ],
        ];

        foreach ($gifts as $gift) {
            Gift::create($gift);
        }
    }
}
