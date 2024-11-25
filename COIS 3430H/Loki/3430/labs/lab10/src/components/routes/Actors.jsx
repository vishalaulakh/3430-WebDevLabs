import { useEffect, useState } from "react";
import NavBar from "../NavBar";
import ReusableCard from "../ReusableCard";

function Actors() {
  const [actors, setActors] = useState([]);

  useEffect(() => {
    // Fetch actor data on component mount
    fetch("actors.json")
      .then((response) => response.json())
      .then((data) => setActors(data))
      .catch((error) => console.error("Error fetching actors:", error));
  }, []);

  return (
    <>
      <header>
        <NavBar />
      </header>
      <main>
        <h1>Actors Page</h1>
        <div className="actors-list">
          {actors.map((actor) => (
            <ReusableCard key={actor.id} name={actor.name} movies={actor.movies} />
          ))}
        </div>
      </main>
    </>
  );
}

export default Actors;
