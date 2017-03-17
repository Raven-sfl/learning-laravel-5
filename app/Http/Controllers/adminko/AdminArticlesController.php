<?php

namespace App\Http\Controllers\adminko;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;
use Auth;
use App\Http\Requests\ArticleRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Image;
use Illuminate\Support\Facades\Input;

class AdminArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $articles = Article::latest('published_at')->get();
        return view('adminko.articles.index', compact('articles'));
    }

    public function create()
    {
        return view('adminko.articles.create');
    }

    public function store(ArticleRequest $request)
    {
        if ($request->hasFile('preview_img')) {
            $random_name = str_random(28);
            $request->file('preview_img')->move(public_path('/files/img/articles'), $random_name . '.' . $request->file('preview_img')->getClientOriginalExtension());
            $_REQUEST['preview_img'] = '/files/img/articles' . $random_name . '.' . $request->file('preview_img')->getClientOriginalExtension();
            Auth::user()->articles()->create($_REQUEST);
        } else {
            Auth::user()->articles()->create($request->all());
        }

        //\Session::flash('flash_message', 'Ваша статья была сохранена');
        return redirect('/adminko/articles');
    }

    public function edit(Article $articles)
    {

        return view('adminko.articles.edit', compact('articles'));
    }

    public function update(Article $articles, ArticleRequest $request)
    {
        //$article = Article::findOrfail($id);
        if ($request->hasFile('preview_img')) {
            $request->file('preview_img')->move(public_path('/files/img'), time() . '.' . $request->file('preview_img')->getClientOriginalExtension());
            $img = '/files/img/' . time() . '.' . $request->file('preview_img')->getClientOriginalExtension();
            $articles->update($request->all());
            $articles['preview_img'] = $img;
            $articles->update();
        } else {
            $articles->update($request->all());
        }

        return redirect('/adminko/articles');
    }


    public function destroy(Article $articles)
    {
        //$article=Article::find($id);
        redirect('adminko/articles');
        $articles->delete();
        return back()->with('message', "статья " . $articles->title . " удалена.");

    }

    public function del_image(Request $request)
    {
        if ($request->ajax()) {
            $src = $request->input("src");
            //dd($src,public_path($src));
            $id = $request->input("item_id");
            //dd($request->input("item_id"));
            $article = Article::find($id);
            //dd($article);
            //unlink($src); //удаляем файл
            unlink(public_path($src));
            //Storage::delete(public_path($src));
            $article->preview_img = ''; //обновляем значение в поле preview
            $article->update(); //сохраняем изменения
            return "OK";


        }
    }
}

