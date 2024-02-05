import style from './Input.module.css';

function Input({type, text, name, placeholder, handleOnChange, value}){
    return(
        <div className={style.form_input}>
            <label htmlFor={name}>{text}</label>
            <input
                type={type}
                name={name}
                placeholder={placeholder}
                onChange={handleOnChange}
            />
        </div>
    )
}

export default Input;