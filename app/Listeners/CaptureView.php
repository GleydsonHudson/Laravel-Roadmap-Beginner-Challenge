<?php

namespace App\Listeners;


use App\BlogLaravel;
use App\Events\PostViewed;
use App\Models\Post;

class CaptureView {

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * A view is captured when a user loads a post for the first time in a given
     * hour. The ID of the post is stored in session to be validated against
     * until it "expires" and is pruned by the Session middleware class.
     *
     * @param PostViewed $event
     * @return void
     */
    public function handle(PostViewed $event): void
    {
        if ( ! $this->wasRecentlyViewed($event->post))
        {
            $data = [
                'post_id' => $event->post->id,
                'ip'      => request()->getClientIp(),
                'agent'   => request()->header('user_agent'),
                'referer' => BlogLaravel::parseReferer(request()->header('referer')),
            ];

            $event->post->views()->create($data);

            $this->storeInSession($event->post);
        }
    }

    /**
     * Check if a given post exists in the session.
     *
     * @param Post $post
     * @return bool
     */
    private function wasRecentlyViewed(Post $post): bool
    {
        $viewed = session()->get('viewed_posts', []);

        return array_key_exists($post->id, $viewed);

    }

    /**
     * Add a given post to the session.
     *
     * @param Post $post
     * @return void
     */
    private function storeInSession(Post $post): void
    {
        session()->put("viewed_posts.{$post->id}", now()->timestamp);
    }
}
