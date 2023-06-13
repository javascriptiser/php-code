<?php

namespace Amasty\helpers;

class NB_RB
{
    public static function getRate(): float
    {
        $url = 'https://api.nbrb.by/exrates/rates/431';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        return json_decode(curl_exec($curl))->Cur_OfficialRate;
    }
}