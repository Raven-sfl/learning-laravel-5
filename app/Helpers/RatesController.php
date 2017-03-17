<?php

namespace app\Helpers;

use App\currency;
use App\Helpers\RatesContract;
use Carbon\Carbon;
use SimpleXMLElement;


class RatesController implements RatesContract
{

    public function getRate()
    {

        $date = Carbon::now()->toDateString();
        $currency_base = currency::where('date', $date)->get();

        if (isset($currency_base[0])) {
            return $currency_base;
        } else {
            $xml = $this->getXML();
            if ($xml == false) {
                $currency_base = currency::get();
                //dd($currency_base[0]->USD);
                $base_insert = $currency_base->first();

            } else {
                $usd = str_replace(',', '.', $this->procXML($xml, 'USD'));
                $eur = str_replace(',', '.', $this->procXML($xml, 'EUR'));
                Currency::where('date', '<', $date)->delete();
                $base_insert = new currency;
                $base_insert->date = $date;
                $base_insert->USD = $usd;
                $base_insert->EUR = $eur;
                $base_insert->save();
            }
            return $base_insert;
        }
    }

    private function getXML()
    {
        $date = Carbon::now()->toDateString();
//        $currency_old = currency::where('date','<' ,$date);
//        $currency_old->delete();
        $date_url = Carbon::now()->format('d/m/Y');
        $url = 'http://www.cbr.ru/scripts/XML_daily.asp?date_req=' . $date_url;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        return $result = curl_exec($ch);
    }

    private function procXML($xml, $cur)
    {
        $rates = new SimpleXMLElement($xml);
        foreach ($rates->Valute as $rate) {
            if ($rate->CharCode == $cur) {
                return (string)$rate->Value;
            }
        }
    }
}