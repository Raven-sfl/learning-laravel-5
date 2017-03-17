<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Object extends Model
{
    protected $fillable =
        [
            'base_id',  // id из базы ялта сити
            'type',  //тип недвижимости
            'user_id',
            'meta_title',  //Тайтл в заголовке
            'meta_description',  //description
            'meta_keywords',  // keywords
            'title',  //Заголовок
            'address',  //адрес
            'map_coordinates',  //координаты на карте
            'map_zoom',  //масштаб на карте
            'map_center',  //центр на карте
            'distance_to_city',  //расстояние до ялты для большой ялты
            'price',
            'currency',
            'body',
            'slug',
            'published',
            'floors',  //Этажи
            'floor',  //Этаж
            'full_area',  //площадь общая
            'living_area',  //площадь жилая
            'land_area',  //площадь участка
            'min_area',  //площадь минимальная
            'max_area',  //площадь максимальная
            'view',  //вид
            'to_sea',  //до моря
            'land_appointment',  //назначение участка
            'ownership_type',  //форма собственности
            'min_price_m2',  //Мин. цена за 1 м2
            'builded',  //дата постройки
            'rooms',  //комнат
            'bedrooms',  //спален
            'toilets',  //санузлов
            'flat_type',  //тип квартиры
            'potolok',  //высота потолков
            'heating',  //отопление
            'hot_water',  //горячая вода
            'gas',  //газ
            'condition',  //состояние
            'gallery_title',
            'gallery_alt',
            'gallery_img',
            'action',
            'currency',


        ];

    protected $dates = ['published_at'];

    public function user()
    {
        return $this->belongsTo('App\user', 'id', 'is_manager');
    }

    public function gallery()
    {
        return $this->hasMany('App\ObjectsGallery');
    }

    public function scopePublished($query)
    {
        $query->where('published', '=', '1');
    }

}
