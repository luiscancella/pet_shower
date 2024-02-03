<?php
class PetShop {
    # PetShop name
    public $name;
    # Distance from PetShop in meters
    private $distance;
    # PetShop small dog price
    private $price_small;
    # PetShop big dog price
    private $price_big;
    # PetShop small dog price on weekend
    private $weekend_price_small;
    # PetShop big dog price on weekend
    private $weekend_price_big;
    # Total order
    private $totalPrice = 0;

    function __construct($name, $distance, $price_small, $price_big){
        $this->name = $name;
        $this->distance = $distance;
        $this->price_small = $price_small;
        $this->price_big = $price_big;
    }

    public function setWeekendPriceByValue($price_small, $price_big){
        $this->weekend_price_small = $price_small;
        $this->weekend_price_big = $price_big;
    }

    public function setWeekendPriceByPercent($percent){
        $percent = $percent / 100 + 1;
        $this->weekend_price_small = $this->price_small * $percent;
        $this->weekend_price_big = $this->price_big * $percent;
    }

    # Getters
    public function getPriceSmall(){
        return $this->price_small;
    }

    public function getPriceBig(){
        return $this->price_big;
    }

    public function getWeekendPriceSmall(){
        return $this->weekend_price_small;
    }

    public function getWeekendPriceBig(){
        return $this->weekend_price_big;
    }

    public function getTotalPrice(){
        return $this->totalPrice;
    }

    public function getDistance(){
        return $this->distance;
    }

    public function getName(){
        return $this->name;
    }

    # Setter

    public function setTotalPrice($total_price){
        $this->totalPrice = $total_price;
    }

    public function print(){
        echo $this->name . '<br>';
        echo $this->price_small . '<br>';
        echo $this->price_big . '<br>';
        echo $this->weekend_price_small . '<br>';
        echo $this->weekend_price_big . '<br>';
    }

}