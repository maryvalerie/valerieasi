import Card from "../components/Card";

const carList = [
  {
    id: 1,
    name: "Toyota Vios 1.3 XE",
    price: 720000,
    img: "https://i.pinimg.com/1200x/72/54/2f/72542ff220c64bb3b067cdf749c55f8b.jpg",
  },
  {
    id: 2,
    name: "Honda Civic RS Turbo",
    price: 1760000,
    img: "https://i.pinimg.com/736x/6e/8b/4e/6e8b4e3b4f69fba6657bed812896580b.jpg",
  },
  {
    id: 3,
    name: "Ford Everest Titanium",
    price: 2525000,
    img: "https://i.pinimg.com/736x/e1/10/73/e110736d24bf51f6fb37c54f58e4f555.jpg",
  },
];

function Cars() {
  return (
    <div className="pt-32 pb-10 min-h-screen flex justify-center bg-gradient-to-br from-purple-900 via-purple-700 to-violet-300">
      <div className="grid grid-cols-1 md:grid-cols-3 gap-10 max-w-6xl px-6 w-full animate-fade-in">
        {carList.map((car) => (
          <Card key={car.id} car={car} />
        ))}
      </div>
    </div>
  );
}

export default Cars;
