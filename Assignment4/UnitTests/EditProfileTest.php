<?php
 
use PHPUnit\Framework\TestCase;
require_once 'vendor/autoload.php';

final class EditProfileTest extends TestCase
{
    public function testProfileClass(): void
    {
        $faker = Faker\Factory::create();
        $addressHolder = $faker->address;
        $dateHolder = $faker->date($format = 'Y-m-d');
        $_SESSION["username"] = "admin";
        require_once "EditProfile.php";

        $price = new EditProfile('admin');
        $price->create_entry('user', 'fname', 'lname', 'add1', 'add2', 'city', 'TX', '55555');
        $this->assertEquals($price->getFirstName(), 'fname');
        $this->assertEquals($price->getLastName(), 'lname');
        $this->assertEquals($price->getAddress1(), 'add1');
        $this->assertEquals($price->getAddress2(), 'add2');
        $this->assertEquals($price->getCity(), 'city');
        $this->assertEquals($price->getState(), 'TX');
        $this->assertEquals($price->getZipCode(), '55555');

        $price->isValid();

        $price->update();
    }
}

?>
