<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Content-Type: application/json');


// Verifica se a requisição foi feita usando o método POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtém os dados do corpo da requisição POST
    $postData = file_get_contents("php://input");

    // Converte os dados JSON em um array associativo
    $postDataArray = json_decode($postData, true);

    // Verifica se a decodificação foi bem-sucedida
    if ($postDataArray !== null) {
        // Exibe os dados recebidos em formato JSON
        echo json_encode($postDataArray);
    } else {
        // Se a decodificação falhar, exibe uma mensagem de erro
        echo json_encode(array('error' => 'Falha ao decodificar os dados JSON.'));
    }
} else {
    // Se a requisição não foi feita com o método POST, exibe uma mensagem
    echo json_encode(array('error' => 'Esta página deve ser acessada por meio de uma requisição POST.'));
}

?>
