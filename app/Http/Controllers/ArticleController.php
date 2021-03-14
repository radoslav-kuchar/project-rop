<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\ArticleCategory;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::paginate(12);
        foreach($articles as $article){
            $article->article_category = ArticleCategory::find($article->article_category_id)->name;
        }
        return view('article.home', compact('articles'));
    }

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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        $article->article_category = ArticleCategory::find($article->article_category_id)->name;
        return view('article.detail', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}