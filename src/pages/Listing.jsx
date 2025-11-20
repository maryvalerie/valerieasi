export default function Listing() {
  const cars = [
    { id: 1, name: "Toyota Vios", price: "₱1,000/day" },
    { id: 2, name: "Honda Civic", price: "₱1,800/day" },
    { id: 3, name: "Ford Ranger", price: "₱2,500/day" },
  ];

  return (
    <div style={{ padding: "40px" }}>
      <h1>Available Cars</h1>
      <ul style={{ marginTop: "20px" }}>
        {cars.map(car => (
          <li key={car.id} style={{ marginBottom: "15px" }}>
            <strong>{car.name}</strong> — {car.price}
          </li>
        ))}
      </ul>
    </div>
  );
}
