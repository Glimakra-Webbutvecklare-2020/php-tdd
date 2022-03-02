<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Henry\PhpUnitTestExample\UserAccount;


// Requirements:
// An user account can be created from a valid email string and password [OK]
// An user account can NOT be created from a invalid email string [OK]
// A user account password should be over 8 characters long [OK]
// A user account password should include letters, numbers and special characters
// A valid user account should be able to login
// A logged in user should be able to log out


class UserAccountTest extends TestCase
{   
    // private $invalidPasswordByLength = "pd1!@";
    // private $invalidPasswordByLetter = "11111111111111";
    // private $invalidPasswordByNumber = "password$$";
    // private $invalidPasswordBySpecialChar = "password1123";

    public function testCanBeCreatedFromValidEmailAddressAndPassword(): void
    {
        $this->assertInstanceOf(
            UserAccount::class,
            UserAccount::init('user@example.com', "passw0rd123123!@")
        );
    }

    public function testCanNotBeCreatedFromInvalidEmailString(): void {
        $this->expectException(InvalidArgumentException::class);

        UserAccount::init('invalid', "passw0rd123123!@");
    }

    public function testUserPasswordMustBeOver8Characters(): void {
        $this->expectException(InvalidArgumentException::class);

        UserAccount::init('user@example.com', "2short@");
    }

    public function testUserPasswordMustIncludeLettersNumberAndSpecialCharacters(): void {
        $this->expectException(InvalidArgumentException::class);
        UserAccount::init('user@example.com', "longpasswordwithoutnumbers");

    }
}

