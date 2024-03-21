<?php

namespace App\Infrastructure\EventHandling;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Infrastructure\Messaging\Events\SaveUser;

use App\Infrastructure\Logs\FileUserRepository;

class SaveUserListener implements ShouldQueue
{
    use InteractsWithQueue;

    private FileUserRepository $fileUserRepository;

    public function __construct(FileUserRepository $fileUserRepository)
    {
        $this->fileUserRepository = $fileUserRepository;
    }

    public function handle(SaveUser $event): void
    {
        $userData = $event->data;

        // Log user data
        \Log::info('Save User event received', $userData);

        // Save user data to log file
        $this->fileUserRepository->save(new \App\Domain\Entities\User(
            $userData['email'],
            $userData['firstName'],
            $userData['lastName']
        ));
    }
}
