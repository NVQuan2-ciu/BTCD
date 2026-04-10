@extends('layouts.app')

@section('title', 'Danh sách lớp học')

@section('content')
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
        <h1 class="h3 mb-0">Danh sách lớp học</h1>
        <a href="{{ route('classrooms.create') }}" class="btn btn-primary">Thêm lớp học</a>
    </div>

    <div class="card shadow-sm mb-3">
        <div class="card-body">
            <form method="get" action="{{ route('classrooms.index') }}" class="row g-2 align-items-end">
                <div class="col-auto">
                    <label for="per_page" class="form-label mb-0 small text-muted">Số bản ghi / trang</label>
                    <select name="per_page" id="per_page" class="form-select form-select-sm" onchange="this.form.submit()">
                        @foreach ($perPageOptions as $n)
                            <option value="{{ $n }}" @selected($perPage === $n)>{{ $n }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-auto">
                    <noscript>
                        <button type="submit" class="btn btn-sm btn-outline-secondary">Áp dụng</button>
                    </noscript>
                </div>
            </form>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Mã lớp</th>
                    <th scope="col">Tên lớp</th>
                    <th scope="col">Sĩ số</th>
                    <th scope="col">Ghi chú</th>
                    <th scope="col" class="text-end">Thao tác</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($classrooms as $classroom)
                    <tr>
                        <td>{{ $classroom->id }}</td>
                        <td><code>{{ $classroom->ma_lop }}</code></td>
                        <td>{{ $classroom->ten_lop }}</td>
                        <td>{{ $classroom->si_so ?? '—' }}</td>
                        <td class="text-truncate" style="max-width: 200px;" title="{{ $classroom->ghi_chu }}">
                            {{ $classroom->ghi_chu ?: '—' }}
                        </td>
                        <td class="text-end text-nowrap">
                            <a href="{{ route('classrooms.edit', $classroom) }}" class="btn btn-sm btn-outline-secondary">Sửa</a>
                            <form action="{{ route('classrooms.destroy', $classroom) }}" method="post" class="d-inline"
                                  onsubmit="return confirm('Bạn có chắc muốn xóa lớp này?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted py-4">Chưa có lớp học nào. Hãy thêm mới.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        @if ($classrooms->hasPages())
            <div class="card-footer bg-white">
                {{ $classrooms->links() }}
            </div>
        @endif
    </div>
@endsection
