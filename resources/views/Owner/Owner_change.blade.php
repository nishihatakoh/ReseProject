@extends('layouts.default')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/Owner/owner_change.css') }}">
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
    <div class="change">
        <h2 class="change_ttl">店舗情報変更</h2>
        @foreach( $reserves as $reserve)
            <div class="change-item">
                <div class="change_content">
                    <form action="" method="post">
                        <table>
                            <tr>
                                <th class="table_ttl">店の名前</th>
                                <td class="talbe_shop">{{ $shop->shop_name }}</td>
                                <td>→</td>
                                <td><input type="text"></td>
                            </tr>
                            <tr>
                                <th class="table_ttl">エリア</th>
                                <td class="talbe_shop">{{ $shop->area->area_name }}</td>
                                <td>→</td>
                                <td>
                                    <select class="shop_input"  name="area_id">
                                        <option value=""></option>
                                        @foreach($areamasters as $areamaster)
                                        <option value="{{$areamaster->id}}">{{$areamaster->area_name}}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th class="table_ttl">ジャンル</th>
                                <td class="talbe_shop">{{ $shop->genre->genre_name }}</td>
                                <td>→</td>
                                <td>
                                    <select class="shop_input"  name="genre_id">
                                        <option value=""></option>
                                        @foreach($genremasters as $genremaster)
                                        <option value="{{$genremaster->id}}">{{$genremaster->genre_name}}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr class="table_tr">
                                <th class="table_ttl">店の紹介文</th>
                                <td class="talbe_shop"></td>
                                <td>→</td>
                                <td>
                                    <textarea class="shop_input" name="text" cols="30" rows="7"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <th class="table_ttl">店の画像URL</th>
                                <td class="talbe_shop"></td>
                                <td>→</td>
                                <td>
                                    <input type="url">
                                </td>
                            </tr>
                        </table>
                        <input type="submit" value="変更する">
                    </form>
                </div>
            </div>
        @endforeach
    </div>        
</main>