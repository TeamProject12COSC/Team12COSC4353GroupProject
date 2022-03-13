<?php //price class 
class Price {

    private $profitFactor;
    private $location;
    private $previousCustomer;
    private $gallonsRequested;
    private $gallonsRequestedFactor;
    private $pricePerGallon;
    //constructor will receive parameters from the caller which receives parameters from database and form input
    function __construct($location, $previousCustomer, $gallonsRequested, $gallonsRequestedFactor) {
        $this->profitFactor = 0.1;
        $this->pricePerGallon = 1.5;
        $this->location = $location;
        $this->previousCustomer = $previousCustomer;
        $this->gallonsRequested = $gallonsRequested;
        $this->gallonsRequestedFactor = $gallonsRequestedFactor;
    }

    function calculateMargin()
    {
        return ($this->pricePerGallon * ($this->location - $this->previousCustomer + $this->gallonsRequestedFactor + $this->profitFactor));
    }

    function calculateSuggestedPrice()
    {
        return ($this->calculateMargin() + 1.5);
    }

    function calculateTotal()
    {
        return ($this->gallonsRequested * $this->calculateSuggestedPrice());
    }
}

?>
