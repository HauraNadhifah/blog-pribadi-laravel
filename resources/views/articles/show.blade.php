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
/* ================= KOMENTAR ================= */

.comment-box{
    margin-top:50px;
    border-top:2px solid #F6E6DD;
    padding-top:40px;
}

.comment-title{
    font-size:28px;
    font-weight:700;
    color:#5B4435;
    margin-bottom:25px;
}

.comment-item{
    background:#FFF8F4;
    border-radius:18px;
    padding:20px;
    margin-bottom:18px;
    border:1px solid #F4E4DA;
}

.comment-name{
    font-weight:700;
    color:#5B4435;
}

.comment-date{
    font-size:13px;
    color:#999;
}

.comment-text{
    margin-top:10px;
    color:#555;
    line-height:1.8;
}

.comment-form{
    margin-top:40px;
    background:#FFFDFB;
    padding:25px;
    border-radius:20px;
    border:1px solid #F3E5DD;
}

.comment-form h4{
    color:#5B4435;
    margin-bottom:20px;
}

.comment-form input,
.comment-form textarea{
    width:100%;
    border:1px solid #E9D8CD;
    border-radius:12px;
    padding:12px 15px;
    margin-bottom:15px;
    outline:none;
}

.comment-form input:focus,
.comment-form textarea:focus{
    border-color:#F4B183;
}

.btn-comment{
    background:#F4B183;
    color:white;
    border:none;
    border-radius:30px;
    padding:12px 28px;
}

.btn-comment:hover{
    background:#EB9866;
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
<!-- ================= KOMENTAR ================= -->

<div class="comment-box">

    <h2 class="comment-title">

        💬 Komentar ({{ $article->comments->count() }})

    </h2>

    @forelse($article->comments as $comment)

        <div class="comment-item">

            <div class="d-flex justify-content-between">

                <div class="comment-name">

                    👤 {{ $comment->name }}

                </div>

                <div class="comment-date">

                    {{ $comment->created_at->format('d M Y H:i') }}

                </div>

            </div>

            <div class="comment-text">

                {{ $comment->comment }}

            </div>

        </div>

    @empty

        <p class="text-muted">

            Belum ada komentar. Jadilah yang pertama memberikan komentar.

        </p>

    @endforelse

    <div class="comment-form">

        <h4>

            Tinggalkan Komentar

        </h4>

        @if(session('success'))

            <div class="alert alert-success">

                {{ session('success') }}

            </div>

        @endif

        <form action="{{ route('comments.store', $article) }}" method="POST">

            @csrf

            <input
                type="text"
                name="name"
                placeholder="Nama"
                required>

            <input
                type="email"
                name="email"
                placeholder="Email"
                required>

            <textarea
                name="comment"
                rows="5"
                placeholder="Tulis komentar..."
                required></textarea>

            <button
                type="submit"
                class="btn btn-comment">

                Kirim Komentar

            </button>

        </form>

    </div>

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