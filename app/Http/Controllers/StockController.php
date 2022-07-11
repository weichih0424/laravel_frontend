<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\HeaderNavService;
use App\Services\FooterService;
use App\Services\StockService;

class StockController extends Controller
{
    private $HeaderNavService;
    private $FooterService;
    private $StockService;

    function __construct(
        HeaderNavService $HeaderNavService,
        FooterService $FooterService,
        StockService $StockService)
    {
        //網頁載入nav.blade.php
        $this->HeaderNavService = $HeaderNavService;
        $this->FooterService = $FooterService;
        $this->StockService = $StockService;
    }

    public function header()
    {
        $header='股票筆記';
        return $header;
    }

    public function index()
    {
        $header = $this->header();
        $navbars_array = $this->HeaderNavService->header_nav();
        $footers = $this->FooterService->get_footer();

        return view('stock.page_stock.main', compact('header','navbars_array','footers'));
    }
    public function add()
    {
        $account =  request()->input('account');
        $password = request()->input('password');
        // $account=$_POST["account"];
        // $password=$_POST["password"];
        $stock = $this->StockService->get();
        echo json_encode($stock);

        $arr=array();
        $arr['account']=$account;
        $arr['password']=$password;

        // echo json_encode($arr);



        // return response()->json([
        //     'status' => 'success',
        //     'account' => $account,
        //     'password' => $password,
        //     'message' => 'register ok'
		// ], 200);
	}
    public function py_json(){
        $url = 'https://api.finmindtrade.com/api/v4/data?dataset=TaiwanStockPrice&data_id=2883&start_date=2022-06-01&end_date=2022-07-01&token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJkYXRlIjoiMjAyMi0wNy0wNSAxNDoyMDo0NSIsInVzZXJfaWQiOiJFcmljX0Nob3UiLCJpcCI6IjEwMS4zLjEzOC40MyJ9.Fy5fy_wQn7SaOo2ao-cs1yb3f5tI_euCF5MjuRLFh1w';
        $json = file_get_contents($url);
        $jo = json_decode($json);
        print_r($jo);
        // $command=`python3 py/stock.py 2>&1`;
        // exec($command);
        // print_r($command);
    }
}
