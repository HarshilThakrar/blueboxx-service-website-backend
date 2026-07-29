<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsletterRequest;
use App\Models\NewsletterSubscriber;
use Illuminate\Http\JsonResponse;

class NewsletterController extends Controller
{
    public function store(NewsletterRequest $request): JsonResponse
    {
        NewsletterSubscriber::create($request->validated());

        return response()->json([
            'message' => 'Successfully subscribed to the newsletter!',
        ], 201);
    }
}
