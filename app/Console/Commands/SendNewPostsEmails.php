<?php

namespace App\Console\Commands;

use App\Jobs\SendPostEmailJob;
use App\Models\SentPost;
use App\Models\Website;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendNewPostsEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'emails:send-new-posts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send emails for new posts to subscribers';

    /**
     * Execute the console command.
     */
    public function handle(): void
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

        $this->info('Emails for new posts have been queued for sending.');
    }
}
