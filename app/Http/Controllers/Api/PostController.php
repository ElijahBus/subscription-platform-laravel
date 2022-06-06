<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Services\PostService;
use Illuminate\Http\JsonResponse;

class PostController extends Controller
{
    public function store(StorePostRequest $request, PostService $postService): JsonResponse
    {
        $validatedPostRequest = $request->validated();
        $createdPost = $postService->createPost($validatedPostRequest);

        return response()->json([
            'success' => true,
            'message' => "Post successfully created.",
            'data' => $createdPost
        ]);
    }
}
