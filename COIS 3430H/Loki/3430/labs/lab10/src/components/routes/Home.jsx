import React, { useState, useEffect } from "react";
import NavBar from "../NavBar";
import MovieCard from "../MovieCard";

const Home = () => {
  // State to store movies
  const [movies, setMovies] = useState([]);

  // Fetch movies on initial render
  useEffect(() => {
    fetch("movies.json")
      .then((response) => {
        if (!response.ok) {
          throw new Error("Failed to fetch movies.");
        }
        return response.json();
      })
      .then((data) => setMovies(data))
      .catch((error) => console.error(error));
  }, []);

  return (
    <div>
      <header>
        <NavBar />
      </header>
      <main>
        <h1>Home Page</h1>
        <div className="movies-list">
          {movies.map((movie) => (
            <MovieCard key={movie.id} movie = {movie} />
          ))}
        </div>
      </main>
    </div>
  );
};

export default Home;
