@extends('layouts.default')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/shop_all.css') }}">
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
                <form action="{{ route('shop_all.find') }}" method="POST">
                    @csrf
                    <select class="header-area" name="area_id">
                        <option value="">All area</option>
                        @foreach($areamasters as $areamaster)
                        <option value="{{$areamaster->id}}">{{$areamaster->area_name}}</option>
                        @endforeach
                    </select>
                    <select class="header-genre" name="genre_id">
                        <option value="">All genre</option>
                        @foreach($genremasters as $genremaster)
                        <option value="{{$genremaster->id}}">{{$genremaster->genre_name}}</option>
                        @endforeach
                    </select>
                    <input class="header-text" type="text" name="shop_name">
                    <button class="header-button"><img class="header-img" src="{{ asset('img/検索用の虫眼鏡アイコン素材.png') }}"></button>
                </form>
            </div>
        </div>
    </div>
</header>
<main>
    <div class="main">
        @foreach($items as $item)
        <div class="card">
            <div>
                <img class="card-img" src="{{ $item->image }}">
            </div>
            <div class="card-content">
                <h2 class="card-name">{{$item->shop_name}}</h2>
                <div class="card-category">
                    <p>#{{$item->genre->genre_name}}</p>
                    <p>#{{$item->area->area_name}}</p>
                </div>
                <div class="card-bottom">
                    <form action="{{ route('shop_all.detail', ['id' => $item->id]) }}" method="post">
                        @csrf
                        <button class="card-bottom_button">詳しく見る</button>
                    </form>
                    @if($favorite)
                        <form action="{{ route('shop_all.unfavorite', ['id' => $favorite->id]) }}" method="post">
                            @csrf
                            <button class="heart_button">
                                <div class="heart"></div>
                            </button>
                        </form>
                    @else
                        <form action="{{ route('shop_all.favorite', ['shop_id' => $item->id]) }}" method="post">
                            @csrf
                            <button class="heart_button">
                                <div class="whiteheart"></div>
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
</main>