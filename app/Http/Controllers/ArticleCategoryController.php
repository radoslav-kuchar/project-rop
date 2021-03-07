<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ArticleCategory;

class ArticleCategoryController extends Controller
{
    public function create(){
        return view('articlecategory.create');
    }
    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required|string'
        ]);

        ArticleCategory::create([
            'name' => $data['name'],
        ]);
    }
}
