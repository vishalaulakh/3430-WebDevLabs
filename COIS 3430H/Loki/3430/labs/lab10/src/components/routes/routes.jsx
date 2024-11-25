import { createBrowserRouter } from "react-router-dom";

// Importing Components
import Home from "./Home";
import Directors from "./Directors";
import Actors from "./Actors";
import ErrorPage from "./Error";
import Movie from "./Movie"; // Ensure this component exists or is created

const routes = createBrowserRouter([
  {
    path: "/",
    element: <Home />,
    errorElement: <ErrorPage />, // Handles invalid paths
  },
  {
    path: "/directors",
    element: <Directors />,
  },
  {
    path: "/actors",
    element: <Actors />,
  },
  {
    path: "/movie/:id", // Dynamic route for movie details
    element: <Movie />, // Pass ID parameter to the Movie component
  },
]);

export default routes;
