<?php

use PHPUnit\Framework\TestCase;

final class QuoteFormTest extends TestCase
{
    
    public function testInputs(): void
    {
        $_POST["gallons"] = (mt_rand(0, 999999) / 10);
        $_POST["datepicker"] = "2022-09-04";
        require_once "QuoteForm.php";

        $this->assertNotNull($address);
        $this->assertNotNull($date);
        $this->assertEquals($date, "2022-09-04");

        $this->assertGreaterThan(0, $gallonPrice);
        $this->assertGreaterThan(0, $gal);
        $this->assertEquals($gal, $_POST["gallons"]);
        $this->assertGreaterThan(0, $total);
    
    }




}

?>