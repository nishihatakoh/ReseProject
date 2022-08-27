@extends('layouts.default')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/Owner/owner_create.css') }}">
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
    <div class="shop">
            <h2 class="shop_ttl">店舗新規作成</h2>
            <div class="shop_item">
                <div class="shop_content">
                    <form action="" method="post">
                        @csrf
                        <input type="hidden" name="owner_id" value="{{ $owner }}">
                        <table >
                            <tr>
                                <th>店の名前</th>
                                <td ><input class="shop_input" type="text" name="shop_name"></td>
                            </tr>
                            <tr>
                                <th>エリア</th>
                                <td>
                                    <select class="shop_input" name="area_id">
                                        <option value="">All area</option>
                                        @foreach($areamasters as $areamaster)
                                        <option value="{{$areamaster->id}}">{{$areamaster->area_name}}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>ジャンル</th>
                                <td>
                                    <select class="shop_input" name="ganre_id">
                                        <option value="">All genre</option>
                                        @foreach($genremasters as $genremaster)
                                        <option value="{{$genremaster->id}}">{{$genremaster->genre_name}}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>店の紹介文</th>
                                <td><textarea class="shop_input" name="text" cols="30" rows="7"></textarea></td>
                            </tr>
                            <tr>
                                <th>店の写真URL</th>
                                <td><input class="shop_input" type="url" name="image"></td>
                            </tr>
                        </table>
                        <button class="button">新規作成</button>
                    </form>
                </div>
            </div>
        </div>
</main>