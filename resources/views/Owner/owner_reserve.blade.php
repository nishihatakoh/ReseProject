@extends('layouts.default')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/Owner/owner_reserve.css') }}">
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
    <div class="reserve">
            <h3 class="reserve_ttl">予約状況</h3>
            @foreach( $reserves as $reserve)
            <div class="reserve_item">
                <div class="reserve_content">
                    <div class="reserve_title">
                        <div class="clock icon"></div>
                        <p class="reserve_number">予約</p>
                        
                    </div>
                    <div class="table">
                        @csrf
                        <table>
                            <tr>
                                <th>Shop</th>
                                <td> {{ $shop->shop_name }}</td>
                            </tr>
                            <tr>
                                <th>Date</th>
                                <td> {{ $reserve->date }} </td>
                            </tr>
                            <tr>
                                <th>Time</th>
                                <td> {{ $reserve->time }} </td>
                            </tr>
                            <tr>
                                <th>Number</th>
                                <td> {{ $reserve->number }}人</td>
                            </tr>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</main>