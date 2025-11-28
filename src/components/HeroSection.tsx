interface HeroSectionProps {
  backgroundImage: string;
}

export function HeroSection({ backgroundImage }: HeroSectionProps) {
  return (
    <section className="relative h-screen w-full overflow-hidden">
      {/* Background Image with Grayscale */}
      <div 
        className="absolute inset-0 grayscale-filter bg-cover bg-center"
        style={{ backgroundImage: `url(${backgroundImage})` }}
      >
        <div className="absolute inset-0 bg-black/30" />
      </div>

      {/* Content */}
      <div className="relative z-10 h-full flex flex-col items-center justify-center text-center px-4">
        <div className="flex items-center gap-6 md:gap-8">
          <h1 className="text-6xl md:text-8xl lg:text-9xl text-[#e8dfca]">
            Lailla
          </h1>
          <span className="text-script text-5xl md:text-7xl lg:text-8xl text-[#e8dfca] mt-4">
            &
          </span>
          <h1 className="text-6xl md:text-8xl lg:text-9xl text-[#e8dfca]">
            Cristhian
          </h1>
        </div>
        
        <p className="mt-8 text-xl md:text-2xl text-[#e8dfca] tracking-wider">
          28 DE JUNHO DE 2026
        </p>
        
        <button className="mt-12 px-10 py-4 bg-[#2d4a2d] text-[#e8dfca] rounded-[50px] transition-all duration-300 hover:bg-transparent hover:border-2 hover:border-[#2d4a2d] hover:shadow-lg hover:-translate-y-1">
          Confirmar Presença
        </button>
      </div>

      {/* Scroll Indicator */}
      <div className="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
        <div className="w-6 h-10 border-2 border-[#e8dfca] rounded-full flex items-start justify-center p-2">
          <div className="w-1.5 h-2 bg-[#e8dfca] rounded-full" />
        </div>
      </div>
    </section>
  );
}
