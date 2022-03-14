<?php

use PHPUnit\Framework\TestCase;
require_once 'vendor/autoload.php';
 
final class SignupTest extends TestCase
{
    public function testValue(): void
    {
        $faker = Faker\Factory::create();
        $addressHolder = $faker->address;
        $dateHolder = $faker->date($format = 'Y-m-d');

        $_POST['submit'] = true;

        $_POST["First Name"] = $faker->name();
        $_POST["Last Name"] = $faker->name();
        $_POST["Address 1"] = $faker->address();
        $_POST["Address 2"] = $faker->address();
        $_POST["City"] = $faker->city();
        $_POST["State"] = $faker->stateAbbr();
        $_POST["Zipcode"] = $faker->postcode();
        require_once "Signup.php";

        $this->assertNotNull($firstName);
        $this->assertNotNull($lastName);
        $this->assertNotNull($address1);
        //$this->assertNotNull($address2);
        $this->assertNotNull($city);
        $this->assertNotNull($state);
        $this->assertNotNull($zipCode);

    }
}

?>
