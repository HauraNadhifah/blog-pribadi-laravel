@extends('layouts.app')

@section('content')

<style>

body{
    background:#FFFDF9;
    font-family:'Segoe UI',sans-serif;
}

/* ================= HERO ================= */

.hero{

    background:linear-gradient(135deg,#FFE8D8,#FFF8F2,#EAF8F1);
    border-radius:30px;
    padding:45px 50px;
    margin-bottom:35px;
    position:relative;
    overflow:hidden;
    box-shadow:0 15px 35px rgba(0,0,0,.08);

}

.hero::before{

    content:'';
    position:absolute;
    width:220px;
    height:220px;
    background:#FFD7C4;
    border-radius:50%;
    right:-70px;
    top:-70px;
    opacity:.7;

}

.hero::after{

    content:'';
    position:absolute;
    width:150px;
    height:150px;
    background:#DDF7E8;
    border-radius:50%;
    left:-40px;
    bottom:-40px;

}

.hero-content{

    position:relative;
    z-index:2;

}

.hero-top{

    display:flex;
    justify-content:space-between;
    align-items:flex-start;
    flex-wrap:wrap;

}

.hero-left h2{

    font-size:48px;
    font-weight:700;
    color:#5A4636;
    margin-bottom:10px;

}

.hero-left p{

    color:#666;
    font-size:18px;
    max-width:650px;
    line-height:1.8;

}

.hero-date{

    text-align:right;

}

.hero-date h6{

    margin:0;
    font-size:20px;
    font-weight:700;
    color:#5A4636;

}

.hero-date span{

    color:#888;
    font-size:15px;

}

.hero-btn{

    margin-top:28px;

}

.btn-article{

    background:#FFB585;
    color:white;
    border:none;
    border-radius:30px;
    padding:12px 26px;
    font-weight:600;

}

.btn-article:hover{

    background:#F59F67;
    color:white;

}

.btn-category{

    background:#DDF6E8;
    color:#35654D;
    border:none;
    border-radius:30px;
    padding:12px 26px;
    font-weight:600;
    margin-left:10px;

}

.btn-category:hover{

    background:#CBEBD8;
    color:#35654D;

}

</style>

<div class="container py-4">

<div class="hero">

<div class="hero-content">

<div class="hero-top">

<div class="hero-left">

<h2>

👋 Halo, {{ Auth::user()->name }}

</h2>

<p>

Selamat datang kembali di Dashboard Blog Pribadi.
Kelola artikel dan kategori Anda dengan mudah melalui dashboard yang modern dan nyaman digunakan.

</p>

</div>

<div class="hero-date">

<h6>

☀ {{ \Carbon\Carbon::now()->locale('id')->translatedFormat('l') }}

</h6>

<span>

{{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}

</span>

</div>

</div>

<div class="hero-btn">

<a href="{{ route('articles.create') }}" class="btn btn-article">

➕ Tambah Artikel

</a>

<a href="{{ route('categories.create') }}" class="btn btn-category">

📂 Tambah Kategori

</a>

</div>

</div>

</div>
<!-- ================= STATISTIK ================= -->

@php

$totalArtikel = \App\Models\Article::where('user_id', auth()->id())->count();

$totalKategori = \App\Models\Category::where('user_id', auth()->id())->count();

$totalPublished = \App\Models\Article::where('user_id', auth()->id())
    ->where('status','published')
    ->count();

$totalDraft = \App\Models\Article::where('user_id', auth()->id())
    ->where('status','draft')
    ->count();

@endphp

<style>

/* ================= STAT CARD ================= */

.stat-card{

    background:white;
    border:none;
    border-radius:24px;
    padding:22px;
    display:flex;
    align-items:center;
    justify-content:space-between;
    box-shadow:0 10px 25px rgba(0,0,0,.06);
    transition:.3s;
    height:100%;

}

.stat-card:hover{

    transform:translateY(-6px);

}

.stat-left{

    display:flex;
    align-items:center;
    gap:18px;

}

.stat-icon{

    width:65px;
    height:65px;
    border-radius:18px;
    display:flex;
    justify-content:center;
    align-items:center;
    font-size:28px;

}

.icon-orange{

    background:#FFF2E8;

}

.icon-green{

    background:#EAF8EF;

}

.icon-blue{

    background:#EEF6FF;

}

.icon-yellow{

    background:#FFF8DF;

}

.stat-info h2{

    margin:0;
    font-size:34px;
    font-weight:700;
    color:#5A4636;

}

.stat-info p{

    margin:3px 0 0;
    color:#777;
    font-size:15px;

}

</style>

<div class="row g-4 mb-4">

    <div class="col-lg-3 col-md-6">

        <div class="stat-card">

            <div class="stat-left">

                <div class="stat-icon icon-orange">

                    📝

                </div>

                <div class="stat-info">

                    <h2>{{ $totalArtikel }}</h2>

                    <p>Total Artikel</p>

                </div>

            </div>

        </div>

    </div>

    <div class="col-lg-3 col-md-6">

        <div class="stat-card">

            <div class="stat-left">

                <div class="stat-icon icon-green">

                    📂

                </div>

                <div class="stat-info">

                    <h2>{{ $totalKategori }}</h2>

                    <p>Total Kategori</p>

                </div>

            </div>

        </div>

    </div>

    <div class="col-lg-3 col-md-6">

        <div class="stat-card">

            <div class="stat-left">

                <div class="stat-icon icon-blue">

                    🌍

                </div>

                <div class="stat-info">

                    <h2>{{ $totalPublished }}</h2>

                    <p>Published</p>

                </div>

            </div>

        </div>

    </div>

    <div class="col-lg-3 col-md-6">

        <div class="stat-card">

            <div class="stat-left">

                <div class="stat-icon icon-yellow">

                    📄

                </div>

                <div class="stat-info">

                    <h2>{{ $totalDraft }}</h2>

                    <p>Draft</p>

                </div>

            </div>

        </div>

    </div>

</div>
@php

$latestArticles = \App\Models\Article::where('user_id', auth()->id())
                    ->latest()
                    ->take(5)
                    ->get();

$published = \App\Models\Article::where('user_id', auth()->id())
                ->where('status','published')
                ->count();

$draft = \App\Models\Article::where('user_id', auth()->id())
            ->where('status','draft')
            ->count();

$total = max($published + $draft,1);

$progress = round(($published/$total)*100);

@endphp

<style>

/* ================= CONTENT CARD ================= */

.content-card{

    background:white;
    border-radius:25px;
    padding:28px;
    box-shadow:0 10px 25px rgba(0,0,0,.06);

}

.content-title{

    font-size:22px;
    font-weight:700;
    color:#5A4636;
    margin-bottom:20px;

}

/* ================= ARTICLE ================= */

.article-item{

    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:18px;
    border-radius:18px;
    background:#FFFDFB;
    border:1px solid #F6EEE8;
    margin-bottom:15px;
    transition:.3s;

}

.article-item:hover{

    background:#FFF4EC;
    transform:translateX(5px);

}

.article-title{

    font-weight:600;
    color:#5A4636;
    margin-bottom:4px;

}

.article-date{

    color:#888;
    font-size:14px;

}

.badge-status{

    padding:8px 16px;
    border-radius:25px;
    font-size:13px;
    font-weight:600;

}

.badge-publish{

    background:#E8F7EE;
    color:#2F7A4D;

}

.badge-draft{

    background:#FFF2D8;
    color:#B7791F;

}

/* ================= SIDEBAR ================= */

.side-card{

    background:white;
    border-radius:25px;
    padding:25px;
    box-shadow:0 10px 25px rgba(0,0,0,.06);
    margin-bottom:20px;

}

.progress{

    height:12px;
    border-radius:30px;
    background:#F2F2F2;

}

.progress-bar{

    background:#FFB585;
    border-radius:30px;

}

.calendar{

    font-size:40px;
    text-align:center;

}

.calendar h5{

    margin-top:10px;
    color:#5A4636;
    font-weight:700;

}

.calendar p{

    color:#777;
    margin:0;

}

</style>

<div class="row">

    <!-- Artikel Terbaru -->

    <div class="col-lg-8">

        <div class="content-card">

            <div class="d-flex justify-content-between align-items-center mb-3">

                <h4 class="content-title">

                    📰 Artikel Terbaru

                </h4>

                <a href="{{ route('articles.index') }}">

                    Lihat Semua →

                </a>

            </div>

            @forelse($latestArticles as $article)

            <div class="article-item">

                <div>

                    <div class="article-title">

                        {{ $article->title }}

                    </div>

                    <div class="article-date">

                        {{ $article->created_at->format('d M Y') }}

                    </div>

                </div>

                @if($article->status=='published')

                    <span class="badge-status badge-publish">

                        Published

                    </span>

                @else

                    <span class="badge-status badge-draft">

                        Draft

                    </span>

                @endif

            </div>

            @empty

                <div class="text-center py-5 text-muted">

                    Belum ada artikel.

                </div>

            @endforelse

        </div>

    </div>

    <!-- Sidebar -->

    <div class="col-lg-4">

        <div class="side-card">

            <h5 class="mb-3">

                📊 Progress Blog

            </h5>

            <div class="progress mb-3">

                <div class="progress-bar"
                     style="width:{{ $progress }}%">

                </div>

            </div>

            <strong>{{ $progress }}%</strong>

            <p class="text-muted mb-1">

                Published : {{ $published }}

            </p>

            <p class="text-muted">

                Draft : {{ $draft }}

            </p>

        </div>
<div class="card shadow-sm border-0 rounded-4 mt-4"
style="
background:linear-gradient(135deg,#FFF3E9,#FFFDF8);
overflow:hidden;
position:relative;
min-height:260px;
">

    <div style="
    position:absolute;
    width:150px;
    height:150px;
    background:#FFE0C8;
    border-radius:50%;
    top:-60px;
    right:-50px;
    opacity:.7;"></div>

    <div style="
    position:absolute;
    width:100px;
    height:100px;
    background:#DDF5E5;
    border-radius:50%;
    bottom:-30px;
    left:-30px;"></div>

    <div class="card-body p-4 position-relative">

        <h5 class="fw-bold mb-4">
            💡 Inspirasi Hari Ini
        </h5>

        <div style="
        font-size:55px;
        color:#FFB07A;
        line-height:1;">
            
        </div>

        <p style="
        font-size:20px;
        line-height:1.8;
        color:#5F4A3B;
        font-style:italic;
        margin-top:-10px;">

            Setiap artikel yang kamu tulis adalah investasi ilmu.
            Terus berkarya, terus berbagi, karena tulisan sederhana
            hari ini bisa menjadi manfaat besar bagi orang lain di masa depan.
                                                                                
        </p>

        <div class="mt-4 text-end">

            <span style="
            background:#FFE9D7;
            color:#A66B42;
            padding:8px 18px;
            border-radius:30px;
            font-size:14px;
            font-weight:600;">

                ✍️ Blog Pribadi

            </span>

        </div>

    </div>

</div>

    </div>
</div>

    </div>

</div>
<!-- ================= QUICK ACTION & TIPS ================= -->

<style>

/* ================= BOTTOM CARD ================= */

.bottom-card{

    background:white;
    border-radius:25px;
    padding:30px;
    box-shadow:0 10px 25px rgba(0,0,0,.06);
    height:100%;

}

.bottom-title{

    font-size:22px;
    font-weight:700;
    color:#5A4636;
    margin-bottom:20px;

}

/* QUICK ACTION */

.quick-btn{

    display:flex;
    align-items:center;
    gap:15px;
    padding:18px 22px;
    background:#FFF8F3;
    border-radius:18px;
    text-decoration:none;
    color:#5A4636;
    margin-bottom:15px;
    transition:.3s;

}

.quick-btn:hover{

    background:#FFECDD;
    color:#5A4636;
    transform:translateX(6px);

}

.quick-icon{

    width:55px;
    height:55px;
    border-radius:16px;
    background:white;
    display:flex;
    justify-content:center;
    align-items:center;
    font-size:24px;

}

/* TIPS */

.tip-box{

    background:#FFF7EF;
    border-left:6px solid #FFB585;
    border-radius:18px;
    padding:18px;
    margin-bottom:15px;

}

.tip-box h6{

    color:#5A4636;
    font-weight:700;
    margin-bottom:8px;

}

.tip-box p{

    color:#666;
    margin:0;
    line-height:1.7;

}

</style>

<div class="row mt-4">

    <!-- Quick Action -->

    <div class="col-lg-6 mb-4">

        <div class="bottom-card">

            <h4 class="bottom-title">

                ⚡ Quick Action

            </h4>

            <a href="{{ route('articles.create') }}" class="quick-btn">

                <div class="quick-icon">

                    📝

                </div>

                <div>

                    <strong>Buat Artikel Baru</strong><br>

                    <small class="text-muted">

                        Tulis artikel baru untuk blog Anda.

                    </small>

                </div>

            </a>

            <a href="{{ route('categories.create') }}" class="quick-btn">

                <div class="quick-icon">

                    📂

                </div>

                <div>

                    <strong>Tambah Kategori</strong><br>

                    <small class="text-muted">

                        Kelompokkan artikel agar lebih rapi.

                    </small>

                </div>

            </a>

            <a href="{{ route('articles.index') }}" class="quick-btn">

                <div class="quick-icon">

                    📚

                </div>

                <div>

                    <strong>Kelola Artikel</strong><br>

                    <small class="text-muted">

                        Edit atau hapus artikel yang telah dibuat.

                    </small>

                </div>

            </a>

        </div>

    </div>

    <!-- Tips -->

    <div class="col-lg-6 mb-4">

        <div class="bottom-card">

            <h4 class="bottom-title">

                💡 Tips Menulis

            </h4>

            <div class="tip-box">

                <h6>Gunakan Judul yang Menarik</h6>

                <p>

                    Judul yang jelas dan menarik akan membuat pembaca
                    lebih tertarik membuka artikel Anda.

                </p>

            </div>

            <div class="tip-box">

                <h6>Tambahkan Thumbnail</h6>

                <p>

                    Artikel dengan gambar thumbnail terlihat lebih profesional
                    dan meningkatkan daya tarik pembaca.

                </p>

            </div>

            <div class="tip-box">

                <h6>Pilih Kategori yang Tepat</h6>

                <p>

                    Gunakan kategori yang sesuai agar artikel mudah ditemukan
                    dan blog lebih terstruktur.

                </p>

            </div>

        </div>

    </div>

</div>

</div>

@endsection