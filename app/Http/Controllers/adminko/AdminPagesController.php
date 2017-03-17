<?php

namespace App\Http\Controllers\adminko;

use App\Http\Controllers\Controller;
use App\Http\Requests\PagesRequest;
use App\Pages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminPagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pages = Pages::latest('published_at')->get();
        return view('adminko.pages.index', compact('pages'));
    }

    public function create()
    {
        return view('adminko.pages.create');
    }

    public function store(PagesRequest $request)
    {
        //dd($request->slug);
        if (empty($request->slug)) {
            $_REQUEST['slug'] = str_slug($request->title);
            Auth::user()->pages()->create($_REQUEST);
        } else {
            Auth::user()->pages()->create($request->all());
        }
//        dd($request->all());


        //\Session::flash('flash_message', 'Ваша статья была сохранена');
        return redirect('/adminko/pages');
    }

    public function edit(Pages $pages)
    {

        return view('adminko.pages.edit', compact('pages'));
    }

    public function update(Pages $pages, PagesRequest $request)
    {
//        $pages->slug = str_slug($request->title);
//        dd($pages);

        if (empty($request->slug)) {
            $slug = str_slug($request->title);
            //$pages->slug = str_slug($request->title);
            //dd($pages);
            $pages->update($request->except('slug'));
            $pages['slug'] = $slug;
//            dd($pages);
            $pages->update();
        } else {
            //dd('1');
            $pages->update($request->all());
        }
        // $pages->update($request->all());


        return redirect('/adminko/pages');
    }


    public function destroy(Pages $pages)
    {
        //$article=Article::find($id);
        redirect('adminko/pages');
        $pages->delete();
        return back()->with('message', "Страница " . $pages->slug . " удалена.");

    }


}
