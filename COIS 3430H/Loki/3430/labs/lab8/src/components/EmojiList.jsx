import '../styles/EmojiList.css';
import { useState } from 'react';
import { getRandomEmoji } from './getEmoji';

export default function EmojiList({ lightsOn }) {
  // Initialize the emoji array state with one random emoji
  const [emojis, setEmojis] = useState([getRandomEmoji()]);

  // this is the Function to add a new random emoji to the array
  const addEmoji = () => {
    setEmojis((prevEmojis) => [...prevEmojis, getRandomEmoji()]);
  };

  return (
    <section className="EmojiList">
      <h2>Emoji List</h2>
      <ul>
        {emojis.map((emoji, index) => (
          <li
            key={`${emoji.id}-${index}`}
            className="emoji"
            style={{
              boxShadow: lightsOn ? 'none' : '0 0 .3em .1em lime', // this is the Conditional styling based on lightsOn
            }}
          >
            {emoji.emoji}
          </li>
        ))}
      </ul>
      <button onClick={addEmoji}>Add Emoji</button>
    </section>
  );
}
