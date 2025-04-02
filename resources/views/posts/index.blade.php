@extends('layouts.app')
@section('title', 'Postlar Ro\'yxati')
@section('content')

    <div class="container mt-5">
        <h1 class="text-center">Postlar Ro'yxati</h1>
        <div class="text-end mb-3">
            <a href="{{ route('posts.create') }}" class="btn btn-primary">Yangi Post Qo'shish</a>
            <a href="{{ route('dashboard') }}" class="btn btn-secondary"><-Ortga</a>
        </div>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Sarlavha</th>
                <th>Mazmun</th>
                <th>Harakatlar</th>
            </tr>
            </thead>
            <tbody>
            @forelse($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->body }}</td>
                    <td>
                        <a href="{{route('posts.show', ['post' => $post])}}" class="btn btn-info btn-sm">Ko'rish</a>
                        <a href="{{ route('posts.edit', ['post' => $post]) }}" class="btn btn-warning btn-sm">Tahrirlash</a>
                        <form action="{{ route('posts.destroy', ['post' => $post]) }}" method="post" style="display: inline-block">
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
