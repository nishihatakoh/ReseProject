@extends('layouts.default')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/Admin/admin_done.css') }}">
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
        <h2 class="main_ttl">新規登録完了致しました。</h2>
        <a href="{{ route('admin.mypage.index') }}"  class="card_button">戻る</a>
        <a href="{{ route('owner.login.index') }}"  class="card_button">店舗代表者画面へ</a>
    </div>
</main>