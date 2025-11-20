import React, { useState } from "react";

function Payment() {
  const [submitted, setSubmitted] = useState(false);

  const handleSubmit = (e) => {
    e.preventDefault();
    setSubmitted(true);
  };

  return (
    <div className="pt-32 pb-10 flex justify-center bg-gradient-to-br from-purple-900 via-purple-700 to-violet-300 min-h-screen animate-fade-in">
      <div className="bg-white/10 backdrop-blur-lg p-8 rounded-2xl w-full max-w-3xl shadow-2xl text-white">
        <h1 className="text-3xl font-bold text-violet-100 mb-6 text-center">Payment</h1>
        {submitted ? (
          <div className="text-center animate-fade-in">
            <p className="text-xl text-violet-200 font-semibold mb-4">Payment Successful!</p>
            <p className="text-violet-100">Thank you for your purchase.</p>
          </div>
        ) : (
          <form onSubmit={handleSubmit} className="space-y-4 animate-fade-in">
            <input type="text" placeholder="Cardholder Name" className="w-full p-3 rounded-lg text-black" required />
            <input type="text" placeholder="Card Number" className="w-full p-3 rounded-lg text-black" required maxLength={16} />
            <div className="flex gap-4">
              <input type="text" placeholder="MM/YY" className="w-1/2 p-3 rounded-lg text-black" required maxLength={5} />
              <input type="text" placeholder="CVC" className="w-1/2 p-3 rounded-lg text-black" required maxLength={4} />
            </div>
            <button
              type="submit"
              className="w-full bg-purple-600 hover:bg-purple-700 py-3 rounded-lg font-bold text-white transition-all duration-300"
            >
              Pay Now
            </button>
          </form>
        )}
      </div>
    </div>
  );
}

export default Payment;
