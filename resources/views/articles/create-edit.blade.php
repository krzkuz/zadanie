@extends('layouts.app')

@section('title')
    {{ $edit ? 'Edit article' : 'Create article' }}
@endsection

@section('content')
    <h1>
        {{ $edit ? 'Edit article' : 'Create article' }}
    </h1>

    <form method="POST" action="{{ $edit ? route('article.update', ['id' => $article->id]) : route('article.store') }}"
        style="width: 300px">
        @csrf
        @if ($edit)
            @method('PUT')
        @endif
        <label for="title">
            Title:
        </label>
        <br>
        <input type="text" id="title" name="title" placeholder="Type title of article..."
            value="{{ $edit ? old('title', $article->title) : '' }}" maxlength="200" required>
        <br>
        <label for="text">
            Text:
        </label>
        <br>
        <textarea type="text" id="text" name="text" placeholder="Article content..." rows="3"
            style="width: 100%" required>{{ $edit ? old('text', $article->text) : '' }}</textarea>
        <br>

        <label for="authors">
            Authors (hold Ctrl to select many):
        </label>
        <br>
        <select id="authors" name="authors[]" multiple>
            @foreach ($authors as $author)
                @if (isset($authorIds))
                    <option value="{{ $author->id }}" {{ in_array($author->id, $authorIds) ? 'selected' : '' }}>
                        {{ $author->name }}
                    </option>
                @else
                    <option value="{{ $author->id }}">
                        {{ $author->name }}
                    </option>
                @endif
            @endforeach
        </select>
        <br>

        <button>
            {{ $edit ? 'Update' : 'Create' }}
        </button>
    </form>
@endsection
