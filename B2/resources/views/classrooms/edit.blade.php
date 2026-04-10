@extends('layouts.app')

@section('title', 'Sửa lớp học')

@section('content')
    <h1 class="h3 mb-3">Sửa lớp học</h1>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('classrooms.update', $classroom) }}" method="post">
                @csrf
                @method('PUT')
                @include('classrooms._form', ['classroom' => $classroom])

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                    <a href="{{ route('classrooms.index') }}" class="btn btn-outline-secondary">Quay lại</a>
                </div>
            </form>
        </div>
    </div>
@endsection
