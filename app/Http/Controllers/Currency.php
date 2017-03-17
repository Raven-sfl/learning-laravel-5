<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App;
use Response;

class Currency extends Controller
{
    public function setCurrency(Request $request)
    {

        if ($request->ajax()) {

            $id = $request->input('id');
//            dd($id);
            Session::put('currency', (int)$id);
            return "OK";
        }


    }

    public function getCurrency($id, Request $request)
    {


        Session::put('currency', $id);
//        dd(\Illuminate\Support\Facades\Session::get('currency'));
//        $response = new Response('set');
        $content = $id;
//        dd($response);
        return \Illuminate\Support\Facades\Session::all();
    }
}
