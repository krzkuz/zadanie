<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    public function allAuthors() : View {
        $authors = User::select('id', 'name')
            ->orderBy('updated_at', 'desc')
            ->get();

        return view('users.index', compact('authors'));
    }

    public function show(int $id) : View {
        $author = User::with(['articles:id,title'])
            ->find($id);

        return view('users.show', compact('author'));
    }

    public function edit(int $id) : View {
        $author = User::find($id);
        $edit = true;

        return view('users.create-edit', compact('author', 'edit'));
    }

    public function update(Request $request, int $id) : View {
        $author = User::find($id);
        $formFields = $request->validate([
            'name' => 'required|max:200',
            'description' => 'required'
        ]);

        $author->update($formFields);

        return view('users.show', compact('author'));
    }

    public function create() : View {
        $edit = false;

        return view('users.create-edit', compact('edit'));
    }

    public function store(Request $request) : View {
        $formFields = $request->validate([
            'name' => 'required|max:200',
            'description' => 'required'
        ]);

        $author = User::create($formFields);

        return view('users.show', compact('author'));
    }

    public function delete(int $id) : RedirectResponse {
        $author = User::find($id);

        $author->delete();

        return redirect()->route('authors');
    }
}
