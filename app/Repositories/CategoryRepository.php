<?php
namespace App\Repositories;

use App\Models\CocoCategoryModel;

class CategoryRepository
{
    private $category;

    public function __construct(CocoCategoryModel $category)
    {
        $this->category = $category;
    }
    //  Repositories層，與Model取資料
    public function get_CocoCategoryModel()
    {
        $categorys = $this->category
        ::where('status', '=', 1)
        ->orderByRaw('ISNULL(`sort`),`sort` ASC')
        ->orderBy('id','DESC')
        ->get();
        
        return $categorys;
    }
    public function get_Category_url($category_id)
    {
        $categorys = $this->category
        ::select('url')
        ->where('id', '=', $category_id)
        ->get();
        
        return $categorys;
    }
}
