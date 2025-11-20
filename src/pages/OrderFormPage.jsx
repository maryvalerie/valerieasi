import React from "react";
import OrderForm from "../components/OrderForm";

export default function OrderFormPage() {
  return (
    <div className="pt-32 pb-10 flex justify-center bg-gradient-to-br from-purple-900 via-purple-700 to-violet-300 min-h-screen animate-fade-in">
      <div className="bg-white/10 backdrop-blur-lg p-8 rounded-2xl w-full max-w-3xl shadow-2xl text-white">
        <OrderForm />
      </div>
    </div>
  );
}