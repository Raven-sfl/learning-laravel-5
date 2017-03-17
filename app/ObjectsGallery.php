<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class ObjectsGallery extends Model
{
    protected $table = 'objects_gallery';

    protected $fillable =
        [
            'id',
            'object_id',
            'gallery_img',
            'gallery_alt',
            'gallery_title',
        ];

    public function object()
    {
        return $this->belongsTo('App\object', 'id');
    }
}
