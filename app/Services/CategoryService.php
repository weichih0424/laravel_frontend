<?php

namespace App\Services;

use App\Repositories\CategoryRepository;

class CategoryService
{
    private $CategoryRepo;

    public function __construct(CategoryRepository $CategoryRepo)
    {
        $this->CategoryRepo = $CategoryRepo;
    }
    //  處理邏輯
    public function get()
    {
        $categorys = $this->CategoryRepo->get_category_show();
        
        return $categorys;
    }
    public function get_main_show()
    {
        $categorys = $this->CategoryRepo->get_main_show();
        
        return $categorys;
    }
    public function category_url($category_id)
    {
        $categorys = $this->CategoryRepo->get_Category_url($category_id);
        foreach($categorys as $category){
            $category_url = $category->url;
        }

        return $category_url;
    }
}
