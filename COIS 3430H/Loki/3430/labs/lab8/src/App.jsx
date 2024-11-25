
import './styles/app.css';
import Lights from './components/Lights';
import { useState } from 'react';
import EmojiList from './components/EmojiList';

function App() {
  const [lightsOn, setLightsOn] = useState(true);
  const toggleLights = () => {
    setLightsOn((prevState) => !prevState);
  };

  return (
    <main className={lightsOn ? 'light' : 'dark'}>
      {/* Render the Lights component, passing down lightsOn and toggleLights as props */}
      <Lights lightsOn={lightsOn} toggleLights={toggleLights} />
      <EmojiList lightsOn={lightsOn} />
    </main>
  );
  
}

export default App
