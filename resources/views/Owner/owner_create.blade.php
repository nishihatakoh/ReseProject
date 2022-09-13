@extends('layouts.default')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/Owner/owner_create.css') }}">
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
    <div class="shop">
            <h2 class="shop_ttl">店舗新規作成</h2>
            <div class="shop_item">
                <div class="shop_content">
                    <form action="{{ route('owner.create.create') }}" method="post" enctype='multipart/form-data'>
                        @csrf
                        <input type="hidden" name="owner_id" value="{{ $owner }}">
                        <table >
                            <tr>
                                <th>店の名前</th>
                                <td ><input class="shop_input" type="text" name="shop_name"></td>
                            </tr>
                            @if ($errors->has('shop_name'))
                                <p class="error">{{$errors->first('shop_name')}}</p>
                            @endif
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
                            @if ($errors->has('area_id'))
                                <p class="error">{{$errors->first('area_id')}}</p>
                            @endif
                            <tr>
                                <th>ジャンル</th>
                                <td>
                                    <select class="shop_input" name="genre_id">
                                        <option value="">All genre</option>
                                        @foreach($genremasters as $genremaster)
                                        <option value="{{$genremaster->id}}">{{$genremaster->genre_name}}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            @if ($errors->has('genre_id'))
                                <p class="error">{{$errors->first('genre_id')}}</p>
                            @endif
                            <tr>
                                <th>店の紹介文</th>
                                <td><textarea class="shop_input" name="text" cols="30" rows="7"></textarea></td>
                            </tr>
                            @if ($errors->has('text'))
                                <p class="error">{{$errors->first('text')}}</p>
                            @endif
                            <tr>
                                <th class="review_table-ttl">画像</th>
                                <td><input class="review_table-input" type="file" name="image"></td>
                            </tr>
                            @if ($errors->has('image'))
                                <p class="error">{{$errors->first('image')}}</p>
                            @endif
                        </table>
                        <button class="button">新規作成</button>
                    </form>
                </div>
            </div>
        </div>
</main>