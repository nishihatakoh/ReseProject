@extends('layouts.default')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/Admin/admin_login.css') }}">
@endsection
<header>
    <div>
        <nav class="nav" id="nav">
            <ul>
                <li><a href="{{ route('admin.register.index') }}">Registration</a></li>
                <li><a href="{{ route('admin.login.index') }}">Login</a></li>
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
    <h2 class="admin">管理者専用</h2>
    <div class="main">
        <div class="card">
            <h2 class="card_ttl">Login</h2>
            <div class="card_content">
                <form action="{{ route('admin.login.login') }}" method="POST">
                    @csrf
                    <div class="card_item">
                        <div class="mail-solid icon"></div>
                        <input class="card_input" type="email" placeholder="Email" name="email">
                    </div>
                    @if ($errors->has('email'))
                        <p class="error">{{$errors->first('email')}}</p>
                    @endif
                    <div class="card_item">
                        <div class="lock-solid icon"></div>
                        <input class="card_input" type="password" placeholder="Password" name="password">
                    </div>
                    @if ($errors->has('password'))
                        <p class="error">{{$errors->first('password')}}</p>
                    @endif
                    <input class="card_button" type="submit" value="ログイン">
                </form>
            </div>
        </div>
    </div>
    <a class="loginpage" href="{{ route('login.index') }}">ログインページ</a>
    <a href="{{ route('owner.login.index') }}">店舗代表者ログインページ</a>
</main>