import { useParams } from "react-router-dom";
import NavBar from "../NavBar";

function Movie() {
  const { id } = useParams(); // Get the id from the URL

  return (
    <>
      <header>
        <NavBar /> {/* Render the NavBar */}
      </header>
      <main>
        <h1>Movie Page</h1>
        <h2>If I had an API, this would display the details for movie {id}</h2>
      </main>
    </>
  );
}

export default Movie;
