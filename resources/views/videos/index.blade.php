@extends('layouts.app')
@section('title', 'Videolar ro\'yxati')
@section('content')
    <div class="container mt-5">
        <h1 class="text-center">Videolar ro'yxati</h1>
        <a href="{{ route('videos.create') }}" class="btn btn-primary mb-3">Yangi video qo'shish</a>
        <a href="{{ route('dashboard') }}" class="btn btn-secondary mb-3"><-Ortga</a>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Video Sarlavhasi</th>
                <th>URL</th>
                <th>Harakatlar</th>
            </tr>
            </thead>
            <tbody>
            @forelse($videos as $video)
                <tr>
                    <td>{{ $video->id }}</td>
                    <td>{{ $video->title }}</td>
                    <td>{{ $video->url }}</td>
                    <td>
                        <a href="{{route('videos.show', ['video' => $video])}}" class="btn btn-info btn-sm">Ko'rish</a>
                        <a href="{{route('videos.edit', ['video' => $video])}}" class="btn btn-warning btn-sm">Tahrirlash</a>
                        <form action="{{route('videos.destroy', ['video' => $video])}}" method="post" style="display: inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">O'chirish</button>
                        </form>
                    </td>
                </tr>
            @empty
                <div class="alert alert-danger">Nothing</div>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
