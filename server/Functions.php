<?php
# Check if it is a weekend 
function isWeekend($date_string){
    $timestamp = DateTime::createFromFormat('d/m/Y', $date_string);
    $dayofweek = (int)$timestamp->format('w');
    
    return ($dayofweek == 0 || $dayofweek == 6);
}

# Compare PetShop by total order value and distance
function comparePetShops($a, $b) {
    $priceComparison = $a->getTotalPrice() - $b->getTotalPrice();
    
    if ($priceComparison == 0) return $a->getDistance() - $b->getDistance();

    return $priceComparison;
}

# Check date is valid
function dateIsValid($date_string){
    $format = 'd/m/Y';
    $date = DateTime::createFromFormat($format, $date_string);

    return ($date && $date->format($format) === $date_string);
}