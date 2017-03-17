<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('objects', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('base_id'); // id из базы ялта сити
            $table->tinyInteger('type'); //тип недвижимости
            $table->integer('user_id')->unsigned();
            $table->string('meta_title'); //Тайтл в заголовке
            $table->text('meta_description'); //description
            $table->string('meta_keywords'); // keywords
            $table->string('title'); //Заголовок
            $table->string('address'); //адрес
            $table->string('map_coordinates'); //координаты на карте
            $table->string('map_zoom'); //масштаб на карте
            $table->string('map_center'); //центр на карте
            $table->integer('distance_to_city'); //расстояние до ялты для большой ялты
            $table->integer('price');
            $table->text('body'); //описание
            $table->string('slug')->nullable();
            $table->boolean('published');
            $table->integer('floors')->nullable(); //Этажи
            $table->integer('floor')->nullable(); //Этаж
            $table->integer('full_area')->nullable(); //площадь общая
            $table->integer('living_area')->nullable(); //площадь жилая
            $table->integer('land_area')->nullable(); //площадь участка
            $table->integer('min_area')->nullable(); //площадь минимальная
            $table->integer('max_area')->nullable(); //площадь максимальная
            $table->string('view')->nullable(); //вид
            $table->integer('to_sea')->nullable(); //до моря
            $table->string('land_appointment')->nullable(); //назначение участка
            $table->string('ownership_type')->nullable(); //форма собственности
            $table->integer('min_price_m2')->nullable(); //Мин. цена за 1 м2
            $table->date('builded')->nullable(); //дата постройки
            $table->integer('rooms')->nullable(); //комнат
            $table->integer('bedrooms')->nullable(); //спален
            $table->integer('toilets')->nullable(); //санузлов
            $table->string('flat_type')->nullable(); //тип квартиры
            $table->integer('potolok')->nullable(); //высота потолков
            $table->string('heating')->nullable(); //отопление
            $table->string('hot_water')->nullable(); //горячая вода
            $table->string('gas')->nullable(); //газ
            $table->string('condition')->nullable(); //состояние
            $table->string('gallery_img')->nullable(); //ссылка на файл галереи
            $table->string('gallery_alt')->nullable(); //альт изображения галереи
            $table->string('gallery_title')->nullable(); //тайтл изображения галереи
            $table->timestamp('published_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('objects');
    }

}
