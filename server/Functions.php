<?php
# Check if it is a weekend 
function isWeekend($date_string){
    $timestamp = DateTime::createFromFormat('d/m/Y', $date_string);
    $dayofweek = (int)$timestamp->format('w');
    
    if ($dayofweek == 0 || $dayofweek == 6) {
        return true;
    }
    return false;
}

# Compare PetShop by total order value and distance
function comparePetShops($a, $b) {
    $priceComparison = $a->getTotalPrice() - $b->getTotalPrice();

    if ($priceComparison === 0) {
        return $a->getDistance() - $b->getDistance();
    } else {
        return $priceComparison;
    }
}