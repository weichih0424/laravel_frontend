<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\CocoArticleModel;
use App\Models\CocoCategoryModel;
use App\Services\HeaderNavService;
use App\Services\CategoryService;
use App\Services\ArticleService;
use App\Services\FooterService;
use Illuminate\Support\Facades\Route;

class CocoController extends Controller
{
    private $HeaderNavService;
    private $CategoryService;
    private $ArticleService;
    private $FooterService;

    function __construct(
        HeaderNavService $HeaderNavService,
        CategoryService $CategoryService,
        ArticleService $ArticleService,
        FooterService $FooterService)
    {
        //網頁載入nav.blade.php
        $this->HeaderNavService = $HeaderNavService;
        $this->CategoryService = $CategoryService;
        $this->ArticleService = $ArticleService;
        $this->FooterService = $FooterService;
    }

    public function header()
    {
        $header='咕咕雞商場';
        return $header;
    }

    // public function category_article_processing($category_url = NULL, $page_limit = NULL)
    // {
    //     $categorys = $this->category();
    //     $old_articles=CocoArticleModel::where('status', '=', 1)->orderByRaw('ISNULL(`sort`),`sort` ASC')->orderBy('id','DESC')->paginate($page_limit);
    //     // dd($old_articles);
    //     $new_array = array();
    //     $new_array2 = array();
    //     $articles = array();

    //     $main_food = array();

    //     foreach($old_articles as $key => $v){
    //         $new_array3 = array();
    //         //以","為區間，將字串分開
    //         $select_categorys = $v->select_category;
    //         $select_category = explode(",",$select_categorys);
    //         $v->select_category = $select_category;
    //         //放進new_category陣列
    //         foreach($v->select_category as $key2 => $vv){
    //             $new_array[$key] = $v;
    //             array_push($new_array2,$vv);
    //             // dd($new_array2);
    //             $new_array[$key]->new_category = $new_array2;
    //             //new_category陣列內為數字型態，轉換成對應的中文名稱
    //             foreach($categorys as $key3 => $vvv){
    //                 if($v->select_category[$key2] == $vvv->id){
    //                     // array_push($new_array3,$vvv->name);
    //                     array_push($new_array3,$vvv->url);
    //                     $new_array[$key]->new_category = $new_array3;
    //                     $new_category = $new_array[$key]->new_category;
    //                 }
    //             }
    //             //文章呈現到各個分類頁
    //             if($new_array[$key]->new_category[$key2] == $category_url){
    //                 array_push($articles,$new_array[$key]);
    //             }
    //             // if($new_array[$key]->new_category[$key2] == "food"){
    //             //     array_push($main_food,$new_array[$key]);
    //             // }
    //         }
    //     }
    //     // dd($articles);
    //     return [$articles];
    //     // return [$categorys,$articles,$main_food];
    // }

    public function index()
    {
        //標題
        $header = $this->header();
        //導覽列
        $navbars_array = $this->HeaderNavService->header_nav();
        //分類
        $categorys = $this->CategoryService->get();
        //footer
        $footers = $this->FooterService->get_footer();
        //文章
        $articles = $this->ArticleService->get_main_article();
        
        return view('coco.page_article.main', compact('header','navbars_array','categorys','articles','footers'));
    }

    public function category_article()
    {   
        $category_id = Route::current()->getName(); //美食id、飲品id、運動id

        $header = $this->header();
        $navbars_array = $this->HeaderNavService->header_nav();
        // $categorys = $this->category();
        $categorys = $this->CategoryService->get();
        //category_id查詢category_url
        // $find_category_url = CocoCategoryModel::find($category_id);
        $category_url = $this->CategoryService->category_url($category_id);
        
        // [$articles]= $this->category_article_processing($category_url,$page_limit);
        // $articles=CocoArticleModel::where('status', '=', 1)->where('select_category', 'like', '%'.$category_id.'%')->orderByRaw('ISNULL(`sort`),`sort` ASC')->orderBy('id','DESC')->paginate($page_limit);
        $articles = $this->ArticleService->get_category_article($category_id);
        $footers = $this->FooterService->get_footer();
        // dd($articles);
        return view('coco.page_article.article', compact('header','navbars_array','categorys','category_url','articles','footers'));
    }

    public function article_info($id)
    {
        $category_id = Route::current()->getName();

        $header = $this->header();
        $navbars_array = $this->HeaderNavService->header_nav();
        $categorys = $this->CategoryService->get();
        $category_url = $this->CategoryService->category_url($category_id);
        $footers = $this->FooterService->get_footer();
        $datas = $this->ArticleService->get_article($id);
        $other_articles = $this->ArticleService->get_other_article($category_id, $id);

        return view('coco.page_article.article_info', compact('header','navbars_array','categorys','category_url','footers','datas','other_articles'));
    }
}