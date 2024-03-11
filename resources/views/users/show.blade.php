@extends('layouts.app')

@section('title')
    {{ $author->name }}
@endsection

@section('content')
    <a href="{{ route('authors') }}">
        Go back to all authors
    </a>
    <h1>
        {{ $author->name }}
    </h1>
    <span>
        Created at:{{ $author->created_at }}
    </span>
    <span>
        Updated at:{{ $author->updated_at }}
    </span>
    <p>
        Articles by this author:
        <br>
        @foreach ($author->articles as $article)
            <a href="{{ route('article', ['id' => $article->id]) }}">
                {{ $article->title }}
            </a>
            <br>
        @endforeach
    </p>
    <p>
        Description:
        <br>
        {{ $author->description }}
    </p>
    <div style="display: flex">
        <a href="{{ route('author.edit', ['id' => $author->id]) }}" style="margin-right: 10px">
            Edit
        </a>
        <form method="POST" action="{{ route('author.delete', ['id' => $author->id]) }}">
            @csrf
            @method('DELETE')
            <button type="submit">
                Delete
            </button>
        </form>
    </div>
@endsection
