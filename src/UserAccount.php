<?php declare(strict_types=1);

namespace Henry\PhpUnitTestExample;

final class UserAccount {
    private $email;
    private $password;

    private function __construct(string $email, string $password)
    {
        $this->email = $email;
        $this->password = $password;
    }
}