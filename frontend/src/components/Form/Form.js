import style from './Form.module.css';
import Input from '../Input/Input';
import lupa from '../../assets/lupa.png';
import { useState } from 'react';


function Form({handleSubmit}){
    const [query, setQuery] = useState({})

    function handleChange(e){
        setQuery({...query, [e.target.name]: e.target.value});
    }
    
    const submit = (e) => {
        e.preventDefault();
        handleSubmit(query);
    }

    return(
        <section className={style.form_section}>
            <p>Insira os dados</p>
            <form onSubmit={submit} className={style.form}>
                <div className={style.input_group}>
                    <Input
                    type='text'
                    name='date'
                    text='Data:'
                    placeholder='Exemplo: 10/06/2024'
                    handleOnChange={handleChange}
                    />
                    <Input
                    type='text'
                    name='dog_small'
                    text='Cães Pequenos:'
                    placeholder='Exemplo: 3'
                    handleOnChange={handleChange}
                    />
                    <Input
                    type='text'
                    name='dog_big'
                    text='Cães Grandes:'
                    placeholder='Exemplo: 1'
                    handleOnChange={handleChange}
                    />
                </div>
                <button type='submit' aria-label='CONSULTAR'>
                    <img src={lupa} alt='Pesquisar'/>
                </button>
            </form>
        </section>
    )
}

export default Form;