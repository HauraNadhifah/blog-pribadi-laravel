@extends('layouts.app')

@section('content')

<style>

body{
    background:#FFF9F7;
    font-family:'Segoe UI',sans-serif;
}

/* HERO */

.hero{
    background:linear-gradient(135deg,#FFE8DA,#FFF7F1,#E8F6EF);
    border-radius:30px;
    padding:40px;
    margin-bottom:35px;
    position:relative;
    overflow:hidden;
    box-shadow:0 12px 30px rgba(0,0,0,.08);
}

.hero::before{
    content:"";
    position:absolute;
    width:180px;
    height:180px;
    background:#FFD7C8;
    border-radius:50%;
    top:-60px;
    right:-60px;
    opacity:.7;
}

.hero::after{
    content:"";
    position:absolute;
    width:140px;
    height:140px;
    background:#DDF6E8;
    border-radius:50%;
    bottom:-50px;
    left:-40px;
}

.hero h2{
    position:relative;
    z-index:2;
    font-size:38px;
    font-weight:700;
    color:#5B4435;
}

.hero p{
    position:relative;
    z-index:2;
    color:#666;
    font-size:17px;
}

/* CARD */

.article-card{
    background:#fff;
    border-radius:25px;
    overflow:hidden;
    max-width:900px;
    margin:auto;
    box-shadow:0 15px 35px rgba(0,0,0,.08);
}

/* GAMBAR */

.article-image{
    width:100%;
    height:auto;
    max-height:420px;
    display:block;
    object-fit:contain;
    background:#fafafa;
    padding:15px;
}

.article-body{
    padding:35px;
}

.title{
    font-size:34px;
    font-weight:700;
    color:#4F4036;
}

.info{
    display:flex;
    flex-wrap:wrap;
    gap:12px;
    margin:20px 0;
}

.badge-info{
    background:#FFF1E8;
    color:#8A5A42;
    padding:8px 16px;
    border-radius:50px;
    font-size:14px;
}

.status{
    background:#DDF5E7;
    color:#2F6E4F;
}

.content{
    margin-top:25px;
    line-height:2;
    color:#555;
    font-size:17px;
}

.btn-back{
    background:#F4B183;
    color:white;
    border:none;
    border-radius:30px;
    padding:12px 28px;
}

.btn-back:hover{
    background:#EB9866;
    color:white;
}

</style>

<div class="container py-5">

    <div class="hero">

        <h2>📖 Detail Artikel</h2>

        <p>
            Lihat informasi lengkap mengenai artikel yang telah dibuat.
        </p>

    </div>

    <div class="article-card">

        @if($article->thumbnail)

            <img
                src="{{ asset('storage/'.$article->thumbnail) }}"
                class="article-image"
                alt="{{ $article->title }}">

        @endif

        <div class="article-body">

            <h1 class="title">
                {{ $article->title }}
            </h1>

            <div class="info">

                <span class="badge-info">
                    📂 {{ $article->category->name }}
                </span>

                <span class="badge-info">
                    👤 {{ $article->user->name }}
                </span>

                <span class="badge-info">
                    📅 {{ $article->created_at->format('d F Y') }}
                </span>

                <span class="badge-info status">

                    @if($article->status == 'published')
                        ✅ Published
                    @else
                        📝 Draft
                    @endif

                </span>

            </div>

            <hr style="border-color:#F3E2D7;">

            <div class="content">

                {!! nl2br(e($article->content)) !!}

            </div>

            <div class="text-end mt-5">

                <a href="{{ route('articles.index') }}"
                   class="btn btn-back">

                    ← Kembali

                </a>

            </div>

        </div>

    </div>

</div>

@endsection