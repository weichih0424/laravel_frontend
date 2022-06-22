<?php
namespace App\Repositories;

use App\Models\CocoNavModel;

class HeaderNavRepository
{
    private $HeaderNav;

    public function __construct(CocoNavModel $HeaderNav)
    {
        $this->HeaderNav = $HeaderNav;
    }
    //  Repositories層，與Model取資料
    public function get_navbars()
    {
        $get_navbars = $this->HeaderNav
        ::where('status', '=', 1)
        ->where('position', '<', 2)
        ->orderByRaw('ISNULL(`sort`),`sort` ASC')
        ->orderBy('id','DESC')
        ->get();
        
        return $get_navbars;
    }
    public function get_navbars_parent()
    {
        $get_navbars_parent = $this->HeaderNav
        ::where('status', '=', 1)
        ->where('position',2)
        ->orderByRaw('ISNULL(`sort`),`sort` ASC')
        ->orderBy('id','DESC')
        ->get();
        
        return $get_navbars_parent;
    }
}
