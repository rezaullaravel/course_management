<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id')->withDefault();
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
