@extends('layouts.app')

@section('title')
    Home page
@endsection

@section('content')
    <h1>
        All articles
    </h1>
    <div style="display: flex;">
        <a href="{{ route('authors') }}" style="margin-right: 10px">
            Show all authors
        </a>
        <a href="{{ route('article.create') }}" style="margin-right: 10px">
            Write new article
        </a>
        <a href="{{ route('author.create') }}">
            Create new author
        </a>
    </div>

    @if (!$articles)
        <span>
            There are no articles in database
        </span>
    @else
        {{-- table with list of all articles from db --}}
        <table border="1">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articles as $article)
                    <tr>
                        <td>
                            <a href="{{ route('article', ['id' => $article->id]) }}">
                                {{ $article->title }}
                            </a>
                        </td>
                        <td>
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
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

@endsection
