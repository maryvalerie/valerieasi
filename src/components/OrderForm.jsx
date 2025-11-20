import "./OrderForm.css";
import React, { useState, useEffect } from "react";
import { useLocation } from "react-router-dom";

function OrderForm() {
  const [form, setForm] = useState({
    name: "",
    email: "",
    phone: "",
    car: "",
    payment: "",
    message: ""
  });

  const query = new URLSearchParams(useLocation().search);
  const selectedCar = query.get("car");

  useEffect(() => {
    if (selectedCar) {
      setForm(prev => ({ ...prev, car: selectedCar }));
    }
  }, [selectedCar]);

  function handleChange(e) {
    setForm({ ...form, [e.target.name]: e.target.value });
  }

  function handleSubmit(e) {
    e.preventDefault();
    alert("ORDER SUBMITTED:\n\n" + JSON.stringify(form, null, 2));
  }

  return (
    <div className="orderform-wrapper"> {/* WRAPPER ADDED HERE */}
      <div style={styles.wrapper}>
        <div style={styles.container}>
          <h1 style={styles.title}>Car Order Form</h1>

          <form onSubmit={handleSubmit} style={styles.form}>
            <label style={styles.label}>Full Name:</label>
            <input
              style={styles.input}
              type="text"
              name="name"
              required
              value={form.name}
              onChange={handleChange}
            />

            <label style={styles.label}>Email:</label>
            <input
              style={styles.input}
              type="email"
              name="email"
              required
              value={form.email}
              onChange={handleChange}
            />

            <label style={styles.label}>Phone:</label>
            <input
              style={styles.input}
              type="text"
              name="phone"
              required
              value={form.phone}
              onChange={handleChange}
            />

            <label style={styles.label}>Car Model:</label>
            <input
              style={styles.input}
              type="text"
              name="car"
              required
              value={form.car}
              onChange={handleChange}
            />

            <label style={styles.label}>Payment Method:</label>
            <select
              style={styles.input}
              name="payment"
              required
              value={form.payment}
              onChange={handleChange}
            >
              <option value="">Select</option>
              <option value="Cash">Cash</option>
              <option value="Bank Financing">Bank Financing</option>
              <option value="In-House Financing">In-House Financing</option>
            </select>

            <label style={styles.label}>Message (optional):</label>
            <textarea
              style={styles.textarea}
              name="message"
              rows="3"
              value={form.message}
              onChange={handleChange}
            />

            <button type="submit" style={styles.button}>
              Submit Order
            </button>
          </form>
        </div>
      </div>
    </div>
  );
}

const styles = {
  wrapper: {
    minHeight: "100vh",
    background: "linear-gradient(180deg,#6b0ce8,#9f5cff)",
    paddingTop: "100px",
    display: "flex",
    justifyContent: "center"
  },
  container: {
    width: "450px",
    background: "white",
    padding: "30px",
    borderRadius: "15px",
    boxShadow: "0 10px 25px rgba(0,0,0,0.2)",
    color: "#000"
  },
  title: {
    textAlign: "center",
    fontSize: "28px",
    marginBottom: "20px",
    fontWeight: "bold",
    color: "#000"
  },
  form: {
    display: "flex",
    flexDirection: "column",
    color: "#000"
  },
  label: {
    marginTop: "10px",
    fontWeight: "bold",
    color: "#000"
  },
  input: {
    padding: "12px",
    marginTop: "5px",
    borderRadius: "8px",
    border: "1px solid #ccc",
    fontSize: "16px",
    color: "#000",
    background: "#fff"
  },
  textarea: {
    padding: "12px",
    marginTop: "5px",
    borderRadius: "8px",
    border: "1px solid #000",
    fontSize: "16px",
    color: "#000",
    background: "#fff"
  },
  button: {
    marginTop: "20px",
    padding: "12px",
    borderRadius: "10px",
    border: "none",
    background: "#6b0ce8",
    color: "white",
    fontSize: "18px",
    cursor: "pointer",
    transition: "0.3s"
  }
};

export default OrderForm;
