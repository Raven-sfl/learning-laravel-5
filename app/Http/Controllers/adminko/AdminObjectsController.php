<?php

namespace App\Http\Controllers\adminko;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Object;
use App\ObjectsGallery;
use App\Http\Requests\ObjectRequest;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;
use DebugBar\DebugBar;


/**
 * Типы недвижимости:
 * 1- дома
 * 2- участки
 * 3- новостройки
 * 4- коммерческая
 * 5- квартиры
 **/
class AdminObjectsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $objects = Object::get();
        return view('adminko.objects.index', compact('objects'));
    }

    public function index_type($type, Request $request)
    {
        $objects = Object::findOrNew('type')->where('type', $type)->get();
        return view('adminko.objects.index', compact('objects'), ['type' => $type]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($type)
    {


        return view('adminko.objects.create', ['type' => $type]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store($type, Request $request)
    {
        $root = $_SERVER['DOCUMENT_ROOT'] . "/files/img/objects/";
        $gall_img = []; // массив, который будет содержать ссылки на все картинки
        foreach ($request->file('gallery_img') as $file) //обрабатываем массив с файлами
        {
            if (empty($file)) continue; // если <input type="file"... есть, но туда ничего не загруженно, то пропускаем
            $f_name = str_random(28) . '.' . $file->getClientOriginalExtension(); //получаем имя файла
            //dd($f_name);
            $gall_img[] = '/files/img/objects/' . $f_name; //добавляем url картинки в массив
            $file->move($root, $f_name); //перемещаем файл в папку
            //dd($gall_img);
        }
        $type = $request->type;
        $object = Auth::user()->objects()->create($request->except('gallery_title', 'gallery_alt', 'gallery_img'));
        if (empty($gall_img)) {
            return back()->with('message', 'Объект сохранен');
        } //если нет ни одного параметра то просто редиректим обратно.
        foreach ($gall_img as $i => $coll_img) {
            $coll = new ObjectsGallery;
            $coll->object_id = $object->id;
            $coll->gallery_img = $coll_img;
            $coll->gallery_alt = $request->gallery_alt[$i];
            $coll->gallery_title = $request->gallery_title[$i];
            $coll->save();
        }
        //Session::flash('flash_message', 'Ваша статья была сохранена');
        return redirect('/adminko/objects/' . $type);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Object $object
     * @param $type
     * @return Response
     * @internal param int $id
     */
    public function edit($type, Object $objects)
    {
        $objects = Object::with('gallery')->findOrfail($objects->id);
        $type = $objects->type;
        //dd($objects);
        return view('adminko.objects.edit', compact('objects', 'type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $type
     * @param Object $objects
     * @param ObjectRequest $request
     * @return Response
     * @internal param int $id
     */
    public function update($type, Object $objects, ObjectRequest $request)
    {
        $root = $_SERVER['DOCUMENT_ROOT'] . "/files/img/objects/";
//        dd($objects);
//        dd($request);
        $objects->update($request->except('image_id', 'gallery_title', 'gallery_alt', 'gallery_img', 'stored_image_id', 'stored_gallery_title', 'stored_gallery_alt'));
        if (!empty($request->stored_image_id)) {
//            dd($request->stored_image_id);
            $count = 0;
            while ($count < count($request->stored_image_id)) {
//                $saved_images = DB::table('objects_gallery')
//                ->where('id','=',$request->stored_image_id[$count])
//                ->get();
//                dd($request->stored_image_id[$count]);
                $saved_images = ObjectsGallery::where('id', '=', $request->stored_image_id[$count])->firstOrFail();
                // dd($saved_images);
                $saved_images->gallery_alt = $request->stored_gallery_alt[$count];
                $saved_images->gallery_title = $request->stored_gallery_title[$count];
                //dd($saved_images);
                $saved_images->save();
                $count = $count + 1;
            }
        }
        foreach ($request->file('gallery_img') as $file) //обрабатываем массив с файлами
        {
            if (empty($file)) continue; // если <input type="file"... есть, но туда ничего не загруженно, то пропускаем
            $f_name = $file->getClientOriginalName(); //получаем имя файла
            $gall_img[] = '/files/img/objects/' . $f_name; //добавляем url картинки в массив
            $file->move($root, $f_name); //перемещаем файл в папку
            //dd($gall_img);
        }
        if (empty($gall_img)) {
            return back()->with('message', 'Объект сохранен');
        } //если нет ни одного параметра то просто редиректим обратно.
        //dd('123123123');
        foreach ($gall_img as $i => $coll_img) {
            $coll = new ObjectsGallery;
            $coll->object_id = $objects->id;
            $coll->gallery_img = $coll_img;
            $coll->gallery_alt = $request->gallery_alt[$i];
            $coll->gallery_title = $request->gallery_title[$i];
            //dd($coll);
            $coll->save();
        }

        //dd($objects);

        return redirect('/adminko/objects/' . $type);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($type, Object $objects)
    {
        redirect('adminko/objects' . $type);
        $objects->delete();
        return back()->with('message', "Объект " . $objects->title . " удален.");
    }


    public function del_object_image(Request $request)
    {

        if ($request->ajax()) {

            $image_id = $request->input("image_id");
            $item = ObjectsGallery::find($image_id);
            //return $item;
            $root = $_SERVER['DOCUMENT_ROOT']; //путь до картинок
            if (!empty($item)) //находим ключ, значение, которого соответствует ссылке на картинку
            {
                if (file_exists($root . $item->gallery_img)) //проверяем существование файла
                {
                    unlink(public_path($item->gallery_img));
                }
                DB::table('objects_gallery')->where('id', '=', $image_id)->delete();
            }

            $item->save(); //сохраняем изменения
            return "OK";
        }
    }

}
