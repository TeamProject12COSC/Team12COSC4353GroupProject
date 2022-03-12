<?php

use PHPUnit\Framework\TestCase;

final class FuelQuoteHistoryTest extends TestCase
{
    
    public function testhistory(): void
    {

        require_once "FuelQuoteHistory.php";

        for ($i = 0; $i < $loopNum; $i++)
        {   
            $this->assertGreaterThan(0, $arrayGal[$i]);
            $this->assertIsFloat($arrayGal[$i], "Value is not float");
            $this->assertGreaterThan(0, $arrayTotal[$i]);
            $this->assertIsFloat($arrayTotal[$i], "value is not a float");
            $this->assertNotNull($arrayDate[$i]);
        }
        $this->assertGreaterThan(0, $gallonPrice);
        $this->assertIsFloat($gallonPrice, "value is not a float");
        $this->assertNotNull($address);



    
    }




}

?>
