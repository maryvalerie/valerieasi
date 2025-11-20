import { useState, useEffect } from "react";
import { useLocation } from "react-router-dom";

function OrderForm() {
  const location = useLocation();
  
  const queryParams = new URLSearchParams(location.search);
  const selectedCar = queryParams.get("car") || "";

  const [formData, setFormData] = useState({
    name: "",
    email: "",
    phone: "",
    car: selectedCar,
    payment: "",
    message: ""
  });

  useEffect(() => {
    setFormData((prev) => ({ ...prev, car: selectedCar }));
  }, [selectedCar]);

  function handleChange(e) {
    setFormData({ ...formData, [e.target.name]: e.target.value });
  }

  function handleSubmit(e) {
    e.preventDefault();
    alert("Order Successfully Submitted!\n\n" + JSON.stringify(formData, null, 2));
  }

  return (
    <div style={styles.page}>
      <div style={styles.formContainer}>
        <h1 style={styles.title}>Car Order Form</h1>

        <form onSubmit={handleSubmit} style={styles.form}>
          <label style={styles.label}>Full Name</label>
          <input
            type="text"
            name="name"
            required
            value={formData.name}
            onChange={handleChange}
            style={styles.input}
          />

          <label style={styles.label}>Email</label>
          <input
            type="email"
            name="email"
            required
            value={formData.email}
            onChange={handleChange}
            style={styles.input}
          />

          <label style={styles.label}>Phone</label>
          <input
            type="text"
            name="phone"
            required
            value={formData.phone}
            onChange={handleChange}
            style={styles.input}
          />

          <label style={styles.label}>Selected Car</label>
          <input
            type="text"
            name="car"
            readOnly
            value={formData.car}
            style={{ ...styles.input, background: "#eee", cursor: "not-allowed" }}
          />

          <label style={styles.label}>Payment Method</label>
          <select
            name="payment"
            required
            value={formData.payment}
            onChange={handleChange}
            style={styles.input}
          >
            <option value="">Select Payment Method</option>
            <option value="Cash">Cash</option>
            <option value="Bank Financing">Bank Financing</option>
            <option value="In-house Financing">In-house Financing</option>
          </select>

          <label style={styles.label}>Message (Optional)</label>
          <textarea
            name="message"
            rows="4"
            value={formData.message}
            onChange={handleChange}
            style={styles.textarea}
          />

          <button type="submit" style={styles.submitButton}>
            Submit Order
          </button>
        </form>
      </div>
    </div>
  );
}

const styles = {
  page: {
    width: "100%",
    minHeight: "100vh",
    background: "linear-gradient(180deg, #5a0fc8, #8a4ef7, #c28cff)",
    display: "flex",
    justifyContent: "center",
    paddingTop: "80px"
  },
  formContainer: {
    width: "450px",
    background: "white",
    borderRadius: "15px",
    padding: "30px",
    boxShadow: "0px 10px 25px rgba(0,0,0,0.2)"
  },
  title: {
    textAlign: "center",
    marginBottom: "20px",
    fontSize: "28px",
    fontWeight: "bold",
    color: "#4d0fc9"
  },
  form: {
    display: "flex",
    flexDirection: "column"
  },
  label: {
    marginBottom: "5px",
    marginTop: "10px",
    fontWeight: "600",
    color: "#333"
  },
  input: {
    padding: "12px",
    borderRadius: "8px",
    border: "1px solid #ccc",
    fontSize: "16px"
  },
  textarea: {
    padding: "12px",
    borderRadius: "8px",
    border: "1px solid #ccc",
    fontSize: "16px"
  },
  submitButton: {
    marginTop: "20px",
    background: "#6c20ff",
    color: "white",
    padding: "12px",
    fontSize: "18px",
    border: "none",
    borderRadius: "10px",
    cursor: "pointer",
    transition: "0.3s"
  }
};

export default OrderForm;
