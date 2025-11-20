function Home() {
  return (
    <div className="min-h-screen flex items-center justify-center text-center px-6 pt-32 bg-gradient-to-br from-purple-900 via-purple-700 to-violet-300 animate-fade-in">
      <div className="bg-white/10 backdrop-blur-lg p-10 rounded-2xl shadow-2xl">
        <h1 className="text-5xl font-bold drop-shadow-lg text-violet-100 mb-4">Welcome to CarHub</h1>
        <p className="mt-4 text-xl max-w-2xl mx-auto text-violet-200">
          Find your dream car — Fast, Easy, and Hassle-Free!
        </p>
      </div>
    </div>
  );
}

export default Home;
