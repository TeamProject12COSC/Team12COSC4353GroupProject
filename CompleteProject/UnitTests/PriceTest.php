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

        $price = new Price(0.04, 0, 1500, 0.02);
        $this->assertEquals($price->calculateTotal(), 2610);
        $this->assertIsNumeric($price->calculateTotal(), "This value is not numeric");

        $price = new Price(0.04, 0.01, 1500, 0.02);
        $this->assertEquals($price->calculateTotal(), 2587.5);
        $this->assertIsNumeric($price->calculateTotal(), "This value is not numeric");

        $price = new Price(0.02, 0, 1500, 0.02);
        $this->assertEquals($price->calculateTotal(), 2565);
        $this->assertIsNumeric($price->calculateTotal(), "This value is not numeric");

        $price = new Price(0.04, 0, 900, 0.03);
        $this->assertEquals($price->calculateTotal(), 1579.5);
        $this->assertIsNumeric($price->calculateTotal(), "This value is not numeric");

        $price = new Price(0.04, 0.01, 900, 0.03);
        $this->assertEquals($price->calculateTotal(), 1566);
        $this->assertIsNumeric($price->calculateTotal(), "This value is not numeric");

        $price = new Price(0.02, 0.01, 900, 0.03);
        $this->assertEquals($price->calculateTotal(), 1539);
        $this->assertIsNumeric($price->calculateTotal(), "This value is not numeric");

        $price = new Price(0.02, 0, 900, 0.03);
        $this->assertEquals($price->calculateTotal(), 1552.5);
        $this->assertIsNumeric($price->calculateTotal(), "This value is not numeric");
    }

}

?>
