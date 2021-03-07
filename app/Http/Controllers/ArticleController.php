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
            'category_id' => 'required|integer',
            'content' => 'required|string',
        ]);

        Article::create([
            'title' => $data['title'],
            'category_id' => $data['category_id'],
            'content' => $data['content'],
        ]);
    }
}
