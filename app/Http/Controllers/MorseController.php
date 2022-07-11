<?php

namespace App\Http\Controllers;
use App\Services\HeaderNavService;
use App\Services\FooterService;
use App\Services\MorseService;
use Illuminate\Http\Request;

class MorseController extends Controller
{
    private $HeaderNavService;
    private $FooterService;
    private $StockService;

    function __construct(
        HeaderNavService $HeaderNavService,
        FooterService $FooterService,
        MorseService $MorseService
        )
    {
        //網頁載入nav.blade.php
        $this->HeaderNavService = $HeaderNavService;
        $this->FooterService = $FooterService;
        $this->MorseService = $MorseService;
    }

    public function header()
    {
        $header='摩斯密碼筆記';
        return $header;
    }

    public function index()
    {
        $header = $this->header();
        $navbars_array = $this->HeaderNavService->header_nav();
        $footers = $this->FooterService->get_footer();
        // $morses = $this->MorseService->encode();

        return view('morse.page_morse.main', compact('header','navbars_array','footers'));
    }
    public function get_encode()
    {   
        $text =  request()->input('txt');
        $txt = $this->MorseService->encode($text);
        echo json_encode($txt);
    }
    public function get_decode()
    {   
        $morse =  request()->input('morse');
        $morses = $this->MorseService->decode($morse);
        echo json_encode($morses);
    }
}
