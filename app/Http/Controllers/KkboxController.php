<?php

namespace App\Http\Controllers;
use App\Services\HeaderNavService;
use App\Services\FooterService;
use App\Services\KkboxService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class KkboxController extends Controller
{
    private $HeaderNavService;
    private $FooterService;
    private $KkboxService;

    function __construct(
        HeaderNavService $HeaderNavService,
        FooterService $FooterService,
        KkboxService $KkboxService
        )
    {
        //網頁載入nav.blade.php
        $this->HeaderNavService = $HeaderNavService;
        $this->FooterService = $FooterService;
        $this->KkboxService = $KkboxService;
    }

    public function header()
    {
        $header='KKBOX';
        return $header;
    }

    public function index()
    {
        $header = $this->header();
        $navbars_array = $this->HeaderNavService->header_nav();
        $footers = $this->FooterService->get_footer();
        
        return view('kkbox.page_kkbox.main', compact('header','navbars_array','footers'));
    }
    // public function chart_playlists()
    // {
    //     $chart_playlists = $this->KkboxService->chart_playlists();

    //     foreach ($chart_playlists["data"] as $key => $value) {
    //         return '<br>'.$value["title"];
    //     }
    //     // echo var_dump($chart_playlists["data"]);
    // }
    public function post_web_player(){
        // $name=$_POST['name'];//====通过POST方式获取的参数
        // $city=$_POST['city'];//====通过POST方式获取的参数

        // $latest_position_data_arry = array(
        // 'name0' => $name,
        // 'city0' => $city);
        // echo json_encode($latest_position_data_arry);

        //输出json对象
        // $("#position_data_show").html("当前返回姓名:"+data.name0+"返回的城市"+data.city0);
        // // 输出json对象转换成的字符串
        // var str=JSON.stringify(data);
        // $("#json_to_str_show").html("转换为字符串后的json为"+str);

        $id = $_POST['id'];
        echo json_encode($id);
    }
}
