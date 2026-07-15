@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <div class="card">

        @if($article->thumbnail)
            <img src="{{ asset('storage/'.$article->thumbnail) }}"
                 class="card-img-top">
        @endif

        <div class="card-body">

            <h2>{{ $article->title }}</h2>

            <hr>

            <p>
                <strong>Kategori :</strong>
                {{ $article->category->name }}
            </p>

            <p>
                {!! nl2br(e($article->content)) !!}
            </p>

            <hr>

            <h4>💬 Komentar ({{ $article->comments->count() }})</h4>

            @forelse($article->comments as $comment)

                <div class="border rounded p-3 mb-3">

                    <strong>{{ $comment->nama }}</strong>

                    <small class="text-muted">
                        ({{ $comment->created_at->format('d M Y H:i') }})
                    </small>

                    <p class="mt-2 mb-0">
                        {{ $comment->komentar }}
                    </p>

                </div>

            @empty

                <p class="text-muted">
                    Belum ada komentar.
                </p>

            @endforelse

            <hr>

            <h5>Tinggalkan Komentar</h5>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('comments.store', $article) }}" method="POST">

                @csrf

                <div class="mb-3">
                    <input type="text"
                           name="name"
                           class="form-control"
                           placeholder="Nama"
                           required>
                </div>

                <div class="mb-3">
                    <input type="email"
                           name="email"
                           class="form-control"
                           placeholder="Email"
                           required>
                </div>

                <div class="mb-3">
                    <textarea name="comment"
                              class="form-control"
                              rows="5"
                              placeholder="Tulis komentar..."
                              required></textarea>
                </div>

                <button class="btn btn-primary">
                    Kirim Komentar
                </button>

            </form>

            <br>

            <a href="{{ route('blog.index') }}"
               class="btn btn-secondary">
                Kembali
            </a>

        </div>

    </div>

</div>

@endsection