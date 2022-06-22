<?php

namespace App\Services;
use App\Repositories\HeaderNavRepository;

class HeaderNavService
{
    private $HeaderNavRepo;

    public function __construct(HeaderNavRepository $HeaderNavRepo)
    {
        $this->HeaderNavRepo = $HeaderNavRepo;
    }

    public function header_nav(){
        $navbars = $this->HeaderNavRepo->get_navbars();
        $navbars_parent = $this->HeaderNavRepo->get_navbars_parent();
        
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