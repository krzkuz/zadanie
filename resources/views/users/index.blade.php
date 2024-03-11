@extends('layouts.app')

@section('title')
    All authors
@endsection

@section('content')
    <h1>
        All authors
    </h1>
    <div style="display: flex;">
        <a href="{{ route('home') }}" style="margin-right: 10px">
            Show all articles
        </a>
        <a href="{{ route('article.create') }}" style="margin-right: 10px">
            Write new article
        </a>
        <a href="{{ route('author.create') }}">
            Create new author
        </a>
    </div>

    @if (!$authors)
        <span>
            There are no authors in database
        </span>
    @else
        {{-- table with list of all authors from db --}}
        <table border="1">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($authors as $author)
                    <tr>
                        <td>
                            <a href="{{ route('author', ['id' => $author->id]) }}">
                                {{ $author->name }}
                            </a>
                        </td>
                        <td>
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
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

@endsection
