interface OurStorySectionProps {
  image1: string;
  image2: string;
}

export function OurStorySection({ image1, image2 }: OurStorySectionProps) {
  return (
    <section className="relative min-h-screen w-full bg-[#e8dfca] py-20 px-4 md:px-8 overflow-hidden">
      {/* Large Background Title */}
      <div className="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 opacity-10 pointer-events-none">
        <h2 className="text-[150px] md:text-[200px] lg:text-[300px] whitespace-nowrap">
          NOSSA HISTÓRIA
        </h2>
      </div>

      {/* Content Container */}
      <div className="relative z-10 max-w-7xl mx-auto">
        <h2 className="text-center mb-16 text-[#2d4a2d]">
          Nossa História
        </h2>

        <div className="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
          {/* Images Section - Overlapping */}
          <div className="relative h-[500px] lg:h-[600px]">
            {/* First Image */}
            <div className="absolute top-0 left-0 w-[70%] h-[60%] z-10 transition-all duration-500 hover:scale-105 hover:shadow-2xl">
              <img 
                src={image1}
                alt="Lailla e Cristhian"
                className="w-full h-full object-cover rounded-2xl shadow-xl grayscale-filter hover-color"
              />
            </div>
            
            {/* Second Image */}
            <div className="absolute bottom-0 right-0 w-[70%] h-[60%] transition-all duration-500 hover:scale-105 hover:shadow-2xl">
              <img 
                src={image2}
                alt="Lailla e Cristhian"
                className="w-full h-full object-cover rounded-2xl shadow-xl grayscale-filter hover-color"
              />
            </div>
          </div>

          {/* Text Section */}
          <div className="space-y-6 text-[#2d4a2d]">
            <p className="text-lg leading-relaxed">
              Tudo começou em uma tarde ensolarada de primavera, quando nossos caminhos se cruzaram pela primeira vez. Um encontro casual que se transformou em conversas intermináveis, risadas compartilhadas e uma conexão que transcendeu o tempo.
            </p>
            
            <p className="text-lg leading-relaxed">
              Cada momento juntos revelou novas camadas de amor, cumplicidade e respeito mútuo. Das aventuras mais simples aos sonhos mais grandiosos, construímos uma história única, escrita com paciência, carinho e a certeza de que encontramos um no outro o verdadeiro significado de lar.
            </p>
            
            <p className="text-lg leading-relaxed">
              Hoje, celebramos não apenas o amor que nos uniu, mas também a jornada que nos trouxe até aqui. E é com alegria no coração que convidamos você para testemunhar o próximo capítulo da nossa história: o dia em que nos tornaremos uma família.
            </p>

            <div className="pt-6 border-t border-[#2d4a2d]/20">
              <p className="text-dancing text-2xl text-[#2d4a2d]">
                "O amor é a única coisa que cresce quando é compartilhado"
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
}
