<?php

namespace App\Application\Services;

use App\Domain\Repositories\UserRepository;
use App\Domain\Entities\User;
use App\Infrastructure\Messaging\EventDispatcher;
use App\Infrastructure\Messaging\Events\SaveUser;

class UserService
{
    private UserRepository $userRepository;
    private EventDispatcher $eventDispatcher;

    public function __construct(UserRepository $userRepository, EventDispatcher $eventDispatcher)
    {
        $this->userRepository = $userRepository;
        $this->eventDispatcher = $eventDispatcher;
    }

    public function createUser(string $email, string $firstName, string $lastName): void
    {
        $user = new User($email, $firstName, $lastName);
        
        // Save user
        $this->userRepository->save($user);

        // Dispatch event user.created
        $this->eventDispatcher->dispatch(new SaveUser([
            'email' => $user->getEmail(),
            'firstName' => $user->getFirstName(),
            'lastName' => $user->getLastName(),
        ]));
    }
}
