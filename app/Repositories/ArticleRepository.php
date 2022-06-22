<?php
namespace App\Repositories;

use Illuminate\Http\Request;
use App\Models\CocoArticleModel;
use Illuminate\Support\Facades\DB;

class ArticleRepository
{
    private $article;

    public function __construct(CocoArticleModel $article)
    {
        $this->article = $article;
    }
    //  Repositories層，與Model取資料
    public function get_CocoArticleModel($category_id)
    {
        $article = $this->article
        ::where('a.status', '=', 1)
        ->where('a.select_category', 'like', '%'.$category_id.'%')
        ->orderByRaw('ISNULL(a.sort),a.sort ASC')
        ->orderBy('a.id','DESC')
        ->paginate(19);

        return $article;
        // dd($article);
    }
}
