<?php
class Price {

    private $profitFactor;
    private $location;
    private $previousCustomer;
    private $gallonsRequested;
    private $gallonsRequestedFactor;
    private $pricePerGallon;
    function __construct() {
        //connect to database and get values
        $this->profitFactor = 10;
        $this->pricePerGallon = 1.5;
        $this->location;
        $this->previousCustomer;
        $this->gallonsRequested;
        $this->gallonsRequestedFactor;
    }

    function calculateMargin()
    {
        return ($this->pricePerGallon * ($this->location - $this->previousCustomer + $this->gallonsRequestedFactor + $this->profitFactor));
    }
}

?>