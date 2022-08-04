@extends('layouts.default')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection
<header>
    <div>
        <nav class="nav" id="nav">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Registration</a></li>
                <li><a href="#">Login</a></li>
            </ul>
        </nav>
    </div>
    <div class="header">
        <div class="header-logo">
            <div class="menu" id="menu">
                <span class="menu__line--top"></span>
                <span class="menu__line--middle"></span>
                <span class="menu__line--bottom"></span>
            </div>
        <h1 class="header-ttl">Rese</h1>
    </div>
</header>
<main>
    <div class="main">
        <h2 class="main_ttl">会員登録ありがとうございます</h2>
        <a href="/login" class="card_button">ログインする</a>
    </div>
</main>