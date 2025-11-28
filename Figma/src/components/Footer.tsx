export function Footer() {
  return (
    <footer className="bg-[#2d4a2d] text-[#e8dfca] py-16 px-4">
      <div className="max-w-4xl mx-auto text-center">
        <p className="text-2xl md:text-3xl italic mb-8 text-dancing">
          "All love stories are beautiful, but ours is my favorite"
        </p>
        
        <div className="flex items-center justify-center gap-4 mb-6">
          <h3 className="text-3xl md:text-4xl">Lailla</h3>
          <span className="text-script text-3xl md:text-4xl">&</span>
          <h3 className="text-3xl md:text-4xl">Cristhian</h3>
        </div>
        
        <p className="text-lg tracking-wider mb-8">
          28 DE JUNHO DE 2026
        </p>

        <div className="border-t border-[#e8dfca]/30 pt-8">
          <p className="text-sm opacity-70">
            © 2026 Lailla & Cristhian. Todos os direitos reservados.
          </p>
        </div>
      </div>
    </footer>
  );
}
