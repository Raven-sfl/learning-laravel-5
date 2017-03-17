<?php

namespace App\Http\Controllers\frontend;

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

class ArticlesController extends Controller
{


    public function index()
    {
        $articles = Article::latest('published_at')->published()->get();
//        $articles = Article::latest('published_at')->published()->paginate(2);

        return view('articles.index', compact('articles'));
    }

    public function show(Article $articles)
    {
        //dd(compact('articles'));
        return view('articles.show', compact('articles'));
    }
}

