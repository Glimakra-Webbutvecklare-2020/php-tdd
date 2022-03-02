<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Henry\PhpUnitTestExample\UserAccount;


// Requirements:
// An user account can be created from a valid email string and password
// An user account can NOT be created from a invalid email string
// A user account password should be over 8 characters long and have letters, numbers and special characters
// A valid user account should be able to login
// A logged in user should be able to log out


class UserAccountTest extends TestCase
{
    public function testCanBeCreatedFromValidEmailAddressAndPassword(): void
    {
        $this->assertInstanceOf(
            UserAccount::class,
            UserAccount::fromString('user@example.com', "passw0rd")
        );
    }
}

