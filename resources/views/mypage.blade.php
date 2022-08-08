@extends('layouts.default')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection
<header>
    <div>
        <nav class="nav" id="nav">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="{{ route('mypage.logout') }}">logout</a></li>
                <li><a href="#">mypage</a></li>
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
        <div class="reserve">
            <h3 class="reserve_ttl">予約状況</h3>
            <div class="reserve_item">
                <div class="reserve_content">
                    <div class="reserve_title">
                        <div class="clock icon"></div>
                        <p class="reserve_number">予約１</p>
                        <button><span class="btn-close"></span></button>
                    </div>
                    <div class="table">
                        <div class="table_item">
                            <table>
                                <tr><th>Shop</th><td>仙人</td></tr>
                                <tr><th>Date</th><td>2020-04-01</td></tr>
                                <tr><th>Time</th><td>17:00</td></tr>
                                <tr><th>Number</th><td>1人</td></tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="favorite">
            <h2 class="favorite_ttl">{{Auth::user()->user_name}}さん</h2>
            <h3 class="favorite_ttl2">お気に入り店舗</h3>
            <div class="card">
                <div class="card_item">
                    <div>
                        <img class="card-img" src="https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/izakaya.jpg" alt="">
                    </div>
                    <div class="card-content">
                        <h2 class="card-name">〇〇</h2>
                        <div class="card-category">
                            <p>#genre</p>
                            <p>#area</p>
                        </div>
                    
                        <div class="card-bottom">
                            <button class="card-bottom_button">詳しく見る</button>
                            <div class="heart">ハート</div>
                        </div>
                    </div>
                </div>
                <div class="card_item">
                    <div>
                        <img class="card-img" src="https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/izakaya.jpg" alt="">
                    </div>
                    <div class="card-content">
                        <h2 class="card-name">〇〇</h2>
                        <div class="card-category">
                            <p>#genre</p>
                            <p>#area</p>
                        </div>
                    <div class="card-bottom">
                        <button class="card-bottom_button">詳しく見る</button>
                        <div class="heart">ハート</div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</main>