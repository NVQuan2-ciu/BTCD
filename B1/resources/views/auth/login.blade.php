@extends('layouts.app')

@section('title', 'Đăng nhập — Quản lý sinh viên')

@section('content')
<div class="card">
    <h1>Đăng nhập</h1>
    <p class="subtitle">Truy cập hệ thống quản lý sinh viên</p>

    @if ($errors->any())
        <div class="errors">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('status'))
        <div class="status">{{ session('status') }}</div>
    @endif

    <form action="{{ route('login') }}" method="post" novalidate>
        @csrf
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

        <label for="password">Mật khẩu</label>
        <input type="password" id="password" name="password" required autocomplete="current-password">

        <div class="remember">
            <input type="checkbox" id="remember" name="remember" value="1" {{ old('remember') ? 'checked' : '' }}>
            <label for="remember" style="margin: 0; font-weight: 400;">Ghi nhớ đăng nhập</label>
        </div>

        <button type="submit" class="btn">Đăng nhập</button>
    </form>

    <p class="footer-link">Chưa có tài khoản? <a href="{{ route('register') }}">Đăng ký</a></p>
</div>
@endsection
