import style from './Modal.module.css'

function Modal({isModalOpen, setModalOpen, children}){
    if(isModalOpen){
        return (
            <div className={style.backgroud}>
                <div className={style.modal_box}>
                    <section className={style.close_section}>
                        <button onClick={setModalOpen}>X</button>
                    </section>
                    <section className={style.content_section}>
                        <div>{children}</div>
                    </section>
                </div>
            </div>
        )
    }
    return null;
}

export default Modal;