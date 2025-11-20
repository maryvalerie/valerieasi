import PrimaryButton from "../components/PrimaryButton";

function Card({ car }) {
  return (
    <div className="bg-gradient-to-br from-purple-800 via-purple-600 to-violet-300 shadow-xl rounded-2xl p-6 flex flex-col items-center transition-transform duration-300 hover:scale-105 hover:shadow-violet-400/40 hover:shadow-2xl hover:-translate-y-2 animate-fade-in">
      <img
        src={car.img}
        className="rounded-xl w-full h-48 object-cover mb-4 border-4 border-violet-200 shadow-md"
        alt={car.name}
      />

      <h2 className="text-2xl font-bold text-white mb-2 text-center drop-shadow-lg">
        {car.name}
      </h2>

      <p className="text-violet-100 font-bold mb-4 text-lg">
        ₱{car.price.toLocaleString()}
      </p>

      {/* FIXED ROUTE – matches your App.js */}
      <PrimaryButton to={`/orders/${car.id}`}>
        Order Now
      </PrimaryButton>
    </div>
  );
}

export default Card;
