@extends('layouts.default')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/shop_detail.css') }}">
@endsection

<main>
    <div>
        <nav class="nav" id="nav">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Registration</a></li>
                <li><a href="#">Login</a></li>
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
                    <button class="card_button"><</button>
                    <h2 class="card_ttl">仙人</h2>
                </div>
                <img src="https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/sushi.jpg" alt="">
                <div class="card_category">
                    <p>#area</p>
                    <p>#genre</p>
                </div>
                <p class="card_text">料理長厳選の食材から作る寿司を用いたコースをぜひお楽しみください。食材・味・価格、お客様の満足度を徹底的に追及したお店です。特別な日のお食事、ビジネス接待まで気軽に使用することができます。</p>
            </div>
        </div>
        <div class="reserve">
            <form action="">
                <div class="reserve_item">
                    <h2 class="reserve_ttl">予約</h2>
                    <input class="date" type="date">
                    <select name="" id="">

                    </select>
                    <select name="" id="">

                    </select>
                    <div class="table">
                        <div class="table_item">
                            <table>
                                <tr><th>Shop</th><td>仙人</td></tr>
                                <tr><th>Date</th><td>2020-04-01</td></tr>
                                <tr><th>Time</th><td>17:00</td></tr>
                                <tr><th>Number</th><td>1人</td></tr>
                            </table>
                        </div>
                    </div>
                </div>
                <input class="reserve_button" type="submit" value="予約する">
            </form>
        </div>
    </div>
</main>