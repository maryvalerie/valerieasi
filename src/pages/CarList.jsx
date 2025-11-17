import CarCard from "../components/CarCard";

const cars = [
  {
    id: 1,
    brand: "Toyota",
    model: "Vios 1.3 XE",
    price: "₱720,000",
    image: "https://i.pinimg.com/1200x/51/aa/18/51aa184db4660898d58a07e99b438729.jpg",
  },
  {
    id: 2,
    brand: "Honda",
    model: "Civic RS Turbo",
    price: "₱1,760,000",
    image: "https://i.pinimg.com/1200x/b8/75/d8/b875d841b87a84372c6a5f2126e928f6.jpg",
  },
  {
    id: 3,
    brand: "Ford",
    model: "Everest Titanium",
    price: "₱2,525,000",
    image: "https://i.pinimg.com/1200x/02/cf/55/02cf5572f8d0a429e46b1cecdfc48f60.jpg",
  },
];

const CarList = () => {
  return (
    <div className="car-list-container">
      <h1 className="title">AutoShow Car Dealership</h1>

      <div className="car-list">
        {cars.map((car) => (
          <CarCard key={car.id} car={car} />
        ))}
      </div>
    </div>
  );
};

export default CarList;
