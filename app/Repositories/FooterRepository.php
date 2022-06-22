<?php
namespace App\Repositories;

use Illuminate\Http\Request;
use App\Models\CocoFooterModel;
use Illuminate\Support\Facades\DB;

class FooterRepository
{
    private $footer;

    public function __construct(CocoFooterModel $footer)
    {
        $this->footer = $footer;
    }
    //  Repositories層，與Model取資料
    public function get()
    {
        $footer = $this->footer
        ::where('status', '=', 1)
        ->orderBy('sort','ASC')
        ->get();

        return $footer;
    }
}
