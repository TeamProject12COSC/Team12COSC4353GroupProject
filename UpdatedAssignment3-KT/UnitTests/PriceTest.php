<?php

use PHPUnit\Framework\TestCase;

final class PriceTest extends TestCase
{
    
    public function testPriceClass(): void
    {
        require_once "Price.php";

        $price = new Price(0.02, 0.01, 1500, 0.02);
        $this->assertEquals($price->calculateTotal(), 2542.5);
        $this->assertIsNumeric($price->calculateTotal(), "This value is not numeric");
    }

}

?>