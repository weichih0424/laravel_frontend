<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CocoArticleModel extends Model
{
    use HasFactory;

    protected $table = 'coco_article as a';
    
    // protected $fillable = [
    //     'select_category',
    //     'name',
    //     'intro',
    //     'url',
    //     'image',
    //     'fb_url',
    //     'yt_url',
    //     'line_url',
    //     'ig_url',
    //     'sort',
    //     'status',
    // ];
}
