
import './App.css'
import PokeCard from './components/PokeCard';
import Pokedex from './components/Pokedex';




function App() {
    const dexNumbers = ["1", "4", "7", "25", "39", "50", "54", "63", "92", "143"];

    return (
      <>
<PokeCard dexNumber = "5"  />
<PokeCard dexNumber = "1"  />
<PokeCard />

<div className="App">

    <Pokedex dexNumbers={dexNumbers} />
</div>
        </>
    );
}



export default App
