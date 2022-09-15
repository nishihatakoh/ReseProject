@extends('layouts.default')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/shop_detail.css') }}">
@endsection

<main>
    <div>
        <nav class="nav" id="nav">
            <ul>
                <li><a href="{{ route('shop_all.index') }}">Home</a></li>
                <li><a href="{{ route('mypage.logout') }}">Logout</a></li>
                <li><a href="{{ route('mypage.index') }}">Mypage</a></li>
            </ul>
        </nav>
    </div>
    <div class="main">
        <div class="main_item">
            <div class="header">
            <div class="header-logo">
                <div class="menu" id="menu">
                    <span class="menu__line--top"></span>
                    <span class="menu__line--middle"></span>
                    <span class="menu__line--bottom"></span>
                </div>
                <h1 class="header-ttl">Rese</h1>
            </div>
        </div>
            <div class="card">
                <div class="card_header">
                    <h2 class="card_ttl">{{$shop->shop_name}}</h2>
                    <form action="{{ route('review.index')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $shop->id }}">
                        <input class="review_button"type="submit" value="レビューを見る&書き込む">
                    </form>
                </div>
                <!-- ↓本番環境での画像の表示↓ -->
                <!-- <img class="img" src="data:image/png;base64,<?= $shop->image ?>"> -->
                <img class="img" src="{{asset($shop->image)}}">
                <div class="card_category">
                    <p>#{{$shop->genre->genre_name}}</p>
                    <p>#{{$shop->area->area_name}}</p>
                </div>
                <p class="card_text">{{$shop->text}}</p>
            </div>
        </div>
        <div class="reserve">
            <form action="{{ route('shop_detail.reserve') }}" method="post">
                @csrf
                <div class="reserve_item">
                    <h2 class="reserve_ttl">予約</h2>
                    <input type="hidden" name="shop_id" value="{{$shop->id}}">
                    <input class="date" type="date" id="date" name="date">
                    @if ($errors->has('date'))
                        <p class="error">{{$errors->first('date')}}</p>
                    @endif
                    <select name="time" id="time">
                        <option value=""></option>
                        @for($i = 16; $i < 24; $i++)
                                <option value="{{$i}}:00">{{$i}}:00</option>  
                                <option value="{{$i}}:30">{{$i}}:30</option>  
                        @endfor
                    </select>
                    @if ($errors->has('time'))
                        <p class="error">{{$errors->first('time')}}</p>
                    @endif
                    <select name="number" id="number">
                        <option value=""></option>
                        @for($i = 1; $i <= 10; $i++)
                                <option value="{{$i}}">{{$i}}人</option>  
                        @endfor
                    </select>
                    @if ($errors->has('number'))
                        <p class="error">{{$errors->first('number')}}</p>
                    @endif
                    <div class="table">
                        <div class="table_item">
                            <table>
                                <tr>
                                    <th>Shop</th>
                                    <td>{{$shop->shop_name}}</td>
                                </tr>
                                <tr>
                                    <th>Date</th>
                                    <td id="output"></td>
                                </tr>
                                <tr>
                                    <th>Time</th>
                                    <td id="selecttime"></td>
                                </tr>
                                <tr>
                                    <th>Number</th>
                                    <td id="selectnumber"></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <input class="reserve_button" type="submit" value="予約する">
            </form>
        </div>
    </div>
</main>