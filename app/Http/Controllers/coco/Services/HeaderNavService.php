<?php

namespace App\Http\Controllers\coco\Services;

use App\Http\Controllers\Controller;
use App\models\CocoNavModel;

class HeaderNavService extends Controller
{
    public function header_nav(){
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
        return $navbars_array;
    }
}
