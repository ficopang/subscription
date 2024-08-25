<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Models\User;
use App\Models\Website;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

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

    /**
     * Display the specified resource.
     */
    public function show(Subscription $subscription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subscription $subscription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subscription $subscription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subscription $subscription)
    {
        //
    }
}
