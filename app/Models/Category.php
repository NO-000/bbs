<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function topics(){
        $this->hasMany(Topic::class);
    }
}
