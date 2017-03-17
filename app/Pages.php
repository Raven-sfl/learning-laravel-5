<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;

class Pages extends Model
{
    protected $fillable =
        [
            'title',
            'content',
            'published_at',
            'slug',
            'user_id',
            'meta_title',
            'meta_description',
            'meta_keywords',
            'published'
        ];

    public function setPublishedAtAttribute($date)
    {
        if (Input::get('published_at') >= Carbon::now()) {
            $this->attributes['published_at'] = Carbon::parse($date);
        } else {
            $this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date);
        }
    }

    public function scopePublished($query)
    {
        $query->where('published_at', '<=', Carbon::now());
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
