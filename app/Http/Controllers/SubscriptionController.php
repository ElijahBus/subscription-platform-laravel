<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscriptionRequest;
use App\Services\SubscriptionService;
use Illuminate\Http\JsonResponse;

class SubscriptionController extends Controller
{
    public function subscribe(SubscriptionRequest $request, SubscriptionService $subscriptionService, $websiteId): JsonResponse
    {
        $userId = $request->user_id;

        $subscriptionService->subscribeUserToWebsite($userId, $websiteId);

        return response()->json([
            'success' => true,
            'message' => "Subscription added."
        ]);
    }

}
