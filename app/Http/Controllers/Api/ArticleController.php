<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function getArticle(int $id) : JsonResponse {
        //check if ID was provided by client
        if(!$id) {
            return response()->json(['error' => 'ID parameter is missing or invalid.'], 400);
        }

        $article = Article::find($id);

        if(!$article) {
            return response()->json(['error' => 'There is no article with provided id'], 404);
        }

        return response()->json(['article' => $article], 200);
    }

    public function getAllArticlesByAuthor(int $id) : JsonResponse {
        //check if ID was provided by client
        if(!$id) {
            return response()->json(['error' => 'ID parameter is missing or invalid.'], 400);
        }

        //get author with all related articles
        $author = User::with('articles')->find($id);

        if(!$author) {
            return response()->json(['error' => 'There is no author with provided id'], 404);
        }

        return response()->json(['articles' => $author->articles], 200);
    }
}
