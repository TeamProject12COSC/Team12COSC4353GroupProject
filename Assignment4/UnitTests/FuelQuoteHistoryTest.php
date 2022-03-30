<?php 

use PHPUnit\Framework\TestCase;

final class FuelQuoteHistoryTest extends TestCase
{
    
    public function testhistory(): void
    {
        require_once 'vendor/autoload.php';
        $faker = Faker\Factory::create();
    $arrayGal = array();
    $arrayTotal = array();
    $arrayDate = array();
    $gallonPrice =  $faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 10);

    $loopNum = $faker->numberBetween(0, 100);
    for ($i = 0; $i < $loopNum; $i++)
    {
        $value =  $faker->randomFloat($nbMaxDecimals = 0, $min = 1, $max = 10000000);
        $arrayGal[] = $value;
        $arrayTotal[] = $gallonPrice * $value;
        $arrayDate[] = $faker->date($format = 'm-d-Y');
    }

    $address = $faker->address;

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
