<?php

namespace App\Infrastructure\Messaging;

class EventDispatcher
{
    public function dispatch($event): void
    {
        // Implement dispatching event to message broker
        // For simplicity, just log the event
        $eventName = $this->resolveEventName($event);

        \Log::info('Event dispatched: ' . $eventName, $event->getUserData());
    }
    private function resolveEventName($event): string
    {
        return class_basename($event);
    }
}
