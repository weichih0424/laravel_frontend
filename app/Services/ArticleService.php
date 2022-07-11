<?php

namespace App\Services;

use App\Repositories\ArticleRepository;
use App\Repositories\CategoryRepository;

class ArticleService
{
    private $ArticleRepo;
    private $CategoryRepo;

    public function __construct(
        ArticleRepository $ArticleRepo,
        CategoryRepository $CategoryRepo)
    {
        $this->ArticleRepo = $ArticleRepo;
        $this->CategoryRepo = $CategoryRepo;
    }
    //  處理邏輯
    public function get_category_article($category_id)
    {
        $articles = $this->ArticleRepo->get_category_article($category_id);

        return $articles;
    }
    public function get_article($id)
    {
        $articles = $this->ArticleRepo->get_article_id($id);

        return $articles;
    }
    public function get_other_article($category_id, $id)
    {
        $articles = $this->ArticleRepo->get_other_article($category_id, $id);

        return $articles;
    }
    public function get_main_article()
    {
        $main_show_array = array();

        $categorys = $this->CategoryRepo->get_main_show();
        foreach($categorys as $key => $category){
            $main_id = $category->id;
            $categorys[$key]->name = $category->name;
            $categorys[$key]->en_name = $category->url;
            $category->url = $this->ArticleRepo->get_main_article($main_id);
            array_push($main_show_array,$category->url);
        }

        return $categorys;
    }
}
