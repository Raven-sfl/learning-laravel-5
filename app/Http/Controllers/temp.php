<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class temp extends Controller
{
    public function setCookie(Request $request)
    {

        if ($request->ajax()) {

            $id = $request->input('id');
            $minutes = 89000;
            $response = new Response($id);
            $response->withCookie(cookie('currency', $id, $minutes));
            return $response;
        }


    }

    public function getCookie($id, Request $request)
    {

        $minutes = 89000;
        $response = new Response('set');
        $response->withCookie(cookie('currency', $id, $minutes));
        return $response;
    }
}
