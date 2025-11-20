function Header() {
  return (
    <header className="w-full bg-gradient-to-r from-purple-800 via-purple-600 to-violet-400 py-4 shadow-md">
      <nav className="flex justify-center gap-8">
        <a href="/" className="text-white font-bold hover:text-violet-200 transition">Home</a>
        <a href="/cars" className="text-white font-bold hover:text-violet-200 transition">Cars</a>
        <a href="/orders" className="text-white font-bold hover:text-violet-200 transition">Order</a>
        <a href="/form" className="text-white font-bold hover:text-violet-200 transition">Form</a>
      </nav>
    </header>
  );
}

export default Header;
