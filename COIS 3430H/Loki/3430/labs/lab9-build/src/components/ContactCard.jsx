import "../styles/ContactCard.css";

export default function ContactCard({ contact }) {
  return (
    <div className="ContactCard">
      <h3>{contact.name}</h3>
      <p>Email: {contact.email}</p>
      <p>Phone: {contact.phone}</p>
    </div>
  );
}
