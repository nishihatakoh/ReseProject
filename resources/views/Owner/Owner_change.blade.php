@extends('layouts.default')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/Owner/owner_change.css') }}">
@endsection
<header>
    <div>
        <nav class="nav" id="nav">
            <ul>
                <li><a href="{{ route('owner.mypage.index') }}">Home</a></li>
                <li><a href="{{ route('owner.mypage.logout') }}">Logout</a></li>
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
        @foreach( $shops as $shop)
            <div class="change-item">
                <div class="change_content">
                    <form action="{{ route('owner.change.change') }}" method="post" enctype='multipart/form-data'>
                        @csrf
                        <input type="hidden" name="owner_id" value="{{ $owner }}">
                        <input type="hidden" name="id" value="{{ $shop->id }}">
                        <table class="table">
                            @if ($errors->has('shop_name'))
                                <p class="error">{{$errors->first('shop_name')}}</p>
                            @endif
                            @if ($errors->has('area_id'))
                                <p class="error">{{$errors->first('area_id')}}</p>
                            @endif
                            @if ($errors->has('genre_id'))
                                <p class="error">{{$errors->first('genre_id')}}</p>
                            @endif
                            @if ($errors->has('text'))
                                <p class="error">{{$errors->first('text')}}</p>
                            @endif
                            @if ($errors->has('image'))
                                <p class="error">{{$errors->first('image')}}</p>
                            @endif
                            <tr>
                                <th class="table_ttl">店の名前</th>
                                <td class="talbe_shop">{{ $shop->shop_name }}</td>
                                <td class="yajirushi">→</td>
                                <td class="shop_input"><input class="shop_input-item" type="text" name="shop_name"></td>
                            </tr>
                            <tr>
                                <th class="table_ttl">エリア</th>
                                <td class="talbe_shop">{{ $shop->area->area_name }}</td>
                                <td class="yajirushi">→</td>
                                <td class="shop_input">
                                    <select class="shop_input-item" name="area_id">
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
                                <td class="yajirushi">→</td>
                                <td class="shop_input">
                                    <select class="shop_input-item" name="genre_id">
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
                                <td class="yajirushi">→</td>
                                <td class="shop_input">
                                    <textarea class="shop_input-item" name="text" cols="30" rows="7"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <th class="table_ttl">店の画像URL</th>
                                <td class="talbe_shop"></td>
                                <td class="yajirushi">→</td>
                                <td><input class="review_table-input" type="file" name="image"></td>
                            </tr>
                        </table>
                        <input type="submit" value="変更する">
                    </form>
                </div>
            </div>
        @endforeach
    </div>        
</main>