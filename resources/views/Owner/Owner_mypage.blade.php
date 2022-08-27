@extends('layouts.default')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/Owner/owner_mypage.css') }}">
@endsection
<header>
    <div>
        <nav class="nav" id="nav">
            <ul>
                <li><a href="{{ route('shop_all.index') }}">Home</a></li>
                <li><a href="{{ route('register.index') }}">Registration</a></li>
                <li><a href="{{ route('login.index') }}">Login</a></li>
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
    <div>
        <h2 class="main_ttl">店舗代表者マイページ</h2>
        <div class="content">
            <div class="content_items">
                <div class="content_item">
                    <p>店舗新規作成→</p>
                    <a href="{{ route('owner.create.index') }}">店舗新規作成ページへ</a>
                    
                </div>
                <h3>↓新規作成した方のみ↓</h3>
                <div class="content_item">
                    <p>店舗情報変更→</p>
                    <a href="{{ route('owner.change.index') }}">店舗情報変更ページへ</a>
                    
                </div>
                <div class="content_item">
                    <p>予約情報→</p>
                    <a href="{{ route('owner.reserve.index') }}">予約情報ページへ</a>
                    
                </div>
            </div>
        </div>
    </div>
</main>