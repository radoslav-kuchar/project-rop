<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\ArticleCategory;

class ArticleController extends Controller
{
    public function create(){
        $article_categories = ArticleCategory::all();
        return view('article.create', compact('article_categories'));
    }
    public function store(Request $request){
        $data = $request->validate([
            'title' => 'required|string',
            'article_category_id' => 'required|integer',
            'content' => 'required|string',
        ]);

        Article::create([
            'title' => $data['title'],
            'article_category_id' => $data['article_category_id'],
            'content' => $data['content'],
        ]);
    }
}
