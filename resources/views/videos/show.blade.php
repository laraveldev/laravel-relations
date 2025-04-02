@extends('layouts.app')
@section('title', 'Video tafsilotlari')
@section('content')
    <div class="container mt-5">
        <h1 class="text-center">Video tafsilotlari</h1>
        <div class="card mb-3">
            <div class="card-header">
                Video: {{$video->title}}
            </div>
            <div class="card-body">
                <h5 class="card-title">Video URL: <a href="{{$video->url}}">{{$video->url}}</a></h5>
                <h5 class="card-title">Video Sarlavhasi: {{$video->title}}</h5>
                <a href="{{route('videos.index')}}" class="btn btn-secondary">Orqaga</a>
                <a href="{{route('videos.edit', ['video' => $video])}}" class="btn btn-warning">Tahrirlash</a>
                <form action="{{route('videos.destroy', ['video' => $video])}}" method="post" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">O'chirish</button>
                </form>
            </div>
        </div>
        <!-- Izohlar qismi -->
        <div class="comments-section">

            <!-- Izoh qo'shish formasi -->
            <h4 class="mt-4">Izoh qoldirish</h4>
            <form action="{{ route('videosStore', ['id' => $video->id]) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="author" class="form-label">Ismingiz</label>
                    <input type="text" class="form-control" id="author" name="author" required>
                    @error('author')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="mb-3">
                    <label for="body" class="form-label">Izohingiz</label>
                    <textarea class="form-control" id="body" name="body" rows="3" required></textarea>
                    @error('body')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <button type="submit" class="btn btn-primary">Izoh qoldirish</button>
            </form>
            <br>
            <h2>Izohlar</h2>

            <!-- Mavjud izohlar -->
            @foreach($video->comments as $comment)
                <div class="comment mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $comment->author }}</h5>
                            <p class="card-text">{{ $comment->body }}</p>
                            <small class="text-muted">1 soat oldin</small>
                            <!-- O'chirish tugmasi -->
                            <form action="{{route('commentDestroy', ['id' => $comment->id])}}" method="POST" style="display: inline-block;">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">O'chirish</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection
