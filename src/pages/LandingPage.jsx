import React from "react";
import { Link } from "react-router-dom";

function LandingPage() {
  return (
    <div className="min-h-screen bg-gradient-to-br from-green-200 to-green-400">

      {/* NAVBAR */}
      <div className="bg-white mx-10 mt-6 p-6 rounded-xl shadow-lg flex justify-between">
        <h1 className="text-2xl font-bold text-green-900">CarRent</h1>

        <div className="flex gap-10 text-lg font-semibold text-green-900">
          <Link to="/">Home</Link>
          <Link to="/cars">Cars</Link>
          <Link to="/orders">Orders</Link>
        </div>
      </div>

      {/* HERO SECTION */}
      <div className="text-center mt-32">
        <h1 className="text-4xl font-bold text-green-900">
          Choose your ride and hit the road 🚗💨
        </h1>

        <p className="mt-4 text-lg text-green-900">
          Rent or buy cars easily with a few clicks.
        </p>

        <Link
          to="/cars"
          className="inline-block mt-6 bg-green-800 text-white px-5 py-3 rounded-lg hover:bg-green-900"
        >
          Explore Cars
        </Link>
      </div>

    </div>
  );
}

export default LandingPage;
