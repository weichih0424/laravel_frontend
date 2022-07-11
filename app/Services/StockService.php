<?php

namespace App\Services;

class StockService
{
    public function get()
    {   
        return "123";
        // $fh= file_get_contents('https://www.youtube.com/');
        // return $fh;
        // $ch= curl_init();
        // curl_setopt($ch, CURLOPT_URL,"https://www.youtube.com/");
        // curl_setopt($ch, CURLOPT_HEADER, false);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, TRUE);
        // curl_setopt($ch, CURLOPT_PROXY, '1.1.1.1:8080'); //這裡是代理ip
        // //url_setopt($ch, CURLOPT_PROXYUSERPWD, 'user:password');如果要密碼的話，加上這個
        // $result=curl_exec($ch);
        // curl_close($ch);


        // return $result;
    }
}
