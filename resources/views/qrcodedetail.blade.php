@extends('layouts.default')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/qrcodedetail.css') }}">
@endsection
<main>
    <h2>予約状況</h2>
    <div class="main">
        <table>
            <tr>
                <th>予約名</th>
                <td>{{ $reserve->user->user_name }}</td>
            </tr>   
            <tr>
                <th>Shop</th>
                <td>{{ $reserve->shop->shop_name }}</td>
            </tr>
            <tr>
                <th>Date</th>
                <td>{{ $reserve->date }}</td>
            </tr>
            <tr><th>Time</th><td>{{ $reserve->time }}</td></tr>
            <tr><th>Number</th><td>{{ $reserve->number }}人</td></tr>
        </table>
    </div>
</main>