import { NavLink } from "react-router-dom";
import "../styles/NavBar.css";

function NavBar() {
  return <nav className="navbar">
    <ul>
        <li>
          <NavLink to="/" end>
            Home
          </NavLink>
        </li>
        <li>
          <NavLink to="/directors">Directors</NavLink>
        </li>
        <li>
          <NavLink to="/actors">Actors</NavLink>
        </li>
      </ul>
  </nav>;
}

export default NavBar;
