<?php

namespace App\Observers;

use App\Models\Topic;

class TopicObserver
{
    public function saving(Topic $topic)
    {
        $topic->content = clean($topic->content, 'user_topic_content');

        $topic->slug = '1';
    }
}
