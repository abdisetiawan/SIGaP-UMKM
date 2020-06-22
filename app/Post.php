<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Post extends Model
{
    use Sluggable;
    //
    protected $dates = ['created_at'];
    protected $fillable = ['title','content','thumbnail','slug','admin_id'];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
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
