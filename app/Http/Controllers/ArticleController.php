<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

class ArticleController extends Controller
{
    public function index() : View {
        $articles = Article::select('id', 'title', 'updated_at')
            ->orderBy('updated_at', 'desc')
            ->get();

        return view('articles.index', compact('articles'));
    }

    public function show(int $id) : View {
        $article = Article::with(['authors:id,name'])
            ->find($id);

        return view('articles.show', compact('article'));
    }

    public function create() : View {
        $edit = false;
        $authors = User::select('id', 'name')
            ->get();

        return view('articles.create-edit', compact('edit', 'authors'));
    }

    public function edit(int $id) : View {
        $article = Article::with(['authors:id,name'])
            ->find($id);
        $edit = true;
        //all authors
        $authors = User::select('id', 'name')
            ->get();

        //array of this article authors
        $authorIds = $article->authors->pluck('id')->toArray();

        return view('articles.create-edit', compact('article', 'edit', 'authors', 'authorIds'));
    }

    public function update(Request $request, int $id) : View {
        $article = Article::find($id);
        $formFields = $request->validate([
            'title' => 'required|max:200',
            'text' => 'required'
        ]);
        $authorsIds = $request->input('authors');

        $article->update($formFields);
        $article->authors()->sync($authorsIds);

        return view('articles.show', compact('article'));
    }

    public function store(Request $request) : View {
        $formFields = $request->validate([
            'title' => 'required|max:200',
            'text' => 'required'
        ]);
        $authorsIds = $request->input('authors');

        $article = Article::create($formFields);
        $article->authors()->attach($authorsIds);

        return view('articles.show', compact('article'));
    }

    public function delete(int $id) : RedirectResponse {
        $article = Article::find($id);

        $article->delete();

        return redirect()->route('home');
    }
}
