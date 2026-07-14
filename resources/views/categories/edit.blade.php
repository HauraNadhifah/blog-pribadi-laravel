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
    opacity:.7;
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
    font-size:42px;
    font-weight:700;
    color:#5A4232;
}

.hero p{
    position:relative;
    z-index:2;
    color:#666;
    font-size:18px;
}

/* CARD */

.form-card{
    background:#fff;
    border:none;
    border-radius:25px;
    padding:35px;
    box-shadow:0 15px 35px rgba(0,0,0,.08);
}

/* LABEL */

.form-label{
    font-weight:600;
    color:#654F44;
    margin-bottom:8px;
}

/* INPUT */

.form-control{
    border-radius:16px;
    border:1px solid #F2D8CB;
    padding:14px;
}

.form-control:focus{
    border-color:#F4B183;
    box-shadow:0 0 0 .2rem rgba(244,177,131,.2);
}

textarea{
    resize:none;
}

/* BUTTON */

.btn-update{
    background:#F4B183;
    color:white;
    border:none;
    border-radius:30px;
    padding:12px 28px;
    font-weight:600;
}

.btn-update:hover{
    background:#EB9968;
    color:white;
}

.btn-back{
    background:#DDEFE6;
    color:#426A55;
    border:none;
    border-radius:30px;
    padding:12px 28px;
    font-weight:600;
}

.btn-back:hover{
    background:#CBE6D7;
    color:#2D5541;
}

</style>

<div class="container py-5">

<div class="hero">

<h2>✏️ Edit Kategori</h2>

<p>
Perbarui informasi kategori agar artikel tetap tersusun dengan rapi.
</p>

</div>

<div class="form-card">

<form
action="{{ route('categories.update',$category->id) }}"
method="POST">

@csrf
@method('PUT')

<div class="mb-4">

<label class="form-label">

🏷 Nama Kategori

</label>

<input
type="text"
name="name"
value="{{ old('name',$category->name) }}"
class="form-control"
placeholder="Masukkan nama kategori..."
required>

</div>
        <div class="mb-4">

            <label class="form-label">
                📝 Deskripsi
            </label>

            <textarea
                name="description"
                rows="5"
                class="form-control"
                placeholder="Masukkan deskripsi kategori...">{{ old('description', $category->description) }}</textarea>

        </div>

        <div class="d-flex gap-3 mt-4">

            <button
                type="submit"
                class="btn btn-update">

                💾 Update Kategori

            </button>

            <a
                href="{{ route('categories.index') }}"
                class="btn btn-back">

                ← Kembali

            </a>

        </div>

    </form>

</div>

</div>

@endsection