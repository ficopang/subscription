<?php

namespace App\Listeners;

use App\Jobs\SendPostEmailJob;
use App\Models\SentPost;
use App\Models\Website;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendNewPostEmails
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        $websites = Website::with('posts', 'subscribers')->get();

        foreach ($websites as $website) {
            // check all websites
            foreach ($website->posts as $post) {
                foreach ($website->subscribers as $subscriber) {
                    if (!SentPost::where('user_id', $subscriber->id)->where('post_id', $post->id)->exists()) {
                        // Send email
                        SendPostEmailJob::dispatch($subscriber, $post);
                    }
                }
            }
        }
    }
}
