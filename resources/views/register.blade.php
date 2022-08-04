@extends('layouts.default')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection
<header>
    <div>
        <nav class="nav" id="nav">
            <ul>
                <li><a href="/shop_all">Home</a></li>
                <li><a href="/register">Registration</a></li>
                <li><a href="/login">Login</a></li>
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
        <div class="card">
            <h2 class="card_ttl">Registration</h2>
            <div class="card_content">
                <form action="/thanks" method="Post">
                    @csrf
                    <div class="card_item">
                        <div class="profile-solid icon"></div>
                        <input class="card_input" type="text" placeholder="Username" name="user_name">
                    </div>
                    @if ($errors->has('user_name'))
                        <p class="error">{{$errors->first('user_name')}}</p>
                    @endif
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
                    <input class="card_button" type="submit" value="登録">
                </form>
            </div>
        </div>
    </div>
</main>