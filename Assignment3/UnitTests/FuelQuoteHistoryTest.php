<?php

use PHPUnit\Framework\TestCase;

final class FuelQuoteHistoryTest extends TestCase
{
    
    public function testhistory(): void
    {

        require_once "FuelQuoteHistory.php";

        $this->assertGreaterThan(0, $gallonPrice);
        $this->assertGreaterThan(0, $total);

    
    }




}

?>