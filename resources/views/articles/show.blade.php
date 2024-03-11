@extends('layouts.app')

@section('title')
    {{ $article->title }}
@endsection

@section('content')
    <a href="{{ route('home') }}">
        Go back to all articles
    </a>
    <h1>
        {{ $article->title }}
    </h1>
    <span>
        Created at:{{ $article->created_at }}
    </span>
    <span>
        Updated at:{{ $article->updated_at }}
    </span>
    <p>
        Authors:
        <br>
        @foreach ($article->authors as $author)
            <a href="{{ route('author', ['id' => $author->id]) }}">
                {{ $author->name }}
            </a>
            <br>
        @endforeach
    </p>
    <p>
        Article text:
        <br>
        {{ $article->text }}
    </p>
    <div style="display: flex">
        <a href="{{ route('article.edit', ['id' => $article->id]) }}" style="margin-right: 10px">
            Edit
        </a>
        <form method="POST" action="{{ route('article.delete', ['id' => $article->id]) }}">
            @csrf
            @method('DELETE')
            <button type="submit">
                Delete
            </button>
        </form>
    </div>
@endsection
