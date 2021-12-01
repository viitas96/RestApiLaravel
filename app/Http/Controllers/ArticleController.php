<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function getArticles()
    {
        $articles = Article::all();
        return response()->json($articles);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required'
        ]);
        $article = Article::create([
            'text' => $request->title,
            'content' => $request->content
        ]);
        return response()->json($article)->setStatusCode(201);
    }

    public function getOneArticle($id)
    {
        $article = Article::find($id);
        if (!$article) {
            return response()->json([
                'status' => false,
                'message' => 'Post Not Found'
            ])->setStatusCode(404, "Article Not Found");
        }
        return response()->json($article);
    }

    public function updateArticle($id, Request $request)
    {
        $article = Article::find($id);
        if (!$article) {
            return response()->json([
                'status' => false,
                'message' => 'Post Not Found'
            ])->setStatusCode(404, "Article Not Found");
        }

        $request->validate([
            'text' => 'required|max:255',
            'content' => 'required'
        ]);

        $article->text = $request->text;
        $article->content = $request->content;
        $article->save();

        return response()->json($article);
    }

    public function deleteArticle($id)
    {
        $article = Article::find($id);
        if (!$article) {
            return response()->json([
                'status' => false,
                'message' => 'Post Not Found'
            ])->setStatusCode(404, "Article Not Found");
        }

        $article->delete();
        return response()->json([
            'message' => 'Post deleted'
        ]);
    }
}
