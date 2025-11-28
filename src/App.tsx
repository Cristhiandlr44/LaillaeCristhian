import { HeroSection } from './components/HeroSection';
import { OurStorySection } from './components/OurStorySection';
import { EventDetailsSection } from './components/EventDetailsSection';
import { PhotoGallery } from './components/PhotoGallery';
import { GiftShop } from './components/GiftShop';
import { Footer } from './components/Footer';

export default function App() {
  // Gallery Images
  const galleryImages = [
    'https://images.unsplash.com/photo-1726694064399-8aef90930874?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxyb21hbnRpYyUyMGNvdXBsZSUyMHdlZGRpbmd8ZW58MXx8fHwxNzY0MTk1OTY0fDA&ixlib=rb-4.1.0&q=80&w=1080',
    'https://images.unsplash.com/photo-1761839257647-df30867afd54?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxjb3VwbGUlMjBsYXVnaGluZyUyMG91dGRvb3J8ZW58MXx8fHwxNzY0Mjk1OTI3fDA&ixlib=rb-4.1.0&q=80&w=1080',
    'https://images.unsplash.com/photo-1607335620049-6026244a3118?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxjb3VwbGUlMjB2aW50YWdlJTIwcG9ydHJhaXR8ZW58MXx8fHwxNzY0Mjk1OTI3fDA&ixlib=rb-4.1.0&q=80&w=1080',
    'https://images.unsplash.com/photo-1726251903562-4af66fc61634?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxjb3VwbGUlMjBiZWFjaCUyMHN1bnNldHxlbnwxfHx8fDE3NjQxODMyMTV8MA&ixlib=rb-4.1.0&q=80&w=1080',
    'https://images.unsplash.com/photo-1729168411881-5d46ecc5cd04?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxyb21hbnRpYyUyMGRpbm5lciUyMHRhYmxlfGVufDF8fHx8MTc2NDE5MDI0Mnww&ixlib=rb-4.1.0&q=80&w=1080',
    'https://images.unsplash.com/photo-1584115838497-f317f7455abe?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHx3ZWRkaW5nJTIwcmluZ3MlMjBib3h8ZW58MXx8fHwxNzY0Mjk1OTI4fDA&ixlib=rb-4.1.0&q=80&w=1080',
    'https://images.unsplash.com/photo-1692167900605-e02666cadb6d?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHx3ZWRkaW5nJTIwZmxvd2VycyUyMGJvdXF1ZXR8ZW58MXx8fHwxNzY0Mjk1OTI5fDA&ixlib=rb-4.1.0&q=80&w=1080',
    'https://images.unsplash.com/photo-1611435917502-0b8d01a618b6?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxjaGFtcGFnbmUlMjBnbGFzc2VzJTIwY2VsZWJyYXRpb258ZW58MXx8fHwxNzY0MjQyMDI0fDA&ixlib=rb-4.1.0&q=80&w=1080',
  ];

  // Gift Shop Items
  const gifts = [
    {
      id: 1,
      name: 'Jogo de Taças de Champagne',
      price: 189.90,
      image: 'https://images.unsplash.com/photo-1611435917502-0b8d01a618b6?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxjaGFtcGFnbmUlMjBnbGFzc2VzJTIwY2VsZWJyYXRpb258ZW58MXx8fHwxNzY0MjQyMDI0fDA&ixlib=rb-4.1.0&q=80&w=1080',
      status: 'available' as const,
    },
    {
      id: 2,
      name: 'Perfume Importado',
      price: 450.00,
      image: 'https://images.unsplash.com/photo-1719175936556-dbd05e415913?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxsdXh1cnklMjBwZXJmdW1lJTIwYm90dGxlfGVufDF8fHx8MTc2NDI2ODU1N3ww&ixlib=rb-4.1.0&q=80&w=1080',
      status: 'reserved' as const,
    },
    {
      id: 3,
      name: 'Vaso Decorativo',
      price: 279.90,
      image: 'https://images.unsplash.com/photo-1612196808214-b8e1d6145a8c?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxob21lJTIwZGVjb3IlMjB2YXNlfGVufDF8fHx8MTc2NDI5NTkyOXww&ixlib=rb-4.1.0&q=80&w=1080',
      status: 'available' as const,
    },
    {
      id: 4,
      name: 'Liquidificador Premium',
      price: 599.00,
      image: 'https://images.unsplash.com/photo-1585237672814-8f85a8118bf6?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxraXRjaGVuJTIwYXBwbGlhbmNlJTIwYmxlbmRlcnxlbnwxfHx8fDE3NjQyOTU5MzB8MA&ixlib=rb-4.1.0&q=80&w=1080',
      status: 'purchased' as const,
    },
    {
      id: 5,
      name: 'Buquê de Flores',
      price: 150.00,
      image: 'https://images.unsplash.com/photo-1692167900605-e02666cadb6d?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHx3ZWRkaW5nJTIwZmxvd2VycyUyMGJvdXF1ZXR8ZW58MXx8fHwxNzY0Mjk1OTI5fDA&ixlib=rb-4.1.0&q=80&w=1080',
      status: 'available' as const,
    },
    {
      id: 6,
      name: 'Porta-Alianças Personalizado',
      price: 120.00,
      image: 'https://images.unsplash.com/photo-1584115838497-f317f7455abe?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHx3ZWRkaW5nJTIwcmluZ3MlMjBib3h8ZW58MXx8fHwxNzY0Mjk1OTI4fDA&ixlib=rb-4.1.0&q=80&w=1080',
      status: 'available' as const,
    },
    {
      id: 7,
      name: 'Kit Jantar Romântico',
      price: 350.00,
      image: 'https://images.unsplash.com/photo-1729168411881-5d46ecc5cd04?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxyb21hbnRpYyUyMGRpbm5lciUyMHRhYmxlfGVufDF8fHx8MTc2NDE5MDI0Mnww&ixlib=rb-4.1.0&q=80&w=1080',
      status: 'reserved' as const,
    },
    {
      id: 8,
      name: 'Experiência Lua de Mel',
      price: 5000.00,
      image: 'https://images.unsplash.com/photo-1726251903562-4af66fc61634?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxjb3VwbGUlMjBiZWFjaCUyMHN1bnNldHxlbnwxfHx8fDE3NjQxODMyMTV8MA&ixlib=rb-4.1.0&q=80&w=1080',
      status: 'available' as const,
    },
  ];

  return (
    <div className="min-h-screen">
      <HeroSection 
        backgroundImage="https://images.unsplash.com/photo-1726694064399-8aef90930874?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxyb21hbnRpYyUyMGNvdXBsZSUyMHdlZGRpbmd8ZW58MXx8fHwxNzY0MTk1OTY0fDA&ixlib=rb-4.1.0&q=80&w=1080"
      />
      
      <OurStorySection 
        image1="https://images.unsplash.com/photo-1761839257647-df30867afd54?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxjb3VwbGUlMjBsYXVnaGluZyUyMG91dGRvb3J8ZW58MXx8fHwxNzY0Mjk1OTI3fDA&ixlib=rb-4.1.0&q=80&w=1080"
        image2="https://images.unsplash.com/photo-1607335620049-6026244a3118?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxjb3VwbGUlMjB2aW50YWdlJTIwcG9ydHJhaXR8ZW58MXx8fHwxNzY0Mjk1OTI3fDA&ixlib=rb-4.1.0&q=80&w=1080"
      />
      
      <EventDetailsSection 
        backgroundImage="https://images.unsplash.com/photo-1731515672817-0491d19c9f19?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHx3ZWRkaW5nJTIwY2VyZW1vbnklMjBvdXRkb29yfGVufDF8fHx8MTc2NDI5NTkyN3ww&ixlib=rb-4.1.0&q=80&w=1080"
      />
      
      <PhotoGallery images={galleryImages} />
      
      <GiftShop gifts={gifts} />
      
      <Footer />
    </div>
  );
}
