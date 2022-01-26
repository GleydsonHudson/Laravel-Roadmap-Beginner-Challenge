<?php

namespace App\Listeners;


use App\BlogLaravel;
use App\Events\PostViewed;
use App\Models\Post;

class CaptureVisit {

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
     * A visit is captured when a user loads a post for the first time in a given
     * day. The post ID and the IP of the request are both stored in session to
     * be validated against until pruned by the Session middleware class.
     *
     * @param PostViewed $event
     * @return void
     */
    public function handle(PostViewed $event): void
    {
        $ip = request()->getClientIp();

        if ($this->visitIsUnique($event->post, $ip))
        {
            $data = [
                'post_id' => $event->post->id,
                'ip'      => $ip,
                'agent'   => request()->header('user_agent'),
                'referer' => BlogLaravel::parseReferer(request()->header('referer')),
            ];

            $event->post->visits()->create($data);

            $this->storeInSession($event->post, $ip);
        }
    }

    /**
     * Check if a given post and IP are unique to the session.
     *
     * @param Post $post
     * @param string $ip
     * @return bool
     */
    private function visitIsUnique(Post $post, string $ip): bool
    {
        $visits = session()->get('visited_posts', []);

        if (array_key_exists($post->id, $visits))
        {
            $visit = $visits[$post->id];

            return $visit['ip'] != $ip;
        }

        return true;
    }


    /**
     * Add a given post and IP to the session.
     *
     * @param Post $post
     * @param string $ip
     * @return void
     */
    private function storeInSession(Post $post, string $ip): void
    {
        session()->put("visited_posts.{$post->id}", [
            'timestamp' => now()->timestamp,
            'ip'        => $ip,
        ]);
    }
}
