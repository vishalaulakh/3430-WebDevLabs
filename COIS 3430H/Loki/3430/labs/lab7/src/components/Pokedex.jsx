import PokeCard from "./PokeCard";
import '../styles/Pokedex.css';

function Pokedex({ dexNumbers }) {
    return (
        <div className="Pokedex">
            {dexNumbers.map((dexNumber) => (
                <PokeCard key={dexNumber} dexNumber={dexNumber} />
            ))}
        </div>
    );
}

export default Pokedex;