interface PhotoGalleryProps {
  images: string[];
}

export function PhotoGallery({ images }: PhotoGalleryProps) {
  return (
    <section className="bg-[#E6E1DB] py-20 px-4">
      <div className="max-w-7xl mx-auto">
        <h2 className="text-center mb-16 text-[#2d4a2d]">
          Momentos Especiais
        </h2>

        <div className="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
          {images.map((image, index) => (
            <div 
              key={index}
              className="aspect-square overflow-hidden rounded-2xl shadow-lg transition-all duration-500 hover:scale-105 hover:shadow-2xl"
            >
              <img 
                src={image}
                alt={`Momento ${index + 1}`}
                className="w-full h-full object-cover grayscale-filter hover-color transition-all duration-500"
              />
            </div>
          ))}
        </div>
      </div>
    </section>
  );
}
