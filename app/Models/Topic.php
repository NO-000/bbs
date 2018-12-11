<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable = [
        'title', 'content', 'slug','category_id'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function scopeOrder($query, $request)
    {
        switch ($request->get('order')) {
            case 'newReplies':
                $query->updatedDesc();
                break;
            case 'newTopics':
                $query->cteatedDesc();
                break;
            default:
                $query->updatedDesc();
        }

        return $query;
    }

    public function scopeCteatedDesc($query)
    {
        return $query->orderBy('id', 'desc');
    }

    public function scopeUpdatedDesc($query)
    {
        return $query->orderBy('updated_at', 'desc');
    }


}
