import { useState } from "react";
import "../styles/SearchForm.css";

export default function SearchForm({ search }) {
  // Initialize state to hold the input value
  const [inputText, setInputText] = useState("");

  // Update state as the user types
  const handleInputChange = (event) => {
    setInputText(event.target.value);
  };

  // Handle form submission
  const handleSubmit = (event) => {
    event.preventDefault(); // Prevent the default form submission behavior
    search(inputText); // Call the search function passed as a prop with the input value
    setInputText(""); // Clear the input after submission
  };

  return (
    <form className="SearchForm" onSubmit={handleSubmit}>
      {/* Set value to inputText and handle changes */}
      <input 
        type="text" 
        value={inputText} 
        onChange={handleInputChange} 
      />
      <button type="submit">Find Contacts!</button>
    </form>
  );
}
