@extends('layouts.app')
@section('title', 'Video tahrirlash')
@section('content')
    <div class="container mt-5">
        <h1 class="text-center">Video tahrirlash</h1>
        <form action="{{ route('videos.update', ['video' => $video]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Video Sarlavhasi</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $video->title }}" required>
                @error('title')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="mb-3">
                <label for="url" class="form-label">Video URL</label>
                <input type="url" class="form-control" id="url" name="url" value="{{ $video->url }}" required>
                @error('url')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <button type="submit" class="btn btn-primary">Yangilash</button>
            <a href="{{ route('videos.index') }}" class="btn btn-secondary">Orqaga</a>
        </form>
    </div>
@endsection
