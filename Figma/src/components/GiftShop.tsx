import { Eye, Gift } from 'lucide-react';

interface GiftItem {
  id: number;
  name: string;
  price: number;
  image: string;
  status: 'available' | 'reserved' | 'purchased';
}

interface GiftShopProps {
  gifts: GiftItem[];
}

export function GiftShop({ gifts }: GiftShopProps) {
  const getStatusColor = (status: string) => {
    switch (status) {
      case 'available':
        return 'bg-green-500';
      case 'reserved':
        return 'bg-yellow-500';
      case 'purchased':
        return 'bg-red-500';
      default:
        return 'bg-gray-500';
    }
  };

  const getStatusText = (status: string) => {
    switch (status) {
      case 'available':
        return 'Disponível';
      case 'reserved':
        return 'Reservado';
      case 'purchased':
        return 'Presenteado';
      default:
        return '';
    }
  };

  return (
    <section className="bg-[#e8dfca] py-20 px-4">
      <div className="max-w-7xl mx-auto">
        <div className="text-center mb-4">
          <Gift className="w-16 h-16 text-[#2d4a2d] mx-auto mb-4" />
        </div>
        
        <h2 className="text-center mb-6 text-[#2d4a2d]">
          Lista de Presentes
        </h2>
        
        <p className="text-center text-[#2d4a2d] max-w-2xl mx-auto mb-16">
          Sua presença é o nosso maior presente! Mas se desejar nos presentear, 
          preparamos esta lista com muito carinho.
        </p>

        <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
          {gifts.map((gift) => (
            <div 
              key={gift.id}
              className="group bg-white rounded-2xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-2xl hover:-translate-y-2"
            >
              {/* Image Container */}
              <div className="relative aspect-square overflow-hidden">
                <img 
                  src={gift.image}
                  alt={gift.name}
                  className="w-full h-full object-cover grayscale-filter transition-all duration-500"
                />
                
                {/* Overlay on Hover */}
                <div className="absolute inset-0 bg-[#2d4a2d]/90 opacity-0 group-hover:opacity-100 transition-all duration-300 flex flex-col items-center justify-center gap-4">
                  <Eye className="w-12 h-12 text-[#e8dfca]" />
                  <p className="text-[#e8dfca] text-lg">Ver Detalhes</p>
                </div>

                {/* Status Badge */}
                <div className="absolute top-4 right-4">
                  <span className={`${getStatusColor(gift.status)} text-white px-3 py-1 rounded-full text-sm`}>
                    {getStatusText(gift.status)}
                  </span>
                </div>
              </div>

              {/* Card Content */}
              <div className="p-6">
                <h3 className="text-lg text-[#2d4a2d] mb-2">
                  {gift.name}
                </h3>
                <p className="text-2xl text-[#2d4a2d] mb-4">
                  R$ {gift.price.toFixed(2)}
                </p>
                
                <button 
                  className={`w-full px-6 py-3 rounded-[50px] transition-all duration-300 ${
                    gift.status === 'available' 
                      ? 'bg-[#2d4a2d] text-[#e8dfca] hover:bg-[#4a6b4a] hover:shadow-lg hover:-translate-y-1' 
                      : 'bg-gray-400 text-gray-700 cursor-not-allowed'
                  }`}
                  disabled={gift.status !== 'available'}
                >
                  {gift.status === 'available' ? 'Presentear' : 'Indisponível'}
                </button>
              </div>
            </div>
          ))}
        </div>

        {/* PIX Section */}
        <div className="mt-16 bg-white rounded-3xl p-8 shadow-xl max-w-2xl mx-auto text-center">
          <h3 className="text-[#2d4a2d] mb-4">
            Preferência por PIX?
          </h3>
          <p className="text-[#2d4a2d] mb-6">
            Você também pode contribuir com um valor através do PIX
          </p>
          <div className="bg-[#e8dfca] rounded-2xl p-6">
            <p className="text-sm text-[#2d4a2d]/70 mb-2">Chave PIX</p>
            <p className="text-xl text-[#2d4a2d]">casamento.lailla.cristhian@email.com</p>
          </div>
        </div>
      </div>
    </section>
  );
}
