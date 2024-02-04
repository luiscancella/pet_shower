<?php
require_once("./PetShop.php");
require_once("./Functions.php");

header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Content-Type: application/json');

# Instance the petshops
$canino_feliz = new PetShop('Meu Canino Feliz', 2000, 20, 40);
$canino_feliz->setWeekendPriceByPercent(20);

$vai_rex = new PetShop('Vai Rex', 1700, 15, 50);
$vai_rex->setWeekendPriceByValue(20, 55);

$chowchawgas = new PetShop('ChowChawgas', 800, 30, 45);
$chowchawgas->setWeekendPriceByValue(30, 45);

$petShops = [$canino_feliz, $vai_rex, $chowchawgas];

# Get data from POST
$rawData = file_get_contents("php://input");
$data = json_decode($rawData, true);

# Tratamentos de erros
$response['error'] = false;
$response['error_date'] = !(dateIsValid($data['date']));
$response['error_dog_small'] = !(is_numeric($data['dog_small']));
$response['error_dog_big'] = !(is_numeric($data['dog_big']));

if($response['error_date'] || $response['error_dog_small'] || $response['error_dog_big']){
    $response['error'] = true;
    die(json_encode($response));
}

# Calculate price by day
if(isWeekend($data['date'])){
    foreach ($petShops as $shop) {
        $total_small = $shop->getWeekendPriceSmall() * $data['dog_small'];
        $total_big = $shop->getWeekendPriceBig() * $data['dog_big'];
        $total = $total_big + $total_small;
        $shop->setTotalPrice($total);
    }
} else {
    foreach ($petShops as $shop) {
        $total_small = $shop->getPriceSmall() * $data['dog_small'];
        $total_big = $shop->getPriceBig() * $data['dog_big'];
        $total = $total_big + $total_small;
        $shop->setTotalPrice($total);
    }
};

# Sort PetShop Array
usort($petShops, 'comparePetShops');

# Parse data to send back
$response['petshops'] = array();

foreach ($petShops as $petShop) {
    $tmp = ["name" => $petShop->getName(), "price" => $petShop->getTotalPrice(), "distance" => $petShop->getDistance()];
    array_push($response['petshops'], $tmp);
}

die(json_encode($response));