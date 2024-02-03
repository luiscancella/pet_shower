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

# Tratamentos de erros - - - - - -> implementar <-
$response['error'] = false;
$response['error_date'] = false;

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
    $tmp = json_encode(["name" => $petShop->getName(), "price" => $petShop->getTotalPrice(), "distance" => $petShop->getDistance()]);
    array_push($response['petshops'], $tmp);
}

echo(json_encode($response));