<?php

namespace Alhelwany\LaravelMtn\Channels;

use Alhelwany\LaravelMtn\Facades\MTNClient;
use Alhelwany\LaravelMtn\Interfaces\MTNNotifiable;
use Alhelwany\LaravelMtn\Interfaces\MTNNotification;

class MTNChannel
{
    /**
     * Send the given notification through an SMS using MTN
     */
    public function send(MTNNotifiable $notifiable, MTNNotification $notification): void
    {
        MTNClient::send($notification->toText(), $notification->getLang(), $notifiable->getPhone());
    }
}
