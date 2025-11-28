import { Calendar, Clock, MapPin, Church } from 'lucide-react';

interface EventDetailsProps {
  backgroundImage: string;
}

export function EventDetailsSection({ backgroundImage }: EventDetailsProps) {
  return (
    <section className="relative min-h-screen w-full overflow-hidden">
      {/* Background Image with Grayscale */}
      <div 
        className="absolute inset-0 grayscale-filter bg-cover bg-center"
        style={{ backgroundImage: `url(${backgroundImage})` }}
      >
        <div className="absolute inset-0 bg-black/50" />
      </div>

      {/* Content */}
      <div className="relative z-10 h-full min-h-screen flex flex-col items-center justify-center px-4 py-20">
        <h2 className="text-center mb-16 text-[#e8dfca]">
          Detalhes do Evento
        </h2>

        <div className="max-w-6xl w-full grid grid-cols-1 md:grid-cols-2 gap-8">
          {/* Ceremony Card */}
          <div className="bg-[#e8dfca]/95 backdrop-blur-sm rounded-3xl p-8 shadow-2xl">
            <div className="flex items-center justify-center mb-6">
              <Church className="w-12 h-12 text-[#2d4a2d]" />
            </div>
            <h3 className="text-center mb-6 text-[#2d4a2d]">
              Cerimônia
            </h3>
            
            <div className="space-y-4">
              <div className="flex items-start gap-4">
                <Calendar className="w-6 h-6 text-[#2d4a2d] flex-shrink-0 mt-1" />
                <div>
                  <p className="text-[#2d4a2d]">28 de Junho de 2026</p>
                  <p className="text-sm text-[#2d4a2d]/70">Sábado</p>
                </div>
              </div>
              
              <div className="flex items-start gap-4">
                <Clock className="w-6 h-6 text-[#2d4a2d] flex-shrink-0 mt-1" />
                <div>
                  <p className="text-[#2d4a2d]">16:00 horas</p>
                  <p className="text-sm text-[#2d4a2d]/70">Pontualidade é um presente</p>
                </div>
              </div>
              
              <div className="flex items-start gap-4">
                <MapPin className="w-6 h-6 text-[#2d4a2d] flex-shrink-0 mt-1" />
                <div>
                  <p className="text-[#2d4a2d]">Igreja Nossa Senhora das Graças</p>
                  <p className="text-sm text-[#2d4a2d]/70">Rua das Flores, 123 - Centro</p>
                </div>
              </div>
            </div>
            
            <button className="mt-8 w-full px-8 py-3 bg-[#2d4a2d] text-[#e8dfca] rounded-[50px] transition-all duration-300 hover:bg-[#4a6b4a] hover:shadow-lg hover:-translate-y-1">
              Ver no Mapa
            </button>
          </div>

          {/* Reception Card */}
          <div className="bg-[#e8dfca]/95 backdrop-blur-sm rounded-3xl p-8 shadow-2xl">
            <div className="flex items-center justify-center mb-6">
              <svg className="w-12 h-12 text-[#2d4a2d]" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z"/>
              </svg>
            </div>
            <h3 className="text-center mb-6 text-[#2d4a2d]">
              Recepção
            </h3>
            
            <div className="space-y-4">
              <div className="flex items-start gap-4">
                <Calendar className="w-6 h-6 text-[#2d4a2d] flex-shrink-0 mt-1" />
                <div>
                  <p className="text-[#2d4a2d]">28 de Junho de 2026</p>
                  <p className="text-sm text-[#2d4a2d]/70">Sábado</p>
                </div>
              </div>
              
              <div className="flex items-start gap-4">
                <Clock className="w-6 h-6 text-[#2d4a2d] flex-shrink-0 mt-1" />
                <div>
                  <p className="text-[#2d4a2d]">18:00 horas</p>
                  <p className="text-sm text-[#2d4a2d]/70">Após a cerimônia</p>
                </div>
              </div>
              
              <div className="flex items-start gap-4">
                <MapPin className="w-6 h-6 text-[#2d4a2d] flex-shrink-0 mt-1" />
                <div>
                  <p className="text-[#2d4a2d]">Espaço Jardim dos Sonhos</p>
                  <p className="text-sm text-[#2d4a2d]/70">Avenida Principal, 456 - Bairro Nobre</p>
                </div>
              </div>
            </div>
            
            <button className="mt-8 w-full px-8 py-3 bg-[#2d4a2d] text-[#e8dfca] rounded-[50px] transition-all duration-300 hover:bg-[#4a6b4a] hover:shadow-lg hover:-translate-y-1">
              Ver no Mapa
            </button>
          </div>
        </div>

        {/* Dress Code */}
        <div className="mt-12 bg-[#e8dfca]/95 backdrop-blur-sm rounded-3xl p-8 shadow-2xl max-w-2xl w-full text-center">
          <h3 className="mb-4 text-[#2d4a2d]">Traje</h3>
          <p className="text-[#2d4a2d] text-lg">
            Traje Passeio Completo
          </p>
          <p className="text-sm text-[#2d4a2d]/70 mt-2">
            Solicitamos que evitem usar branco ou off-white
          </p>
        </div>
      </div>
    </section>
  );
}
