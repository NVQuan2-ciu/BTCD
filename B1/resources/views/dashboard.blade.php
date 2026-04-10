@extends('layouts.app')

@section('title', 'Trang chủ — Quản lý sinh viên')

@section('content')
<div class="card" style="max-width: 560px;">
    <h1>Xin chào, {{ Auth::user()->name }}</h1>
    <p class="subtitle">Bạn đã đăng nhập thành công vào hệ thống quản lý sinh viên. Các chức năng quản lý sinh viên có thể được bổ sung ở các bài sau.</p>
    <p style="color: var(--muted); font-size: 0.9rem; margin: 0;">Email: <strong style="color: var(--text);">{{ Auth::user()->email }}</strong></p>
</div>
@endsection
