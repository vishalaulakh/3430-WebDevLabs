import "../styles/App.css";
import SearchContact from "./SearchContact";

function App() {
  return (
    <>
      <header>
        <h1>My Address Book</h1>
      </header>
      <main>
        <SearchContact />
      </main>
      <footer>&copy; COIS 3430, Inc. 2024 &mdash; Built by [name]</footer>
    </>
  );
}

export default App;
