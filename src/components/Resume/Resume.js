function Resume({ranking, price, name, distance}){
    return(
        <div key={ranking}>
            <h3>{ranking}° POSIÇÃO</h3>
            <p>NOME: {name}<br/>
            VALOR: R$ {price}<br/>
            DISTÂNCIA: {distance} metros</p>
        </div>
    )
}

export default Resume;