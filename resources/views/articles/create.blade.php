@extends('layouts.app')

@section('content')

<style>

body{
    background:#FFF9F6;
    font-family:'Segoe UI',sans-serif;
}

/* ================= HERO ================= */

.hero{
    background:linear-gradient(135deg,#FFE8DA,#FFF7F2,#E9F8F3);
    border-radius:30px;
    padding:50px;
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
    font-size:42px;
    font-weight:700;
    color:#5E4434;
}

.hero p{
    position:relative;
    z-index:2;
    font-size:18px;
    color:#6B6B6B;
    margin-top:10px;
}

/* ================= CARD ================= */

.form-card{

    background:#fff;
    border:none;
    border-radius:28px;
    padding:40px;
    box-shadow:0 15px 35px rgba(0,0,0,.08);

}

/* ================= LABEL ================= */

.form-label{

    font-weight:600;
    color:#5F5147;
    margin-bottom:8px;
    font-size:16px;

}

/* ================= INPUT ================= */

.form-control,
.form-select{

    border-radius:16px;
    border:1px solid #F3D7CB;
    padding:14px;
    transition:.3s;

}

.form-control:focus,
.form-select:focus{

    border-color:#F5B489;
    box-shadow:0 0 0 .2rem rgba(245,180,137,.18);

}

textarea{

    resize:none;

}

/* ================= BUTTON ================= */

.btn-save{

    background:#F5B489;
    color:white;
    border:none;
    border-radius:40px;
    padding:12px 28px;
    font-weight:600;

}

.btn-save:hover{

    background:#EC9A68;
    color:white;

}

.btn-back{

    background:#DDF4E7;
    color:#46755B;
    border:none;
    border-radius:40px;
    padding:12px 28px;
    font-weight:600;

}

.btn-back:hover{

    background:#CAE8D8;
    color:#2F5A46;

}

.preview{

    width:220px;
    margin-top:15px;
    border-radius:18px;
    display:none;
    box-shadow:0 10px 20px rgba(0,0,0,.12);

}

.alert{

    border-radius:18px;

}

</style>

<div class="container py-5">

<div class="hero">

<h2>📝 Tambah Artikel Baru</h2>

<p>
Lengkapi informasi artikel yang akan dipublikasikan.
Mulailah berbagi cerita, tutorial, ataupun informasi menarik untuk pembaca.
</p>

</div>

@if($errors->any())

<div class="alert alert-danger">

<ul class="mb-0">

@foreach($errors->all() as $error)

<li>{{ $error }}</li>

@endforeach

</ul>

</div>

@endif

<div class="form-card">

<form action="{{ route('articles.store') }}"
method="POST"
enctype="multipart/form-data">

@csrf

<div class="mb-4">

<label class="form-label">

📖 Judul Artikel

</label>

<input
type="text"
name="title"
class="form-control"
placeholder="Masukkan judul artikel..."
value="{{ old('title') }}"
required>

</div>

<div class="mb-4">

<label class="form-label">

📂 Kategori

</label>

<select
name="category_id"
class="form-select"
required>

<option value="">-- Pilih Kategori --</option>

@foreach($categories as $category)

<option
value="{{ $category->id }}"
{{ old('category_id')==$category->id ? 'selected':'' }}>

{{ $category->name }}

</option>

@endforeach

</select>

</div>
<div class="mb-4">

<label class="form-label">

📝 Isi Artikel

</label>

<textarea
name="content"
rows="8"
class="form-control"
placeholder="Tulis isi artikel di sini..."
required>{{ old('content') }}</textarea>

</div>

<div class="mb-4">

<label class="form-label">

🖼 Thumbnail

</label>

<input
type="file"
name="thumbnail"
class="form-control"
accept="image/*"
onchange="previewImage(event)">

<img
id="preview"
class="preview">

</div>

<div class="mb-4">

<label class="form-label">

📌 Status Artikel

</label>

<select
name="status"
class="form-select"
required>

<option
value="draft"
{{ old('status')=='draft' ? 'selected' : '' }}>

Draft

</option>

<option
value="published"
{{ old('status')=='published' ? 'selected' : '' }}>

Published

</option>

</select>

</div>

<div class="d-flex gap-3 mt-4">

<button
type="submit"
class="btn btn-save">

💾 Simpan Artikel

</button>

<a
href="{{ route('articles.index') }}"
class="btn btn-back">

← Kembali

</a>

</div>
<script>

function previewImage(event){

    const preview = document.getElementById('preview');

    preview.src = URL.createObjectURL(event.target.files[0]);

    preview.style.display = "block";

}

</script>

</form>

</div>

</div>

@endsection