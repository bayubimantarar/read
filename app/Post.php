<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'body',
        'image'
    ];
    
    public function user()
    {
        return $this
            ->belongsTo('\App\User');
    }

    /**
     * Get the user's first name.
     *
     * @param  string  $value
     * @return string
     */
    public function getPublishedAttribute($value)
    {
        return $this
            ->created_at
            ->formatLocalized('%d %B %Y');
    }
}
