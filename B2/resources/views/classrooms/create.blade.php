@extends('layouts.app')

@section('title', 'Thêm lớp học')

@section('content')
    <h1 class="h3 mb-3">Thêm lớp học</h1>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('classrooms.store') }}" method="post">
                @csrf
                @include('classrooms._form', ['classroom' => null])

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Lưu</button>
                    <a href="{{ route('classrooms.index') }}" class="btn btn-outline-secondary">Hủy</a>
                </div>
            </form>
        </div>
    </div>
@endsection
