<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;

class Article extends Model
{
    protected $fillable =
        [
            'title',
            'body',
            'published_at',
            'slug',
            'excerpt',
            'user_id',
            'is_manager',
            'meta_title',
            'meta_description',
            'meta_keywords',
            'published',
            'preview_img'

        ];

    protected $dates = ['published_at'];


    public function setPublishedAtAttribute($date)
    {
        if (Input::get('published_at') >= Carbon::now()) {
            $this->attributes['published_at'] = Carbon::parse($date);
        } else {
            $this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date);
        }
    }

//    public function scopePublished($query)
//    {
//        $query->where ('published_at', '<=', Carbon::now());
//    }
    public function scopePublished($query)
    {
        $query->where('published', '=', '1', 'and', 'published_at', '>', Carbon::now());
    }

    public function scopeUnpublished($query)
    {
        $query->where('published_at', '>', Carbon::now());
    }


    public function user()
    {
        return $this->belongsTo('App\user', 'id', 'is_manager');
    }
}