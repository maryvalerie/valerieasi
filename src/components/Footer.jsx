function Footer() {
  return (
    <footer className="w-full bg-gradient-to-r from-purple-800 via-purple-600 to-violet-400 py-4 text-center text-white font-semibold mt-10">
      <p>&copy; {new Date().getFullYear()} CarHub. All rights reserved.</p>
    </footer>
  );
}

export default Footer;