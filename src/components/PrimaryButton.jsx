import { Link } from "react-router-dom";

function PrimaryButton({ to, children }) {
  return (
    <Link to={to} className="w-full bg-purple-600 hover:bg-purple-700 py-3 rounded-lg font-bold text-white transition-all duration-300 text-center block">
      {children}
    </Link>
  );
}

export default PrimaryButton;