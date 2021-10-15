<?php
namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Admin;

class AdminTest extends TestCase
{
    public function testSetPasswordReturnsTrueWhenPasswordSuccessfullySet()
    {
        $details = [];

        $admin = new Admin($details);
    }

public function testSetPasswordReturnsTrueWhenPasswordSuccessfullySet()
{
    $details = [];

    $admin = new Admin($details);

    $password = 'fubar';

    $result = $admin->setPassword($password);
}
public function testGetAdminReturnsAdminWithExpectedValues()
{
    $details = [];

    $admin = new Admin($details);

    $password = 'fubar';

    $admin->setPassword($password);

    $expectedPasswordResult = '5185e8b8fd8a71fc80545e144f91faf2';

    $currentAdmin = $admin->getAdmin();

    $this->assertEquals($expectedPasswordResult, $currentAdmin['password']);
}
}