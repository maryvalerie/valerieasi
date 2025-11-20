import React, { useState } from "react";

function Form() {
  const [submitted, setSubmitted] = useState(false);

  const handleSubmit = (e) => {
    e.preventDefault();
    setSubmitted(true);
  };

  return (
    <div className="pt-32 pb-10 flex justify-center bg-gradient-to-br from-purple-900 via-purple-700 to-violet-300 min-h-screen animate-fade-in">
      <div className="bg-white/10 backdrop-blur-lg p-8 rounded-2xl w-full max-w-3xl shadow-2xl text-white">
        <h1 className="text-3xl font-bold text-violet-100 mb-6 text-center">Contact Us</h1>
        {submitted ? (
          <div className="text-center animate-fade-in">
            <p className="text-xl text-violet-200 font-semibold mb-4">Thank you for reaching out!</p>
            <p className="text-violet-100">We will get back to you soon.</p>
          </div>
        ) : (
          <form onSubmit={handleSubmit} className="space-y-4 animate-fade-in">
            <input type="text" placeholder="Your Name" className="w-full p-3 rounded-lg text-black" required />
            <input type="email" placeholder="Your Email" className="w-full p-3 rounded-lg text-black" required />
            <textarea placeholder="Message" className="w-full p-3 rounded-lg text-black h-28" required></textarea>
            <button
              type="submit"
              className="w-full bg-purple-600 hover:bg-purple-700 py-3 rounded-lg font-bold text-white transition-all duration-300"
            >
              Send Message
            </button>
          </form>
        )}
      </div>
    </div>
  );
}

export default Form;
