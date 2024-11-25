import { useState, useEffect } from "react";
import SearchForm from "./SearchForm";
import ContactGrid from "./ContactGrid";

export default function SearchContact() {
  const [contacts, setContacts] = useState([]);  // Stores the fetched contacts
  const [searchName, setSearchName] = useState(""); // Tracks the name to search for

  // Update searchName whenever a new search term is entered
  function getContacts(name) {
    setSearchName(name);
  }

  // Fetch contacts based on the searchName state
  useEffect(() => {
    const fetchContacts = async () => {
      try {
        const response = await fetch(
          `https://loki.trentu.ca/~vishalsingh/3430/labs/lab9/api/contacts?search=${searchName}`
        );
        if (!response.ok) throw new Error("Network response was not ok");
        const data = await response.json();
        setContacts(data);  // Update contacts state with fetched data
      } catch (error) {
        console.error("Fetch error:", error);
      }
    };
    fetchContacts();
  }, [searchName]); // Trigger whenever searchName changes

  return (
    <>
      <SearchForm search={getContacts} />
      <ContactGrid contacts={contacts} />
    </>
  );
}
