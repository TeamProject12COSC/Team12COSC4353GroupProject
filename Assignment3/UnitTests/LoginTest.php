<?php

use PHPUnit\Framework\TestCase;

final class LoginTest extends TestCase
{ 
    
    public function testlogin(): void
    {

        $_POST['username'] = 'admin';
        $_POST['password'] = 'password';
        $_POST['submit'] = true;

        require_once "Login.php";

        $this->assertNotNull($username);
        $this->assertNotNull($password);
        $this->assertNotNull($new);

        $this->assertEquals($username, $_POST['username']);
        $this->assertEquals($password, $_POST['password']);
    
    }

}

?>
