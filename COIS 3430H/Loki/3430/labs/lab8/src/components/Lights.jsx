import '../styles/Lights.css';

export default function Lights({ lightsOn, toggleLights }) {
  return (
    <section className={`Lights ${lightsOn ? 'light' : 'dark'}`}>
      {/* Conditionally render the <h2> only when lights are off */}
      {!lightsOn && <h2>Hey, Who Turned Out the Lights?</h2>}
      {/* Add onClick handler to call toggleLights when button is clicked */}
      <button onClick={toggleLights}>Toggle Lights</button>
    </section>
  );
}
