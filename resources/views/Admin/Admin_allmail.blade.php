@extends('layouts.default')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/Admin/admin_allmail.css') }}">
@endsection
<header>
    <div>
        <nav class="nav" id="nav">
            <ul>
                <li><a href="{{ route('admin.login.logout') }}">logout</a></li>
                <li><a href="{{ route('admin.mypage.index') }}">mypage</a></li>
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
    <div class="main">
        <h2 class="ttl">利用者一覧</h2>
        <div class="table">
            <div class="table-white">
                <table>
                    <tr>
                        <th>ID</th>
                        <th>利用者</th>
                        <th>EMAIL</th>
                    </tr>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->user_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <form action="{{ route('admin.mail.send')}}" method="post">
                                @csrf
                                <button class="id" name="id" value="{{ $user->id }}">送る</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</main>