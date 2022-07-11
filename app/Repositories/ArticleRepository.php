<?php
namespace App\Repositories;

use Illuminate\Http\Request;
use App\Models\CocoArticleModel;

class ArticleRepository
{
    private $article;

    public function __construct(CocoArticleModel $article)
    {
        $this->article = $article;
    }
    //  Repositories層，與Model取資料
    public function get_category_article($category_id)
    {
        $article = $this->article
        ::where('a.status', '=', 1)
        ->where('a.select_category', 'like', '%'.$category_id.'%')
        ->orderByRaw('ISNULL(a.sort),a.sort ASC')
        ->orderBy('a.id','DESC')
        ->paginate(19);

        return $article;
    }
    public function get_article_id($id)
    {
        $article = $this->article
        ::where('id', '=', $id)
        ->get();

        return $article;
    }
    public function get_other_article($category_id, $id)
    {
        $article = $this->article
        ::where('status', '=', 1)
        ->where('select_category', 'like', '%'.$category_id.'%')
        ->where('id', '!=', $id)
        ->orderByRaw('ISNULL(`sort`),`sort` ASC')
        ->orderBy('id','DESC')
        ->take(9)
        ->get();

        return $article;
    }
    public function get_main_article($main_id)
    {
        // dd($main_id);
        $article = $this->article
        ->where('a.status', '=', 1)
        ->where('a.select_category', 'like', '%'.$main_id.'%')
        ->take(3)
        ->get();

        return $article;
    }
}
