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

            <a href="{{ route('blog.index') }}"
               class="btn btn-secondary">

                Kembali

            </a>

        </div>

    </div>

</div>

@endsection