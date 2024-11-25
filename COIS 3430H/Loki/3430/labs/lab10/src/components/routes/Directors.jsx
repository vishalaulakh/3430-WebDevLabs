import React, { useEffect, useState } from "react";
import NavBar from "../NavBar";
import ReusableCard from "../ReusableCard";

function Directors() {
  const [directors, setDirectors] = useState([]);

  useEffect(() => {
    fetch("directors.json")
      .then((response) => response.json())
      .then((data) => setDirectors(data))
      .catch((error) => console.error("Error fetching directors:", error));
  }, []);

  return (
    <>
      <header>
        <NavBar />
      </header>
      <main>
        <h1>Directors Page</h1>
        <div className="directors-list">
          {directors.map((director) => (
            <ReusableCard key={director.id} name={director.name} movies={director.movies} />
          ))}
        </div>
      </main>
    </>
  );
}

export default Directors;
