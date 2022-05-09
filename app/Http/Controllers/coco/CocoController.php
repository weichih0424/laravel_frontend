<?php

namespace App\Http\Controllers\coco;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\CocoNavModel;
use App\Models\CocoArticleModel;

class CocoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $header='咕咕雞商場';
        //導覽列
        $navbars = CocoNavModel::where('status', '=', 1)->where('position', '<', 2)->orderBy('id','DESC')->get();
        $navbars_parent = CocoNavModel::where('status', '=', 1)->where('position',2)->orderBy('id','DESC')->get();
        $navbars_array = array();
        
        foreach($navbars as $key => $v){
            $SubNav = array();
            foreach($navbars_parent as $key2 => $vv){
                $navbars_array[$key] = $v;
                if($v->id == $vv->parent_id){                  
                    array_push($SubNav,$vv);
                    $navbars_array[$key]->SubNav = $SubNav;
                }
            }
        }
        //文章
        $articles=CocoArticleModel::where('status', '=', 1)->orderByRaw('ISNULL(`sort`),`sort` ASC')->orderBy('id','DESC')->get();
        return view('coco.index', compact('navbars','navbars_parent','header','articles','navbars_array'));
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
