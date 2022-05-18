<?php

namespace App\Http\Controllers\coco;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\models\CocoNavModel;
use App\Models\CocoArticleModel;
use App\Models\CocoCategoryModel;
use App\Http\Controllers\coco\Services\HeaderNavService;

class CocoController extends Controller
{
    private $header_nav;

    function __construct(HeaderNavService $header_nav)
    {
        $this->header_nav = $header_nav;
    }

    public function index()
    {
        $header='咕咕雞商場';
        //導覽列
        $navbars_array = $this->header_nav->header_nav();
        //分類
        $categorys=CocoCategoryModel::where('status', '=', 1)->get();
        //文章
        $articles=CocoArticleModel::where('status', '=', 1)->orderByRaw('ISNULL(`sort`),`sort` ASC')->orderBy('id','DESC')->get();
        
        return view('coco.page_article', compact('header','articles','navbars_array','categorys'));
    }

    public function category_article()
    {   
        $header='咕咕雞商場';
        $navbars_array = $this->header_nav->header_nav();
        $categorys=CocoCategoryModel::where('status', '=', 1)->get();
        $old_articles=CocoArticleModel::where('status', '=', 1)->orderByRaw('ISNULL(`sort`),`sort` ASC')->orderBy('id','DESC')->get();
        
        $category_url = $_POST['category_name'];
        
        $new_array = array();
        $new_array2 = array();
        $articles = array();

        foreach($old_articles as $key => $v){
            $new_array3 = array();
            //以","為區間，將字串分開
            $select_categorys = $v->select_category;
            $select_category = explode(",",$select_categorys);
            $v->select_category = $select_category;
            //放進new_category陣列
            foreach($v->select_category as $kk => $vv){
                $new_array[$key] = $v;
                array_push($new_array2,$vv);
                $new_array[$key]->new_category = $new_array2;
                //new_category陣列內為數字型態，轉換成對應的中文名稱
                foreach($categorys as $key2 => $vvv){
                    if($v->select_category[$kk] == $vvv->id){
                        array_push($new_array3,$vvv->name);
                        $new_array[$key]->new_category = $new_array3;
                        $new_category = $new_array[$key]->new_category;
                    }
                }
                //文章呈現到各個分類頁
                if($new_array[$key]->new_category[$kk] == $category_url){
                    array_push($articles,$new_array[$key]);
                }
            }
        }
        
        return view('coco.page_article', compact('header','articles','navbars_array','categorys'));
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
