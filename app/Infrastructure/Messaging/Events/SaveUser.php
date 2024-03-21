<?php

namespace App\Infrastructure\Messaging\Events;

class SaveUser
{
    private array $userData;

    public function __construct(array $userData)
    {
        $this->userData = $userData;
    }

    public function getUserData(): array
    {
        return $this->userData;
    }
}
