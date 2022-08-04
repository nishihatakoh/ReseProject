@extends('layouts.default')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/shop_all.css') }}">
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
        <div class="header">
            <div class="header-logo">
                <div class="menu" id="menu">
                    <span class="menu__line--top"></span>
                    <span class="menu__line--middle"></span>
                    <span class="menu__line--bottom"></span>
                </div>
                <h1 class="header-ttl">Rese</h1>
            </div>
            <div class="header-search">
                <form action="" method="POST">
                    <select class="header-area"name="" id="" value="">

                    </select>
                    <select class="header-genre" name="" id="">

                    </select>
                    <img class="header-img" src="{{ asset('img/検索用の虫眼鏡アイコン素材.png') }}" alt="">
                    <input class="header-text" type="text" >
                </form>
            </div>
        </div>
    </div>
</header>
<main>
    <div class="main">
        <div class="card">
            <div>
                <img class="card-img" src="https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/sushi.jpg" alt="">
            </div>
            <div class="card-content">
                <h2 class="card-name">仙人</h2>
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
        <div class="card">
            <div>
                <img class="card-img" src="https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/yakiniku.jpg" alt="">
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
        <div class="card">
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
        <div class="card">
            <div>
                <img class="card-img" src="https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/italian.jpg" alt="">
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
        <div class="card">
            <div>
                <img class="card-img" src="https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/ramen.jpg" alt="">
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
</main>