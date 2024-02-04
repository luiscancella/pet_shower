import { useState } from 'react';
import'./App.css';

import Form from './components/Form/Form';
import Modal from './components/Modal/Modal';
import Resume from './components/Resume/Resume';


function App() {
  const [isModalOpen, setModalOpen] = useState(false);
  const [modalBody, setModalBody] = useState(<p>Faça uma consulta para começar!</p>);

  var count = 1;
  function getCount(){
    let aux = count;
    count++;
    return aux;
  }

  function getPrices(query){
    setModalOpen(!isModalOpen);
    if(Object.keys(query).length === 0) return;
    setModalBody(<p>Consultando...</p>);
    fetch('http://localhost:5050/server/Calculator.php', {
      method: 'POST',
      Headers: {
        'Content-type': 'application/json'
      },
      body: JSON.stringify(query)
    })
    .then((resp) => resp.json())
    .then((data) => {
      console.log(data);
      count = 1;
      if(!data['error']){
        setModalBody(<div>{
          data['petshops'].map((petshop) => <Resume ranking={getCount()} name={petshop['name']} price={petshop['price']} distance={petshop['distance']}/>)
          }</div>
        );
      } else{
        console.log("caiu no erro");
        let aux = [];
        if(data['error_date']) aux.push('Data deve estar no formato "dia/mês/ano" !');
        if (data['error_dog_small']) aux.push('Campo de cachorro pequeno deve ser número!');
        if (data['error_dog_big']) aux.push('Campo de cachorro pequeno deve ser número!');
        console.log(aux);
        setModalBody(<ul style={{color: 'red'}}>{aux.map((msg) => <li><p>{msg} </p></li>)}</ul>)
      }
    })
  }
  
  return (
    <>
      <section className="main">
        <div className="logo"></div>
        <p className="label-logo">Consulte aqui o melhor local para dar banho no seu pet!</p>
      </section>
      <section className="form">
        <Form handleSubmit={getPrices}/>
      </section>
      <Modal isModalOpen={isModalOpen} setModalOpen={() => setModalOpen(!isModalOpen)}>
        <div>
          <h2 className='modalBodyTitle'>RESUMO:</h2>
          <section className="modal_resume">{modalBody}</section>
        </div>
      </Modal>
    </>
  );
}

export default App;
