<?php

namespace App\Http\Controllers\frontend;

use App\currency;
use App\Helpers\RatesController;
use Illuminate\Http\Request;
use App\Object;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Helpers\RatesContract;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Collection;
use DB;


class ObjectsController extends Controller
{

    /**
     * ObjectsController constructor.
     * @param RatesContract $rates
     */
    protected $rate;

    public function __construct(RatesContract $rates)
    {
        $rate = $rates->getRate();
        $this->rate = $rate;
    }

    protected function currencyExchange($objects)
    {
        $currency = \Illuminate\Support\Facades\Session::get('currency');
        $rate = $this->rate->all();
        foreach ($objects as $object)
            if ($object->currency != (int)$currency) {
                $cross_curs = round($rate[0]->EUR / $rate[0]->USD, 2);
                if ($object->currency == 1 and (int)$currency == 2) {
                    $object->price = round($object->price / $rate[0]->USD);
                    $object->currency = 2;
                } elseif ($object->currency == 1 and (int)$currency == 3) {
                    $object->price = round($object->price / $rate[0]->EUR);
                    $object->currency = 3;
                } elseif ($object->currency == 2 and (int)$currency == 1) {
                    $object->price = round($object->price * $rate[0]->USD);
                    $object->currency = 1;
                } elseif ($object->currency == 2 and (int)$currency == 3) {
                    $object->price = round($object->price / $cross_curs);
                    $object->currency = 3;
                } elseif ($object->currency == 3 and (int)$currency == 1) {
                    $object->price = round($object->price * $rate[0]->EUR);
                    $object->currency = 1;
                } elseif ($object->currency == 3 and (int)$currency == 2) {
                    $object->price = round($object->price * $cross_curs);
                    $object->currency = 3;
                }
            }
        return $objects;
    }


    public function index_type($type, $rooms)
    {
        $input_sort = Input::get('sort');
        if ($rooms == null) {
            $objects = Object::with('gallery')->where('type', $type)->paginate(20);
        } else {
            $rooms = mb_substr($rooms, 5, 5);
            $objects = Object::with('gallery')->where('type', $type)->where('rooms', $rooms)->paginate(20);
        }
        $links = $objects->appends(['sort' => $input_sort])->links();
        $objects = $this->currencyExchange($objects);
        if ($input_sort == 'priceDown') {
            $objects = $objects->sortByDesc('price');
        } elseif ($input_sort == 'priceUp') {
            $objects = $objects->sortBy('price');
        } else {
            $objects = $objects->sortBy('created_at');
        }
        $objects->values()->all();
        return view('objects.index', compact('objects', 'links'), ['type' => $type, 'sort' => $input_sort]);
    }

    public function show($type, $rooms, $id)
    {
        if ($rooms == null) {
            $objects = Object::with('gallery')->where('base_id', $id)->published()->get();
        } else {
            $rooms = mb_substr($rooms, 5, 5);
            $objects = Object::with('gallery')->where('base_id', $id)->where('rooms', $rooms)->published()->get();
        }
        if (isset($objects[0])) {
            $objects = $this->currencyExchange($objects);
            return view('objects.show', compact('objects'), ['type' => $type]);
        } else {
            return redirect('/objects/' . $type);
        }
    }

    public function searchId(Request $request)
    {
        $objects = Object::with('gallery')->where('base_id', $request->id)->published()->get();
        return view('objects.search', compact('objects'), ['id' => $request->id]);
    }

    public function filter(Request $request)
    {

        $input_sort = Input::get('sort');
        $type = $request->query->get('type');
        $currency = \Illuminate\Support\Facades\Session::get('currency');
        $rate = $this->rate->all();
        $cross_curs = round($rate[0]->EUR / $rate[0]->USD, 2);
        if ($currency == 1) {
             $min_price_rub = (int)$request->query->get('pd');
             $min_price_usd = $request->query->get('pd') / $rate[0]->USD;
             $min_price_eur = $request->query->get('pd') / $rate[0]->EUR;
             $max_price_rub = (int)$request->query->get('pu');
             $max_price_usd = $request->query->get('pu') / $rate[0]->USD;
             $max_price_eur = $request->query->get('pu') / $rate[0]->EUR;
        } elseif ($currency == 2) {
              $min_price_rub = $request->query->get('pd') * $rate[0]->USD;
              $min_price_usd = (int)$request->query->get('pd');
             $min_price_eur = $request->query->get('pd') / $cross_curs;
             $max_price_rub = $request->query->get('pu') * $rate[0]->USD;
             $max_price_usd = (int)$request->query->get('pu');
             $max_price_eur = $request->query->get('pu') / $cross_curs;
        } elseif ($currency == 3) {
             $min_price_rub = $request->query->get('pd') * $rate[0]->EUR;
             $min_price_usd = $request->query->get('pd') * $cross_curs;
             $min_price_eur = (int)$request->query->get('pd');
             $max_price_rub = $request->query->get('pu') * $rate[0]->EUR;
             $max_price_usd = $request->query->get('pu') * $cross_curs;
             $max_price_eur = (int)$request->query->get('pu');
        }
        $currency_array = [1,2,3];
        $sql = \DB::table('objects');
        foreach ($currency_array as $select) {
            if($select==1){
                $max_price = $max_price_rub;
                $min_price = $min_price_rub;
            }
            elseif ($select==2){
                $max_price = $max_price_usd;
                $min_price = $min_price_usd;
            }
            elseif ($select==3){
                $max_price = $max_price_eur;
                $min_price = $min_price_eur;
            }
            $sql->orWhere('currency', '=', $select)->where('price', '<=', $max_price)->where('price', '>=', $min_price)->where('type', '=', $type);
        }
        $objects_all = $sql->paginate(1);
//        $objects_all = Object::where(function ($query) {
//
//                foreach($currency_array as $select) {
//                    if($select==1){
//                        $max_price = $max_price_rub;
//                        $min_price = $min_price_rub;
//                    }
//                    elseif ($select==2){
//                        $max_price = $max_price_usd;
//                        $min_price = $min_price_usd;
//                    }
//                    elseif ($select==3){
//                        $max_price = $max_price_eur;
//                        $min_price = $min_price_eur;
//                    }
//                    $query->orWhere('currency', '=', $select)->where();
//                }
//                dd($query);
//            })
//            ->get();

        $objects = $objects_all;
        $links = $objects->appends(
            ['sort' => $input_sort,
                'pd'=>$request->query->get('pd'),
                'pu'=>$request->query->get('pu'),
                'type'=>$type])->links();
        $objects = $this->currencyExchange($objects);
        return view('objects.filter', compact('objects', 'links'), ['type' => $type, 'sort'=>$input_sort]);
        $objects_rub = Object::with('gallery')
            ->where('currency', 1)
            ->where('type', $type)
            ->where('price', '>=', $min_price_rub)
            ->where('price', '<=', $max_price_rub)
            ->published()
            ->get();
        $objects_usd = Object::with('gallery')
            ->where('currency', 2)
            ->where('type', $type)
            ->where('price', '>=', $min_price_usd)
            ->where('price', '<=', $max_price_usd)
            ->published()
            ->get();
        $objects_eur = Object::with('gallery')
            ->where('currency', 3)
            ->where('type', $type)
            ->where('price', '>=', $min_price_eur)
            ->where('price', '<=', $max_price_eur)
            ->published()
            ->get();
        $objects = new Collection;
        $objects = $objects->merge($objects_rub)->merge($objects_usd)->merge($objects_eur);
        $objects = $this->currencyExchange($objects);
//        dd($min_price_rub,$min_price_usd,$min_price_eur,$type, $objects, $objects_rub, $objects_usd, $objects_eur);
        if ($input_sort == 'priceDown') {
            $objects = $objects->sortByDesc('price');
        } elseif ($input_sort == 'priceUp') {
            $objects = $objects->sortBy('price');
        } else {
            $objects = $objects->sortBy('created_at');
        }
        $objects->values()->all();
        $links = null;
        return view('objects.filter', compact('objects', 'links'), ['type' => $type, 'sort' => $input_sort]);
    }
}
