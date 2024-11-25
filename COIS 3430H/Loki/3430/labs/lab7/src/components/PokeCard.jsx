import '../styles/PokeCard.css';
function PokeCard({ dexNumber = "43" }) {
    return (
        <div className="PokeCard">
            <h1>Pokemon #{dexNumber}</h1>
            <img src={`https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/${dexNumber}.png`} alt={`Pokemon ${dexNumber}`} />
        </div>
    );
}

export default PokeCard;