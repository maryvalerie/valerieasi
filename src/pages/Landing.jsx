import React from "react";
import { Link } from "react-router-dom";

function Landing() {
  return (
    <div className="min-h-screen bg-gradient-to-br from-purple-800 via-purple-500 to-violet-300 flex flex-col items-center justify-center text-white">
      <h1 className="text-5xl font-bold mb-6 animate-fade-in">Welcome to CarHub</h1>
      <p className="text-lg mb-8 animate-fade-in">
        Your one-stop destination for the best car deals.
      </p>
      <div className="flex space-x-4 animate-fade-in">
        <Link
          to="/cars"
          className="bg-purple-600 hover:bg-purple-700 transition-all duration-300 py-2 px-6 rounded-lg font-semibold"
        >
          Explore Cars
        </Link>
        <Link
          to="/form"
          className="bg-violet-500 hover:bg-violet-600 transition-all duration-300 py-2 px-6 rounded-lg font-semibold"
        >
          Contact Us
        </Link>
      </div>
    </div>
  );
}

export default Landing;