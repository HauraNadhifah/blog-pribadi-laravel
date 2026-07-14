@extends('layouts.app')

@section('content')

<style>

body{

    background:#FFFDF8;
    font-family:'Segoe UI',sans-serif;

}

/* ================= HEADER ================= */

.article-header{

    background:linear-gradient(135deg,#FFE7D6,#FFF8F2,#EAF7EF);
    border-radius:28px;
    padding:40px;
    position:relative;
    overflow:hidden;
    margin-bottom:30px;
    box-shadow:0 15px 35px rgba(0,0,0,.08);

}

.article-header::before{

    content:'';
    width:180px;
    height:180px;
    background:#FFD8C6;
    position:absolute;
    top:-60px;
    right:-60px;
    border-radius:50%;
    opacity:.7;

}

.article-header::after{

    content:'';
    width:130px;
    height:130px;
    background:#DDF8E8;
    position:absolute;
    left:-40px;
    bottom:-40px;
    border-radius:50%;

}

.article-header h2{

    font-size:52px;
    color:#5A4636;
    font-weight:700;
    position:relative;
    z-index:2;

}

.article-header p{

    color:#666;
    font-size:19px;
    position:relative;
    z-index:2;

}

/* ================= CARD ================= */

.main-card{

    background:white;
    border-radius:25px;
    padding:30px;
    box-shadow:0 12px 30px rgba(0,0,0,.08);

}

/* ================= SEARCH ================= */

.search-box{

    border-radius:40px;
    border:1px solid #F3DCCB;
    padding:12px 20px;

}

.search-box:focus{

    border-color:#FFB789;
    box-shadow:0 0 0 .2rem rgba(255,183,137,.15);

}

/* ================= BUTTON ================= */

.btn-add{

    background:#FFB585;
    color:white;
    border:none;
    border-radius:40px;
    padding:12px 24px;
    font-weight:600;

}

.btn-add:hover{

    background:#F79F66;
    color:white;

}

.btn-detail{

    background:#C8E8FF;
    border:none;
    border-radius:30px;

}

.btn-edit{

    background:#FFE29D;
    border:none;
    border-radius:30px;

}

.btn-delete{

    background:#FFD1D1;
    border:none;
    border-radius:30px;

}

.btn-detail:hover{

    background:#A8DAFF;

}

.btn-edit:hover{

    background:#FFD16C;

}

.btn-delete:hover{

    background:#FFB4B4;

}
/* ================= TABLE ================= */

.table{

    border-collapse:separate;
    border-spacing:0 12px;

}

.table thead th{

    background:#FFEBDD;
    color:#5A4636;
    border:none;
    text-align:center;
    padding:16px;
    font-weight:700;

}

.table tbody tr{

    background:white;
    transition:.25s;
    box-shadow:0 6px 18px rgba(0,0,0,.05);

}

.table tbody tr:hover{

    transform:translateY(-3px);

}

.table td{

    border:none;
    vertical-align:middle;
    text-align:center;
    padding:18px;

}

.thumb{

    width:95px;
    height:70px;
    border-radius:12px;
    object-fit:cover;

}

.badge-category{

    background:#EEF9F2;
    color:#43845D;
    padding:8px 18px;
    border-radius:30px;
    font-size:14px;
    font-weight:600;

}

.badge-status{

    padding:8px 18px;
    border-radius:30px;
    font-size:13px;
    font-weight:600;

}

.publish{

    background:#DDF7E5;
    color:#2E7D32;

}

.draft{

    background:#FFF2CC;
    color:#AF7600;

}

</style>

<div class="container py-4">

<div class="article-header">

<div class="d-flex justify-content-between align-items-center">

<div>

<h2>📝 Kelola Artikel</h2>

<p>

Kelola seluruh artikel blog Anda dengan mudah.

</p>

</div>

<a href="{{ route('articles.create') }}" class="btn btn-add">

➕ Tambah Artikel

</a>

</div>

</div>

@if(session('success'))

<div class="alert alert-success rounded-4 shadow-sm">

{{ session('success') }}

</div>

@endif

<div class="main-card">

<div class="row mb-4">

<div class="col-md-8">

<input
type="text"
id="searchArticle"
class="form-control search-box"
placeholder="🔍 Cari artikel...">

</div>

<div class="col-md-4">

<select
id="filterStatus"
class="form-select search-box">

<option value="">Semua Status</option>

<option value="published">Published</option>

<option value="draft">Draft</option>

</select>

</div>

</div>

<table class="table align-middle">

<thead>

<tr>

<th>Thumbnail</th>

<th class="text-start">Judul Artikel</th>

<th>Kategori</th>

<th>Status</th>

<th>Dibuat</th>

<th width="220">

Aksi

</th>

</tr>

</thead>

<tbody>

@forelse($articles as $article)
<tr>

<td>

@if($article->thumbnail)

<img
src="{{ asset('storage/'.$article->thumbnail) }}"
class="thumb"
alt="{{ $article->title }}">

@else

<div style="
width:95px;
height:70px;
background:#F7F7F7;
border-radius:12px;
display:flex;
align-items:center;
justify-content:center;
margin:auto;
font-size:28px;">

🖼️

</div>

@endif

</td>

<td class="text-start">

<div style="font-weight:700;font-size:17px;color:#5A4636;">

{{ $article->title }}

</div>

<div class="text-muted mt-1" style="font-size:13px;">

{{ Str::limit(strip_tags($article->content),70) }}

</div>

</td>

<td>

<span class="badge-category">

📂 {{ $article->category->name }}

</span>

</td>

<td>

@if($article->status=='published')

<span class="badge-status publish">

✔ Published

</span>

@else

<span class="badge-status draft">

📝 Draft

</span>

@endif

</td>

<td>

{{ $article->created_at->format('d M Y') }}

</td>

<td>

<a
href="{{ route('articles.show',$article->id) }}"
class="btn btn-detail btn-sm">

👁 Detail

</a>

<a
href="{{ route('articles.edit',$article->id) }}"
class="btn btn-edit btn-sm">

✏ Edit

</a>

<form
action="{{ route('articles.destroy',$article->id) }}"
method="POST"
class="d-inline">

@csrf
@method('DELETE')

<button
type="submit"
class="btn btn-delete btn-sm"
onclick="return confirm('Yakin ingin menghapus artikel ini?')">

🗑 Hapus

</button>

</form>

</td>

</tr>
@empty

<tr>

<td colspan="6">

<div class="text-center py-5">

<div style="font-size:65px;">

📝

</div>

<h4 class="mt-3">

Belum Ada Artikel

</h4>

<p class="text-muted">

Silakan tambahkan artikel pertama Anda.

</p>

<a
href="{{ route('articles.create') }}"
class="btn btn-add mt-3">

➕ Tambah Artikel

</a>

</div>

</td>

</tr>

@endforelse

</tbody>

</table>

</div>

</div>

<script>

// SEARCH
document.getElementById('searchArticle').addEventListener('keyup',function(){

let keyword=this.value.toLowerCase();

document.querySelectorAll('tbody tr').forEach(function(row){

row.style.display=row.innerText.toLowerCase().includes(keyword)
? ''
: 'none';

});

});

// FILTER STATUS

document.getElementById('filterStatus').addEventListener('change',function(){

let status=this.value.toLowerCase();

document.querySelectorAll('tbody tr').forEach(function(row){

if(status===''){

row.style.display='';

}else{

row.style.display=row.innerText.toLowerCase().includes(status)
? ''
: 'none';

}

});

});

</script>

@endsection