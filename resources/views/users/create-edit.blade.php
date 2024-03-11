@extends('layouts.app')

@section('title')
    {{ $edit ? 'Edit author' : 'Create author' }}
@endsection

@section('content')
    <h1>
        {{ $edit ? 'Edit author' : 'Create author' }}
    </h1>

    <form method="POST" action="{{ $edit ? route('author.update', ['id' => $author->id]) : route('author.store') }}"
        style="width: 300px">
        @csrf
        @if ($edit)
            @method('PUT')
        @endif
        <label for="name">
            Name:
        </label>
        <br>
        <input type="text" id="name" name="name" placeholder="Type your name..."
            value="{{ $edit ? old('name', $author->name) : '' }}" autocomplete="name" maxlength="200" required>
        <br>
        <label for="description">
            Description:
        </label>
        <br>
        <textarea type="text" id="description" name="description" placeholder="Write something about you..." rows="3"
            style="width: 100%" required>{{ $edit ? old('description', $author->description) : '' }}</textarea>
        <br>
        <button>
            {{ $edit ? 'Update' : 'Create' }}
        </button>
    </form>
@endsection
