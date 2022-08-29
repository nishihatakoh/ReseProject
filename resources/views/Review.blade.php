@extends('layouts.default')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/review.css') }}">
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
    <div class="review">
        <h2 class="shop_name">{{ $shop->shop_name }}のレビュー</h2>
        <div class="review_items">
            <p class="review_items_ttl">レビューを書き込む</p>
            <form action="{{ route('review.review') }}" method="post">
                @csrf
                <input type="hidden" name="shop_id" value="{{ $shop->id }}">
                <table class="review_table">
                    <tr>
                        <th class="review_table-ttl">評価</th>
                        <td class="review_table-input">
                            <select class="review_table-select"  name="star">
                                <option value=""></option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th  class="review_table-ttl">コメント</th>
                        <td><textarea class="review_table-input" name="comment" cols="50" rows="5"></textarea></td>
                    </tr>
                    <tr>
                        <th class="review_table-ttl">画像</th>
                        <td><input class="review_table-input" type="file" name="image"></td>
                    </tr>
                </table>
                <button>書き込む</button>
            </form>
        </div>
        <div class="opinion">
            <p class="opinion_ttl">他ユーザーの意見</p>
            <table class="opinion_table">
                <tr class="opinion_table-ttl">
                    <th class="opinion_table-name">ユーザー名</th>
                    <th class="opinion_table-star">評価</th>
                    <th>コメント</th>
                </tr>
                @foreach($reviews as $review)
                <tr class="opinion_table_tr">
                    <td>{{ $review->user->user_name }}</td>
                    <td>{{ $review->star}}</td>
                    <td>{{ $review->comment }}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</main>