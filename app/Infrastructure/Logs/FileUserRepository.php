<?php

namespace App\Infrastructure\Logs;

use App\Domain\Entities\User;
use App\Domain\Repositories\UserRepository;
use Illuminate\Support\Facades\Log;

class FileUserRepository implements UserRepository
{
    public function save(User $user): void
    {
        // Save user data to log file
        Log::info('User created', [
            'email' => $user->getEmail(),
            'firstName' => $user->getFirstName(),
            'lastName' => $user->getLastName(),
        ]);
    }
}
