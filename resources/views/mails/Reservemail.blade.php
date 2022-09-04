@section('css')
    <link rel="stylesheet" href="{{ asset('css/mail/reservemail.css') }}">
@endsection

<p>【Rese】運営事務局です。</p>
<br>
<p>本日の予約の確認のご連絡をさせて頂きました。</p>
<br>
<br>
<table>
    <tr>
        <th>店名</th>
        <td>{{ $shop_name }}</td>
    </tr>
    <tr>
        <th>予約日</th>
        <td>{{ $reserve_date }}</td>
    </tr>
    <tr>
        <th>予約時間</th>
        <td>{{ $reserve_time }}
</td>
    </tr>
    <tr>
        <th>予約人数</th>
        <td>{{ $reserve_number }}</td>
    </tr>
</table>
<br>
<br>
<p>本日は盛大な会になれるよう祈っております。</p>
<br>
<p>【Rese】運営事務局</p>



