@extends('layouts.default')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/pre_register.css') }}">
@endsection
<main>
    <div class="container">
        <p class="ttl">仮会員登録完了</p>
        <div class="items">
            <p class="items_text">この度は、ご登録いただき誠にありがとうございます。</p>
            <p class="items_text">
                ご本人様確認のため、ご登録いただいたメールアドレスに、
                本登録のご案内のメールが届きます。
            </p>
            <p class="items_text">
                そちらに記載されているURLにアクセスしアカウントの本登録を完了させてください。
            </p>
        </div>
    </div>
</main>