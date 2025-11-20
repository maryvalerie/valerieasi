import { Link } from "react-router-dom";

export default function Navbar() {
  return (
    <nav className="w-full fixed top-0 left-0 z-50 bg-gradient-to-r from-purple-900/80 via-purple-700/80 to-violet-400/80 backdrop-blur-md shadow-xl">
      <div className="max-w-7xl mx-auto px-6 py-3 flex justify-between items-center">
        <h1 className="text-3xl font-extrabold text-violet-200 tracking-wide drop-shadow-lg select-none">
          CarHub
        </h1>
        <div className="flex items-center gap-2 bg-purple-800/70 rounded-full px-2 py-1 shadow-inner border border-purple-700">
          <Link
            to="/"
            className="px-6 py-2 rounded-full text-white font-semibold text-base transition-all duration-200 hover:bg-violet-500 hover:text-white focus:outline-none focus:ring-2 focus:ring-violet-400 bg-gradient-to-r from-purple-400 via-purple-500 to-violet-400 shadow-md"
          >
            Home
          </Link>
          <Link
            to="/cars"
            className="px-6 py-2 rounded-full text-white font-semibold text-base transition-all duration-200 hover:bg-violet-500 hover:text-white focus:outline-none focus:ring-2 focus:ring-violet-400 bg-gradient-to-r from-purple-400 via-purple-500 to-violet-400 shadow-md"
          >
            Cars
          </Link>
          <Link
            to="/orders"
            className="px-6 py-2 rounded-full text-white font-semibold text-base transition-all duration-200 hover:bg-violet-500 hover:text-white focus:outline-none focus:ring-2 focus:ring-violet-400 bg-gradient-to-r from-purple-400 via-purple-500 to-violet-400 shadow-md"
          >
            Order Form
          </Link>
        </div>
      </div>
    </nav>
  );
}
