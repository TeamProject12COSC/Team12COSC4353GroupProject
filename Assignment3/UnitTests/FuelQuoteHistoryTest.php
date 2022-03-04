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
            $this->assertGreaterThan(0, $arrayTotal[$i]);
            $this->assertNotNull($arrayDate[$i]);
        }
        $this->assertGreaterThan(0, $gallonPrice);
        $this->assertNotNull($address);


    
    }




}

?>