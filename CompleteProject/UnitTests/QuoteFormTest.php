<?php

use PHPUnit\Framework\TestCase;
require_once 'vendor/autoload.php';

final class QuoteFormTest extends TestCase 
{
    public function testInputs(): void
    {
        $faker = Faker\Factory::create();
        $state;
        $addressHolder = $faker->address;
        $_SESSION["username"] = "admin";
        $dateHolder = $faker->date($format = 'Y-m-d');
        $_POST["submit"] = true;
        $_POST["gallons"] = $faker->randomFloat($nbMaxDecimals = 0, $min = 1, $max = 10000000);
        $_POST["datepicker"] = $dateHolder;
        $_POST["deliveryaddress"] = $addressHolder;
        $_POST["suggestedprice"] = $faker->randomFloat($nbMaxDecimals = 0, $min = 1, $max = 10000000);
        $_POST["total"] = $faker->randomFloat($nbMaxDecimals = 0, $min = 1, $max = 10000000);
        require_once "QuoteForm.php";

        $this->assertNotNull($addressHolder);
        $this->assertNotNull($deliveryAddress);
        $this->assertNotNull($suggestedPrice);
        $this->assertNotNull($totalPrice);
        $this->assertNotNull($dateHolder);
        $this->assertNotNull($date);

        $this->assertEquals($dateHolder, $_POST["datepicker"]);
        $this->assertEquals($addressHolder, $_POST["deliveryaddress"]);
        $this->assertEquals($gal, $_POST["gallons"]);
        $this->assertEquals($gallonPrice * $gal, $total);

        $this->assertGreaterThan(0, $gallonPrice);
        $this->assertGreaterThan(0, $gal);

        $this->assertIsFloat($gal, "Value is not a float");
        $this->assertIsFloat($suggestedPrice, "value is not a float");
        $this->assertIsFloat($totalPrice, "value is not a float");

    }
}

?>
