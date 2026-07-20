@extends('layouts.app')

@section('content')

<style>

body{
    background:linear-gradient(180deg,#FFFDFB,#FFF9F5,#F7F6F2);
    font-family:'Poppins',sans-serif;
}

/* HERO */

.hero{

    background:linear-gradient(135deg,#FFF5EC,#FFE3D3,#EDF7ED);
    border-radius:45px;
    padding:90px 60px;
    text-align:center;
    position:relative;
    overflow:hidden;
    margin-bottom:60px;
    box-shadow:0 20px 45px rgba(0,0,0,.08);

}

.hero::before{

    content:'';
    width:250px;
    height:250px;
    border-radius:50%;
    background:#FFD9C8;
    position:absolute;
    top:-80px;
    right:-80px;

}

.hero::after{

    content:'';
    width:180px;
    height:180px;
    border-radius:50%;
    background:#DDEFD8;
    position:absolute;
    left:-60px;
    bottom:-60px;

}

.hero h1{

    font-size:58px;
    color:#5B4432;
    font-weight:700;
    position:relative;
    z-index:2;

}

.hero p{

    color:#666;
    font-size:19px;
    margin-top:15px;
    position:relative;
    z-index:2;

}

/* SEARCH */

.search-box{

    background:white;
    border-radius:30px;
    padding:30px;
    margin-top:-35px;
    margin-bottom:60px;
    position:relative;
    z-index:10;
    box-shadow:0 15px 35px rgba(0,0,0,.08);

}

.form-control,
.form-select{

    border-radius:18px;
    border:1px solid #EFE5DA;
    height:55px;

}

.form-control:focus,
.form-select:focus{

    box-shadow:none;
    border-color:#F2B38B;

}

.btn-blog{

    width:100%;
    height:55px;
    border:none;
    border-radius:18px;
    background:#F4B183;
    color:white;
    font-weight:600;
    transition:.3s;

}

.btn-blog:hover{

    background:#E79C6B;
    color:white;

}

/* CARD */

.blog-card{

    border:none;
    border-radius:40px 15px 40px 15px;
    overflow:hidden;
    background:white;
    box-shadow:0 15px 35px rgba(0,0,0,.08);
    transition:.4s;
    height:100%;

}

.blog-card:hover{

    transform:translateY(-12px);

    box-shadow:0 25px 45px rgba(0,0,0,.15);

}

.blog-card img{

    width:100%;
    height:250px;
    object-fit:cover;

}

.card-body{

    padding:30px;

}

.title{

    color:#594431;
    font-size:28px;
    font-weight:700;
    margin-bottom:18px;

}

.info{

    display:flex;
    flex-wrap:wrap;
    gap:10px;
    margin-bottom:20px;

}

.info span{

    background:#FFF3E8;
    color:#8A654F;
    padding:8px 18px;
    border-radius:50px;
    font-size:13px;

}

.card-text{

    color:#666;
    line-height:1.9;
    margin-bottom:25px;

}

.read-btn{

    display:inline-block;
    padding:12px 28px;
    background:#F4B183;
    color:white;
    text-decoration:none;
    border-radius:40px;
    transition:.3s;

}

.read-btn:hover{

    background:#E79C6B;
    color:white;

}

.alert{

    border-radius:25px;

}

</style>

<div class="container py-5">

<div class="hero">

<h1>✨ Blog Pribadi</h1>

<p>

Temukan berbagai artikel menarik seputar teknologi, pendidikan, kesehatan, keuangan, gaya hidup, serta informasi terbaru yang dapat menambah wawasan dan inspirasi Anda.

</p>

</div>

<div class="search-box">

<form action="{{ route('blog.index') }}" method="GET">

<div class="row g-3">

<div class="col-lg-5">

<input
type="text"
name="search"
class="form-control"
placeholder="🔍 Cari artikel..."
value="{{ request('search') }}">

</div>

<div class="col-lg-4">

<select
name="category"
class="form-select">

<option value="">

Semua Kategori

</option>

@foreach($categories as $category)

<option
value="{{ $category->id }}"
{{ request('category')==$category->id ? 'selected':'' }}>

{{ $category->name }}

</option>

@endforeach

</select>

</div>

<div class="col-lg-3">

<button class="btn-blog">

Cari Artikel

</button>

</div>

</div>

</form>

</div>

<div class="row">
    @forelse($articles as $article)

<div class="col-lg-6 col-xl-4 mb-4">

    <div class="card blog-card">

        @if($article->thumbnail)

        <img
            src="{{ asset('storage/'.$article->thumbnail) }}"
            alt="{{ $article->title }}">

        @else

        <img
            src="https://picsum.photos/700/450?random={{ $article->id }}"
            alt="Thumbnail">

        @endif

        <div class="card-body">

            <h3 class="title">

                {{ $article->title }}

            </h3>

            <div class="info">

                <span>

                    👤 {{ $article->user->name }}

                </span>

                <span>

                    📂 {{ $article->category->name }}

                </span>

                <span>

                    📅 {{ $article->created_at->format('d M Y') }}

                </span>

            </div>

            <p class="card-text">

                {{ Str::limit(strip_tags($article->content),150) }}

            </p>

            <a
                href="{{ route('blog.show',$article->slug) }}"
                class="read-btn">

                Baca Selengkapnya →

            </a>

        </div>

    </div>

</div>

@empty

<div class="col-12">

    <div class="alert alert-warning text-center p-5">

        <h4 class="mb-2">

            Belum Ada Artikel

        </h4>

        <p class="mb-0">

            Artikel yang dipublikasikan akan muncul di halaman ini.

        </p>

    </div>

</div>

@endforelse

</div>

<!-- Footer -->

<div class="mt-5">

    <div
        style="
        background:#FFF5EC;
        border-radius:35px;
        padding:35px;
        text-align:center;
        box-shadow:0 10px 25px rgba(0,0,0,.05);
        ">

        <h4
            style="
            color:#6A4E3B;
            font-weight:700;
            ">

            Blog Pribadi

        </h4>

        <p
            style="
            color:#777;
            margin-bottom:0;
            ">

            © {{ date('Y') }} Blog Pribadi • Dibuat dengan Laravel

        </p>

    </div>

</div>

</div>

@endsection