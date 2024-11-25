import ContactCard from "./ContactCard";
import "../styles/ContactGrid.css";

export default function ContactGrid({ contacts }) {
  return (
    <section className="ContactGrid">
      {contacts.map((contact, index) => (
        <ContactCard key={contact.contactID} contact={contact} />
      ))}
    </section>
  );
}
