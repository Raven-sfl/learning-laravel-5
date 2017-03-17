<?php

namespace App\Http\Controllers\frontend;

use App\Pages;
use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;
use App\Helpers\RatesContract;
use App\Object;

use App\Http\Requests;

class PagesController extends Controller
{
    public function show($slug)
    {
        $content = DB::table('pages')
            ->where('slug', '=', $slug)
            ->get();
        //dd(compact('content'));
        return view('pages\page', compact('content'));
    }

    public function index()
    {
        $actions = Object::with('gallery')->published()->where('action', 1)->orderBy('updated_at', 'desc')->take(6)->get();
//        dd($actions[0]->gallery[0]->gallery_img);
        return view('pages.index', compact('actions'));
    }

    public function rate(RatesContract $rates)
    {
        $rate = $rates->getRate();

        dd($rate);
    }
}
