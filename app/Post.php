<?php

namespace App;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Sluggable;
    protected $fillable = [
        'title',
        'description',
        'user_id',
    ];
public function user()
{
    // return $this->belongsTo('App\User');
    return $this->belongsTo(User::class);
}
public function sluggable()
{
    return [
        'slug' => [ //col name
            'source' => 'title'
        ]
    ];
}
}
