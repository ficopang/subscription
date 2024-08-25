<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Models\User;
use App\Models\Website;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Website $website)
    {
        $request->validate([
            'email' => 'required|email',
            'website_id' => 'required|exists:websites,id',
        ]);

        $user = User::firstOrCreate(['email' => $request->email]);
        if ($user->subscriptions()->where('website_id', $website->id)->exists()) {
            // already subscribed
            return response()->json(['message' => 'User is already subscribed to this website'], 409);
        }

        $user->subscriptions()->attach($website->id);

        return response()->json(['message' => 'Subscription created successfully'], 201);
    }
}
