<?php

namespace App\Services;

use App\Repositories\ArticleRepository;

class ArticleService
{
    private $ArticleRepo;

    public function __construct(ArticleRepository $ArticleRepo)
    {
        $this->ArticleRepo = $ArticleRepo;
    }
    //  處理邏輯
    public function get_category_article($category_id)
    
    {
        $articles = $this->ArticleRepo->get_CocoArticleModel($category_id);

        return $articles;
    }
}
