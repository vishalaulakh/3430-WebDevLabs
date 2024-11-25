function ReusableCard({ name, movies }) {
  const movieList = movies.map((movie) => <li key={movie}>{movie}</li>);
  console.log(movieList);
  return (
    <article>
      <h2>{name}</h2>
      <ul>{movieList}</ul>
    </article>
  );
}

export default ReusableCard;
