@extends('layouts.default')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/change.css') }}">
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
    <div>
        <h2>予約変更</h2>
        <form action="{{ route('change.change', ['id' => $reserve->id]) }}" method="post">
            @csrf
            <div class="card">
                <div class="table_item">
                    <table>
                        @if ($errors->has('date'))
                            <p class="error">{{$errors->first('date')}}</p>
                        @endif
                        @if ($errors->has('time'))
                            <p class="error">{{$errors->first('time')}}</p>
                        @endif
                        @if ($errors->has('number'))
                            <p class="error">{{$errors->first('number')}}</p>
                        @endif
                        <tr>
                            <th>Shop</th>
                            <td>{{ $reserve->shop->shop_name }}</td>
                        </tr>
                        <tr>
                            <th>Date</th>
                            <td>{{ $reserve->date }}</td>
                            <td>→</td>
                            <td class="input"><input type="date" name="date" class="input_item"></td>
                        </tr>
                        <tr>
                            <th>Time</th>
                            <td>{{ $reserve->time }}</td>
                            <td>→</td>
                            <td class="input">
                                <select name="time" id="time" class="input_item">
                                    @for($i = 16; $i < 24; $i++)
                                        <option value="{{$i}}:00">{{$i}}:00</option>  
                                        <option value="{{$i}}:30">{{$i}}:30</option>  
                                    @endfor
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Number</th>
                            <td>{{ $reserve->number }}</td>
                            <td>→</td>
                            <td class="input">
                                <select name="number" id="number" class="input_item">
                                    @for($i = 1; $i <= 10; $i++)
                                        <option value="{{$i}}">{{$i}}人</option>  
                                    @endfor
                                </select>
                            </td>
                        </tr>
                    </table>
                </div>
                <button class="change_button">変更する</button>
                <a href="{{ route('mypage.index') }}" class="back_button">マイページに戻る</a>
            </div>
        </form>
    </div>


</main>