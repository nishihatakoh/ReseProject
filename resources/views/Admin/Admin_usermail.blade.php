@extends('layouts.default')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/Admin/admin_usermail.css') }}">
@endsection
<header>
    <div>
        <nav class="nav" id="nav">
            <ul>
                <li><a href="{{ route('admin.login.logout') }}">logout</a></li>
                <li><a href="{{ route('admin.mypage.index') }}">mypage</a></li>
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
        <h2>メール送信フォーム</h2>
        <div class="input-form">
            <form action="{{ route('admin.mail.sendmail') }}" method="post">
                @csrf
                <input type="hidden" name="user_name" value="{{ $user->user_name }}">
                <input type="hidden" name="id" value="{{ $user->id }}">
                <div class="form">
                    <p>本文</p>
                    <textarea class="textarea" name="text" ></textarea>
                </div>
                <button class="button">メールを送信する</button>
            </form>
        </div>
    </div>
</main>