import React from "react";
import { Link } from "react-router-dom";

function CarCard({ title, price, image }) {
  return (
    <div className="car-card">
      <img src={image} alt={title} className="car-image" />

      <h2>{title}</h2>
      <p>{price}</p>

      <Link
        to={`/order?car=${encodeURIComponent(title)}`}
        className="order-btn"
      >
        Order Now
      </Link>
    </div>
  );
}

export default CarCard;
