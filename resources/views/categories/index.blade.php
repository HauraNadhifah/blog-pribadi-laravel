@extends('layouts.app')

@section('content')

<style>
/* ================= ICON ================= */

.category-icon{

    width:55px;
    height:55px;
    border-radius:18px;
    background:#FFF3EA;
    display:flex;
    justify-content:center;
    align-items:center;
    font-size:28px;
    margin:auto;

}

/* ================= SLUG ================= */

.slug{

    background:#EAF8EF;
    color:#2F7A4D;
    padding:8px 16px;
    border-radius:30px;
    font-size:14px;
    font-weight:600;

}

/* ================= ARTICLE ================= */

.article-badge{

    background:#E8F2FF;
    color:#2563EB;
    padding:8px 16px;
    border-radius:30px;
    font-size:14px;
    font-weight:600;

}

/* ================= BUTTON ================= */

.btn-edit{

    background:#BFE3FF;
    color:#234;
    border:none;
    border-radius:25px;
    padding:8px 18px;
    font-weight:600;

}

.btn-edit:hover{

    background:#9ED5FF;
    color:#234;

}

.btn-delete{

    background:#FFD5D5;
    color:#8B3A3A;
    border:none;
    border-radius:25px;
    padding:8px 18px;
    font-weight:600;

}

.btn-delete:hover{

    background:#FFBABA;
    color:#8B3A3A;

}
body{
    background:#FFFDF9;
    font-family:'Segoe UI',sans-serif;
}

/* ================= HERO ================= */

.hero-category{

    background:linear-gradient(135deg,#FFE7D6,#FFF8F2,#EAF8F0);
    border-radius:30px;
    padding:50px;
    margin-bottom:35px;
    position:relative;
    overflow:hidden;
    box-shadow:0 15px 35px rgba(0,0,0,.08);

}

.hero-category::before{

    content:'';
    position:absolute;
    width:220px;
    height:220px;
    background:#FFD7C6;
    border-radius:50%;
    top:-80px;
    right:-70px;
    opacity:.7;

}

.hero-category::after{

    content:'';
    position:absolute;
    width:150px;
    height:150px;
    background:#DDF6E8;
    border-radius:50%;
    left:-40px;
    bottom:-40px;

}

.hero-category h2{

    position:relative;
    z-index:2;
    color:#5A4636;
    font-size:48px;
    font-weight:700;
    margin-bottom:15px;

}

.hero-category p{

    position:relative;
    z-index:2;
    color:#666;
    font-size:18px;
    max-width:700px;
    line-height:1.8;

}

/* ================= STAT CARD ================= */

.stat-card{

    background:white;
    border:none;
    border-radius:25px;
    box-shadow:0 12px 28px rgba(0,0,0,.08);
    transition:.3s;
    padding:25px;
    display:flex;
    align-items:center;
    gap:20px;
    height:100%;

}

.stat-card:hover{

    transform:translateY(-6px);

}

.icon-box{

    width:70px;
    height:70px;
    border-radius:20px;
    background:#FFF3EA;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:34px;

}

.stat-card h3{

    margin:0;
    font-size:36px;
    color:#5A4636;
    font-weight:700;

}

.stat-card p{

    margin:0;
    color:#777;
    font-size:16px;

}

/* ================= TABLE CARD ================= */

.table-card{

    background:white;
    border-radius:25px;
    margin-top:35px;
    padding:30px;
    box-shadow:0 12px 28px rgba(0,0,0,.08);

}

/* ================= SEARCH ================= */

.search-box{

    border-radius:50px;
    border:1px solid #F2DED3;
    padding:13px 20px;

}

.search-box:focus{

    border-color:#FFB98D;
    box-shadow:0 0 0 .2rem rgba(255,185,141,.2);

}

/* ================= BUTTON ================= */

.btn-add{

    background:#FFB585;
    color:white;
    border:none;
    border-radius:50px;
    padding:12px 26px;
    font-weight:600;

}

.btn-add:hover{

    background:#F39C66;
    color:white;

}

/* ================= TABLE ================= */

.table{

    border-collapse:separate;
    border-spacing:0 15px;

}

.table thead th{

    background:#FFE9DC;
    color:#5A4636;
    border:none;
    padding:18px;
    text-align:center;
    font-size:15px;
    font-weight:700;

}

.table tbody tr{

    background:white;
    box-shadow:0 8px 18px rgba(0,0,0,.05);
    transition:.3s;

}

.table tbody tr:hover{

    transform:translateY(-4px);

}

.table tbody td{

    border:none;
    padding:20px;
    vertical-align:middle;
    text-align:center;

}

</style>

<div class="container py-4">

    {{-- HERO --}}
    <div class="hero-category">

        <h2>📂 Kelola Kategori</h2>

        <p>
            Kelola seluruh kategori artikel agar blog Anda lebih
            terstruktur, mudah dikelola, dan terlihat profesional.
        </p>

    </div>

    {{-- ALERT --}}
    @if(session('success'))

        <div class="alert alert-success rounded-4 shadow-sm">

            {{ session('success') }}

        </div>

    @endif

    {{-- STATISTIK --}}
    <div class="row">

        <div class="col-lg-4 mb-4">

            <div class="stat-card">

                <div class="icon-box">
                    📂
                </div>

                <div>

                    <h3>{{ $categories->count() }}</h3>

                    <p>Total Kategori</p>

                </div>

            </div>

        </div>

        <div class="col-lg-4 mb-4">

            <div class="stat-card">

                <div class="icon-box">
                    📝
                </div>

                <div>

                    <h3>{{ \App\Models\Article::where('user_id',auth()->id())->count() }}</h3>

                    <p>Total Artikel</p>

                </div>

            </div>

        </div>

        <div class="col-lg-4 mb-4">

            <div class="stat-card">

                <div class="icon-box">
                    ⭐
                </div>

                <div>

                    <h3>

                        {{ $categories->count() ? $categories->last()->name : '-' }}

                    </h3>

                    <p>Kategori Terbaru</p>

                </div>

            </div>

        </div>

    </div>

    {{-- CARD TABEL --}}
    <div class="table-card">

        <div class="row align-items-center mb-4">

            <div class="col-md-5">

                <input
                    type="text"
                    id="searchKategori"
                    class="form-control search-box"
                    placeholder="🔍 Cari kategori...">

            </div>

            <div class="col text-end">

                <a href="{{ route('categories.create') }}"
                   class="btn btn-add">

                    ➕ Tambah Kategori

                </a>

            </div>

        </div>
                <table class="table align-middle">

            <thead>

                <tr>

                    <th width="70">No</th>

                    <th width="90">Icon</th>

                    <th>Nama Kategori</th>

                    <th>Slug</th>

                    <th>Deskripsi</th>

                    <th width="120">Artikel</th>

                    <th width="170">Aksi</th>

                </tr>

            </thead>

            <tbody>

                @forelse($categories as $category)

                <tr>

                    <td>

                        <strong>{{ $loop->iteration }}</strong>

                    </td>

                    <td>

                        <div class="category-icon">

                            @switch(strtolower($category->name))

                                @case('teknologi')
                                    💻
                                    @break

                                @case('pendidikan')
                                    🎓
                                    @break

                                @case('kesehatan')
                                    🏥
                                    @break

                                @case('keuangan')
                                    💰
                                    @break

                                @case('kuliner')
                                    🍔
                                    @break

                                @case('travel')
                                    ✈️
                                    @break

                                @case('olahraga')
                                    ⚽
                                    @break

                                @case('musik')
                                    🎵
                                    @break

                                @default
                                    📂

                            @endswitch

                        </div>

                    </td>

                    <td class="text-start">

                        <strong>

                            {{ $category->name }}

                        </strong>

                    </td>

                    <td>

                        <span class="slug">

                            {{ $category->slug }}

                        </span>

                    </td>

                    <td class="text-start">

                        {{ $category->description }}

                    </td>

                    <td>

                        <span class="article-badge">

                            {{ \App\Models\Article::where('category_id',$category->id)->count() }}

                            Artikel

                        </span>

                    </td>

                    <td>
                                                <a href="{{ route('categories.edit', $category->id) }}"
                           class="btn btn-edit btn-sm">

                            ✏️ Edit

                        </a>

                        <form
                            action="{{ route('categories.destroy', $category->id) }}"
                            method="POST"
                            class="d-inline">

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="btn btn-delete btn-sm"
                                onclick="return confirm('Yakin ingin menghapus kategori ini?')">

                                🗑️ Hapus

                            </button>

                        </form>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="7">

                        <div class="text-center py-5">

                            <h4>📂 Belum Ada Kategori</h4>

                            <p class="text-muted mb-4">

                                Silakan tambahkan kategori pertama Anda.

                            </p>

                            <a href="{{ route('categories.create') }}"
                               class="btn btn-add">

                                ➕ Tambah Kategori

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

document.getElementById('searchKategori').addEventListener('keyup', function () {

    let keyword = this.value.toLowerCase();

    let rows = document.querySelectorAll("tbody tr");

    rows.forEach(function(row){

        let text = row.innerText.toLowerCase();

        if(text.indexOf(keyword) > -1){

            row.style.display = "";

        }else{

            row.style.display = "none";

        }

    });

});

</script>

@endsection