<?php

namespace App\Services;

use App\Models\User;
use App\Models\Website;

class SubscriptionService
{
    public function subscribeUserToWebsite(int $userId, int $websiteId)
    {
        $user = User::find($userId);
        $website = Website::find($websiteId);

        $user->websites()->attach($website);
    }
}
