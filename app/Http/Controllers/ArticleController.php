<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{   //show all articles
     public function index()
    {
        return Article::all();
    }
    //show an article by id
    public function show($id)
    {
        return Article::find($id);
    }
//save an article
    public function store(Request $request)
    {
       $article = Article::create($request->all());
       return response()->json($article, 201);
    }
//update an article
    public function update(Request $request, Article $article)
    {

        $article->update($request->all());

        return response()->json($article, 200) ;
    }
//delete an article
    public function delete(Article $article)
    {

        $article->delete();

        return response()->json(null, 204);
    }
}
