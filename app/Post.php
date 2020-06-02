<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Post extends Model
{
    use Sluggable;
    //
    protected $dates = ['created_at'];
    protected $fillable = ['title','content','thumbnail','slug','user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function thumbnail()
    {
        return !$this->thumbnail ? asset('ansos.jpg') : $this->thumbnail;
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
