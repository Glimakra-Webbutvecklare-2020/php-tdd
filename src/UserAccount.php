<?php declare(strict_types=1);

namespace Henry\PhpUnitTestExample;

final class UserAccount {
    private $email;
    private $password;

    private function __construct(string $email, string $password)
    {
        $this->ensureIsValidEmail($email);
        $this->ensureIsValidPassword($password);

        $this->email = $email;
        $this->password = $password;
    }

    public static function init(string $email, string $password) {
        return new self($email, $password);
    }

    private function ensureIsValidEmail(string $email): void
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException(
                sprintf(
                    '"%s" is not a valid email address',
                    $email
                )
            );
        }
    }

    private function ensureIsValidPassword(string $password): void
    {
        if (strlen($password) <= 8 || preg_match("#^[a-zA-Z0-9]+$#", $password)) {
            throw new \InvalidArgumentException(
                sprintf(
                    '"%s" is not a valid password length, or needs numbers, or needs special characters',
                    $password
                )
            );
        }
    }
}