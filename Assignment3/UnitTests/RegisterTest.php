<?php

use PHPUnit\Framework\TestCase;

final class RegisterTest extends TestCase
{
    
    public function testregister(): void
    {
        $_POST['username'] = 'admin';
        $_POST['password'] = 'password';
        $_POST['submit'] = true;
        require_once "Register.php";

        $this->assertNotNull($username);
        $this->assertNotNull($password);
        $this->assertNotNull($cpassword);

        $this->assertNotNull($new);
        $this->assertTrue($new);
        // $this->assertEquals($password, $cpassword);
    }




}

?>