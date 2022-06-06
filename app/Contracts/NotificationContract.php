<?php

namespace App\Contracts;

interface NotificationContract
{
    public function sendNotification($receivers);
}
