@extends('layouts.app')

@section('content')

<style>

body{
    background:#FFF9F7;
    font-family:'Segoe UI',sans-serif;
}

/* HERO */

.hero{
    background:linear-gradient(135deg,#FFE8DA,#FFF8F2,#E9F8F4);
    border-radius:28px;
    padding:45px;
    margin-bottom:35px;
    position:relative;
    overflow:hidden;
    box-shadow:0 15px 35px rgba(0,0,0,.08);
}

.hero::before{
    content:"";
    position:absolute;
    width:180px;
    height:180px;
    background:#FFD7C8;
    border-radius:50%;
    top:-70px;
    right:-60px;
    opacity:.6;
}

.hero::after{
    content:"";
    position:absolute;
    width:130px;
    height:130px;
    background:#DDF7E8;
    border-radius:50%;
    bottom:-50px;
    left:-40px;
}

.hero h2{
    position:relative;
    z-index:2;
    font-size:40px;
    font-weight:700;
    color:#5A4232;
}

.hero p{
    position:relative;
    z-index:2;
    font-size:18px;
    color:#6d6d6d;
}

/* CARD */

.form-card{
    background:white;
    border:none;
    border-radius:25px;
    padding:35px;
    box-shadow:0 15px 35px rgba(0,0,0,.08);
}

/* LABEL */

.form-label{
    font-weight:600;
    color:#6B5A50;
    margin-bottom:8px;
}

/* INPUT */

.form-control,
.form-select{
    border-radius:15px;
    border:1px solid #F1D7CB;
    padding:13px;
}

.form-control:focus,
.form-select:focus{
    border-color:#F4B183;
    box-shadow:0 0 0 .2rem rgba(244,177,131,.2);
}

textarea{
    resize:none;
}

.preview-img{
    width:180px;
    border-radius:15px;
    margin-top:10px;
    box-shadow:0 5px 15px rgba(0,0,0,.1);
}

/* BUTTON */

.btn-update{
    background:#F4B183;
    color:white;
    border:none;
    border-radius:30px;
    padding:11px 28px;
    font-weight:600;
}

.btn-update:hover{
    background:#EB9968;
    color:white;
}

.btn-back{
    background:#DDEFE6;
    color:#49745D;
    border:none;
    border-radius:30px;
    padding:11px 28px;
    font-weight:600;
}

.btn-back:hover{
    background:#CBE6D7;
    color:#2F5C47;
}

.alert{
    border-radius:18px;
}

</style>

<div class="container py-5">

<div class="hero">

<h2>✏️ Edit Artikel</h2>

<p>
Perbarui informasi artikel Anda, lalu simpan perubahan agar konten tetap terbaru.
</p>

</div>

@if ($errors->any())

<div class="alert alert-danger">

<ul class="mb-0">

@foreach ($errors->all() as $error)

<li>{{ $error }}</li>

@endforeach

</ul>

</div>

@endif

<div class="form-card">

<form action="{{ route('articles.update',$article->id) }}"
method="POST"
enctype="multipart/form-data">

@csrf
@method('PUT')
<!-- Judul -->

<div class="mb-4">

    <label class="form-label">

        📖 Judul Artikel

    </label>

    <input
        type="text"
        name="title"
        class="form-control"
        value="{{ old('title',$article->title) }}"
        placeholder="Masukkan judul artikel..."
        required>

</div>

<!-- Kategori -->

<div class="mb-4">

    <label class="form-label">

        📂 Kategori

    </label>

    <select
        name="category_id"
        class="form-select"
        required>

        @foreach($categories as $category)

        <option
            value="{{ $category->id }}"
            {{ old('category_id',$article->category_id)==$category->id ? 'selected' : '' }}>

            {{ $category->name }}

        </option>

        @endforeach

    </select>

</div>

<!-- Isi Artikel -->

<div class="mb-4">

    <label class="form-label">

        📝 Isi Artikel

    </label>

    <textarea
        name="content"
        rows="8"
        class="form-control"
        placeholder="Tulis isi artikel di sini..."
        required>{{ old('content',$article->content) }}</textarea>

</div>

<!-- Thumbnail -->

<div class="mb-4">

    <label class="form-label">

        🖼 Thumbnail Baru

    </label>

    <input
        type="file"
        name="thumbnail"
        class="form-control">

    @if($article->thumbnail)

    <div class="mt-3">

        <small class="text-muted d-block mb-2">
            Thumbnail Saat Ini
        </small>

        <img
            src="{{ asset('storage/'.$article->thumbnail) }}"
            class="preview-img">

    </div>

    @endif

</div>

<!-- Status -->

<div class="mb-4">

    <label class="form-label">

        📢 Status Artikel

    </label>

    <select
        name="status"
        class="form-select"
        required>

        <option value="draft"
            {{ old('status',$article->status)=='draft' ? 'selected' : '' }}>

            📝 Draft

        </option>

        <option value="published"
            {{ old('status',$article->status)=='published' ? 'selected' : '' }}>

            ✅ Published

        </option>

    </select>

</div>
<!-- Tombol -->

<div class="d-flex gap-3 mt-4">

    <button
        type="submit"
        class="btn btn-update">

        💾 Update Artikel

    </button>

    <a
        href="{{ route('articles.index') }}"
        class="btn btn-back">

        ← Kembali

    </a>

</div>

</form>

</div>

</div>

@endsection