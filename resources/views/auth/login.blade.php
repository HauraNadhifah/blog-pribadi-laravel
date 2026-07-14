<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<meta name="csrf-token" content="{{ csrf_token() }}">

<title>Login | Blog Pribadi</title>

@vite(['resources/css/app.css','resources/js/app.js'])

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Segoe UI',sans-serif;
}

body{
    min-height:100vh;
    padding:40px;

    background:linear-gradient(135deg,#FFF7F2,#FFFDFB,#F3FFF8);

    overflow-y:auto;
    overflow-x:hidden;
    position:relative;
}

/* Bubble */

body::before{

content:'';

position:absolute;

width:420px;

height:420px;

background:#FFDCCB;

border-radius:50%;

left:-120px;

top:-150px;

opacity:.75;

}

body::after{

content:'';

position:absolute;

width:320px;

height:320px;

background:#DDF5E8;

border-radius:50%;

right:-120px;

bottom:-120px;

opacity:.8;

}

/* Main Card */


.login-card{

width:1180px;
min-height:720px;

margin:60px auto;   /* tambahkan ini */

background:white;

border-radius:32px;

overflow:hidden;

display:grid;

grid-template-columns:55% 45%;

box-shadow:0 25px 60px rgba(0,0,0,.08);

position:relative;

z-index:10;

animation:fadeUp .7s;

}

@keyframes fadeUp{

from{

opacity:0;

transform:translateY(40px);

}

to{

opacity:1;

transform:translateY(0);

}

}

/* LEFT */

.left{

background:linear-gradient(135deg,#FFE7D8,#FFF7F1,#EAF8F0);

padding:70px;

position:relative;

overflow:hidden;

}

.left::before{

content:'';

position:absolute;

width:220px;

height:220px;

background:#FFD8C4;

border-radius:50%;

top:-70px;

right:-70px;

}

.left::after{

content:'';

position:absolute;

width:180px;

height:180px;

background:#D8F4E3;

border-radius:50%;

left:-60px;

bottom:-60px;

}

.logo{

font-size:46px;

font-weight:700;

color:#5A4636;

position:relative;

z-index:2;

}

.subtitle{

margin-top:20px;

font-size:18px;

line-height:1.9;

color:#666;

max-width:520px;

position:relative;

z-index:2;

}

.left-illustration{

margin-top:60px;

position:relative;

z-index:2;

}

/* Laptop */

.laptop{

width:430px;

margin:auto;

background:white;

border-radius:20px;

overflow:hidden;

box-shadow:0 20px 40px rgba(0,0,0,.08);

}

.screen-header{

height:42px;

background:#FFE7D7;

display:flex;

align-items:center;

gap:8px;

padding:0 18px;

}

.screen-header span{

width:11px;

height:11px;

border-radius:50%;

}

.screen-header span:nth-child(1){

background:#FF7D7D;

}

.screen-header span:nth-child(2){

background:#FFD65B;

}

.screen-header span:nth-child(3){

background:#81D89A;

}

.screen-body{

display:flex;

height:250px;

}

.sidebar{

width:85px;

background:#F7F7F7;

}

.content{

flex:1;

padding:25px;

}

.title{

width:150px;

height:15px;

background:#8CC7FF;

border-radius:20px;

margin-bottom:25px;

}

.line{

height:8px;

background:#ECECEC;

border-radius:20px;

margin-bottom:12px;

}

.short{

width:70%;

}

.button-demo{

width:100px;

height:34px;

background:#FFB98A;

border-radius:30px;

margin-top:35px;

}

.keyboard{

height:18px;

background:#DDD;

}

/* Floating */

.float{

position:absolute;

background:white;

padding:12px 18px;

border-radius:15px;

box-shadow:0 12px 25px rgba(0,0,0,.08);

font-weight:600;

animation:float 4s ease-in-out infinite;

}

.float1{

left:0;

top:20px;

}

.float2{

right:0;

top:100px;

animation-delay:1s;

}

.float3{

left:50px;

bottom:-10px;

animation-delay:2s;

}

@keyframes float{

0%{

transform:translateY(0);

}

50%{

transform:translateY(-12px);

}

100%{

transform:translateY(0);

}

}

/* RIGHT */

.right{

display:flex;

justify-content:center;

align-items:center;

padding:70px;

}

.form-box{

width:100%;

max-width:420px;

}

.form-box h2{

font-size:34px;

color:#5A4636;

margin-bottom:10px;

}

.form-box p{

color:#777;

margin-bottom:35px;

line-height:1.8;

}

/* Form */

.input-group{

margin-bottom:22px;

}

.input-group label{

display:block;

margin-bottom:8px;

font-weight:600;

color:#555;

}

.input-box{

display:flex;

align-items:center;

border:2px solid #F2E5DE;

border-radius:16px;

padding:0 16px;

background:#FFFDFB;

transition:.3s;

}

.input-box:focus-within{

border-color:#FFB98A;

box-shadow:0 0 0 4px rgba(255,185,138,.15);

}

.input-box input{

flex:1;

border:none;

background:none;

outline:none;

padding:16px 0;

font-size:15px;

}

.icon{

margin-right:10px;

}

.show-password{

background:none;

border:none;

cursor:pointer;

font-size:18px;

}

.remember-row{

display:flex;

justify-content:space-between;

align-items:center;

margin:25px 0;

}

.login-btn{

width:100%;

padding:16px;

border:none;

border-radius:16px;

background:linear-gradient(135deg,#FFB98A,#FF9F71);

color:white;

font-size:16px;

font-weight:bold;

cursor:pointer;

transition:.3s;

}

.login-btn:hover{

transform:translateY(-2px);

box-shadow:0 15px 25px rgba(255,170,120,.35);

}

.forgot{

text-decoration:none;

color:#FF9D68;

font-weight:600;

}

.register{

margin-top:25px;

text-align:center;

color:#777;

}

.register a{

color:#FF9D68;

font-weight:bold;

text-decoration:none;

}

.error{

color:#e74c3c;

font-size:13px;

margin-top:5px;

display:block;

}

/* Responsive */

@media(max-width:992px){

.login-card{

grid-template-columns:1fr;

}

.left{

display:none;

}

.right{

padding:40px;

}

}

</style>

</head>

<body>
    <div class="login-card">

    <!-- ================= LEFT ================= -->

    <div class="left">

        <div class="logo">

            🌸 Blog Pribadi

        </div>

        <div class="subtitle">

            Kelola artikel dengan mudah,
            tulis cerita terbaikmu,
            atur kategori,
            dan publikasikan semuanya
            melalui dashboard yang modern,
            nyaman, dan elegan.

        </div>

        <div class="left-illustration">

            <div class="laptop">

                <div class="screen-header">

                    <span></span>

                    <span></span>

                    <span></span>

                </div>

                <div class="screen-body">

                    <div class="sidebar"></div>

                    <div class="content">

                        <div class="title"></div>

                        <div class="line"></div>

                        <div class="line short"></div>

                        <div class="button-demo"></div>

                    </div>

                </div>

                <div class="keyboard"></div>

            </div>

            <div class="float float1">

                📂 Kategori

            </div>

            <div class="float float2">

                📝 Artikel

            </div>

            <div class="float float3">

                📊 Dashboard

            </div>

        </div>

    </div>

    <!-- ================= RIGHT ================= -->

    <div class="right">

        <div class="form-box">

            <h2>

                Selamat Datang 👋

            </h2>

            <p>

                Login terlebih dahulu untuk mengelola
                artikel dan kategori pada Blog Pribadi.

            </p>

            <x-auth-session-status
                class="mb-4"
                :status="session('status')" />

            <form method="POST"
                  action="{{ route('login') }}">

                @csrf
                <!-- ================= EMAIL ================= -->

<div class="input-group">

    <label>Email</label>

    <div class="input-box">

        <span class="icon">📧</span>

        <input
            type="email"
            name="email"
            value="{{ old('email') }}"
            placeholder="Masukkan email"
            required
            autofocus>

    </div>

    @error('email')

        <small class="error">

            {{ $message }}

        </small>

    @enderror

</div>

<!-- ================= PASSWORD ================= -->

<div class="input-group">

    <label>Password</label>

    <div class="input-box">

        <span class="icon">🔒</span>

        <input
            type="password"
            id="password"
            name="password"
            placeholder="Masukkan password"
            required>

        <button
            type="button"
            class="show-password"
            onclick="togglePassword()">

            👁

        </button>

    </div>

    @error('password')

        <small class="error">

            {{ $message }}

        </small>

    @enderror

</div>

<!-- ================= REMEMBER ================= -->

<div class="remember-row">

    <label style="display:flex;align-items:center;gap:8px;cursor:pointer;">

        <input
            type="checkbox"
            name="remember">

        <span>Remember Me</span>

    </label>

    @if (Route::has('password.request'))

        <a
            href="{{ route('password.request') }}"
            class="forgot">

            Lupa Password?

        </a>

    @endif

</div>

<button
    type="submit"
    class="login-btn">

    Masuk

</button>

@if(Route::has('register'))

<div class="register">

    Belum punya akun?

    <a href="{{ route('register') }}">

        Daftar Sekarang

    </a>

</div>

@endif

</form>

</div>

</div>

</div>
<script>

function togglePassword(){

    const password = document.getElementById('password');

    if(password.type === 'password'){

        password.type = 'text';

    }else{

        password.type = 'password';

    }

}

</script>

</body>

</html>
