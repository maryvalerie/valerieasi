import React, { useState } from "react";

const CarCard = ({ car }) => {
  const [showForm, setShowForm] = useState(false);

  const [form, setForm] = useState({
    name: "",
    contact: "",
    message: "",
  });

  const handleSubmit = (e) => {
    e.preventDefault();
    alert(`Order Sent!\n\nName: ${form.name}\nContact: ${form.contact}\nCar: ${car.brand} ${car.model}`);
    setShowForm(false);
  };

  return (
    <div className="car-card">
      <img src={car.image} alt={car.model} className="car-img" />

      <h2>{car.brand}</h2>
      <p>{car.model}</p>
      <strong>{car.price}</strong>

      <button onClick={() => setShowForm(true)} className="order-btn">
        Order Now
      </button>

      {showForm && (
        <div className="modal">
          <div className="modal-content">
            <h3>Order Form</h3>

            <form onSubmit={handleSubmit}>
              <input
                type="text"
                placeholder="Your Name"
                value={form.name}
                onChange={(e) => setForm({ ...form, name: e.target.value })}
                required
              />

              <input
                type="text"
                placeholder="Contact Number"
                value={form.contact}
                onChange={(e) => setForm({ ...form, contact: e.target.value })}
                required
              />

              <textarea
                placeholder="Message"
                value={form.message}
                onChange={(e) =>
                  setForm({ ...form, message: e.target.value })
                }
              ></textarea>

              <button type="submit" className="submit-btn">
                Submit
              </button>

              <button
                type="button"
                onClick={() => setShowForm(false)}
                className="close-btn"
              >
                Close
              </button>
            </form>
          </div>
        </div>
      )}
    </div>
  );
};

export default CarCard;
