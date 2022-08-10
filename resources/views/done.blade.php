@extends('layouts.default')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/done.css') }}">
@endsection
<header>
    <div>
        <nav class="nav" id="nav">
            <ul>
                <li><a href="{{ route('shop_all.index') }}">Home</a></li>
                <li><a href="{{ route('mypage.logout') }}">Logout</a></li>
                <li><a href="{{ route('mypage.index') }}">Mypage</a></li>
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
        <h2 class="main_ttl">ご予約ありがとうございます</h2>
        <a href="{{ route('mypage.index') }}"  class="card_button">戻る</a>
    </div>
</main>