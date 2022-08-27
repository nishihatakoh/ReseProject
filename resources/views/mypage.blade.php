@extends('layouts.default')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection
<header>
    <div>
        <nav class="nav" id="nav">
            <ul>
                <li><a href="{{ route('shop_all.index') }}">Home</a></li>
                <li><a href="{{ route('mypage.logout') }}">logout</a></li>
                <li><a href="{{ route('mypage.index') }}">mypage</a></li>
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
    <h2 class="user_name">{{Auth::user()->user_name}}さん</h2>
    <div class="main">
        <div class="reserve">
            <h3 class="reserve_ttl">予約状況</h3>
            @foreach( $reserves as $reserve)
            <div class="reserve_item">
                <div class="reserve_content">
                    <div class="reserve_title">
                        <div class="clock icon"></div>
                        <p class="reserve_number">予約</p>
                        <form class="button-close" action="{{ route('mypage.delete', ['id' => $reserve->id]) }}" method="post">
                            @csrf
                            <button><span class="btn-close"></span></button>
                        </form>
                    </div>
                    <div class="table">
                        <div class="table_item">
                            <form action="{{ route('change.index', ['id' => $reserve->id]) }}" method="post">
                                @csrf
                                <table>
                                    <tr>
                                        <th>Shop</th>
                                        <td>{{ $reserve->shop->shop_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Date</th>
                                        <td>{{ $reserve->date }}</td>
                                    </tr>
                                    <tr><th>Time</th><td>{{ $reserve->time }}</td></tr>
                                    <tr><th>Number</th><td>{{ $reserve->number }}人</td></tr>
                                </table>
                        </div>
                            <button class="reserve_button">予約変更はこちら</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="favorite">
            <h3 class="favorite_ttl2">お気に入り店舗</h3>
            <div class="card">
                @foreach($favorites as $favorite)
                <div class="card_item">
                    <div>
                        <img class="card-img" src="{{ $favorite->shop->image }}" alt="">
                    </div>
                    <div class="card-content">
                        <h2 class="card-name">{{ $favorite->shop->shop_name }}</h2>
                        <div class="card-category">
                            <p>#{{ $favorite->shop->genre->genre_name }}</p>
                            <p>#{{ $favorite->shop->area->area_name }}</p>
                        </div>
                    
                        <div class="card-bottom">
                            <form action="{{ route('mypage.detail', ['id' => $favorite->shop_id]) }}" method="post">
                                @csrf
                                <button class="card-bottom_button">詳しく見る</button>
                            </form>
                            <form action="{{ route('mypage.unfavorite', ['id' => $favorite->id]) }}" method="post">
                            @csrf
                            <button class="heart_button">
                                <div class="heart"></div>
                            </button>
                        </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        </div>
    </div>
</main>