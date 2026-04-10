@extends('layouts.app')

@section('title', 'Đăng ký — Quản lý sinh viên')

@section('content')
<div class="card">
    <h1>Đăng ký tài khoản</h1>
    <p class="subtitle">Tạo tài khoản để sử dụng hệ thống</p>

    @if ($errors->any())
        <div class="errors">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('register') }}" method="post" novalidate>
        @csrf
        <label for="name">Họ và tên</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required autocomplete="email">

        <label for="password">Mật khẩu</label>
        <input type="password" id="password" name="password" required autocomplete="new-password" minlength="8">

        <label for="password_confirmation">Xác nhận mật khẩu</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required autocomplete="new-password">

        <button type="submit" class="btn">Đăng ký</button>
    </form>

    <p class="footer-link">Đã có tài khoản? <a href="{{ route('login') }}">Đăng nhập</a></p>
</div>
@endsection
