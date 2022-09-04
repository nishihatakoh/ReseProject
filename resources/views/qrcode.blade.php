
<p>{!! QrCode::size(300)->generate(route('mypage.qrcodedetail',['id' => $reserve->id ])) !!}</p>
<a href="{{ route('mypage.index') }}">マイページに戻る</a>