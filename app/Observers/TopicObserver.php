<?php

namespace App\Observers;

use App\Models\Topic;
use App\Handlers\SlugTranslateHandler;
use App\Jobs\TranslateSlug;
class TopicObserver
{
    public function saving(Topic $topic)
    {
        $topic->content = clean($topic->content, 'user_topic_content');


    }

    public function saved(Topic $topic)
    {
        // 如 slug 字段无内容，即使用翻译器对 title 进行翻译
        if (!$topic->slug) {
             // 推送任务到队列
             dispatch(new TranslateSlug($topic));
        }
    }
}
