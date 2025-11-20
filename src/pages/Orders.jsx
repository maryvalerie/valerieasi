import { useParams } from "react-router-dom";
import OrderForm from "../components/OrderForm";

const carList = [
  {
    id: 1,
    name: "Toyota Vios 1.3 XE",
    price: 720000,
    img: "https://cdn.pixabay.com/photo/2017/01/06/19/15/toyota-1957037_1280.jpg",
    description: "A reliable sedan with excellent fuel efficiency and comfort. Perfect for city driving.",
  },
  {
    id: 2,
    name: "Honda Civic RS Turbo",
    price: 1760000,
    img: "https://cdn.pixabay.com/photo/2016/11/29/09/32/auto-1868726_1280.jpg",
    description: "A sporty and stylish car with turbocharged performance and advanced features.",
  },
  {
    id: 3,
    name: "Ford Everest Titanium",
    price: 2525000,
    img: "https://cdn.pixabay.com/photo/2012/05/29/00/43/ford-49278_1280.jpg",
    description: "A premium SUV with spacious interiors, powerful engine, and off-road capabilities.",
  },
];

function Order() {
  const { id } = useParams();
  const car = carList.find((c) => c.id == id);

  if (!car) return <p className="pt-32 text-center text-violet-200">Car not found.</p>;

  return (
    <div className="pt-32 pb-10 flex justify-center bg-gradient-to-br from-purple-900 via-purple-700 to-violet-300 min-h-screen animate-fade-in">
      <div className="bg-white/10 backdrop-blur-lg p-8 rounded-2xl w-full max-w-3xl shadow-2xl text-white">
        <img src={car.img} className="rounded-lg w-full mb-4 border-4 border-violet-200" alt={car.name} />
        <h1 className="text-3xl font-bold text-violet-100">{car.name}</h1>
        <p className="text-violet-200 font-bold mb-6">
          ₱{car.price.toLocaleString()}
        </p>
        <p className="text-violet-300 mb-6">{car.description}</p>
        <OrderForm car={car} />
      </div>
    </div>
  );
}

export default Order;
