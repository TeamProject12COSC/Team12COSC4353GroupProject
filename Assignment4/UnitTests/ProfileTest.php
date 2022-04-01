<?php
 
use PHPUnit\Framework\TestCase;
require_once 'vendor/autoload.php';

final class ProfileTest extends TestCase
{
    public function testValues(): void
    {
        $faker = Faker\Factory::create();
        $addressHolder = $faker->address;
        $dateHolder = $faker->date($format = 'Y-m-d');
        $_SESSION["username"] = "admin";
        require_once "Profile.php";

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
