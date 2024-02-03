import'./App.css';

import Form from './components/Form';

function getPrices(query){
  fetch('http://localhost:5050/teste.php', {
    method: 'POST',
    Headers: {
      'Content-type': 'application/json'
    },
    body: JSON.stringify(query)
  })
  .then((resp) => resp.json())
  .then((data) => {
    console.log(data);
  })
  .catch((error) => console.log("ERRO" + error));
}

function App() {
  return (
    <>
      <section className="main">
        <div className="logo"></div>
        <p className="label-logo">Consulte aqui o melhor local para dar banho no seu pet!</p>
      </section>
      <section className="form">
        <Form handleSubmit={getPrices}/>
      </section>
    </>
  );
}

export default App;
