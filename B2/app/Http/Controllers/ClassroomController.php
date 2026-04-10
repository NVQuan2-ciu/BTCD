<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ClassroomController extends Controller
{
    private const PER_PAGE_OPTIONS = [5, 10, 25, 50];

    public function index(Request $request): View
    {
        $perPage = (int) $request->query('per_page', 10);
        if (! in_array($perPage, self::PER_PAGE_OPTIONS, true)) {
            $perPage = 10;
        }

        $classrooms = Classroom::query()
            ->orderBy('id', 'desc')
            ->paginate($perPage)
            ->withQueryString();

        return view('classrooms.index', [
            'classrooms' => $classrooms,
            'perPage' => $perPage,
            'perPageOptions' => self::PER_PAGE_OPTIONS,
        ]);
    }

    public function create(): View
    {
        return view('classrooms.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);

        Classroom::query()->create($data);

        return redirect()
            ->route('classrooms.index')
            ->with('success', 'Đã thêm lớp học thành công.');
    }

    public function edit(Classroom $classroom): View
    {
        return view('classrooms.edit', compact('classroom'));
    }

    public function update(Request $request, Classroom $classroom): RedirectResponse
    {
        $data = $this->validated($request, $classroom->id);

        $classroom->update($data);

        return redirect()
            ->route('classrooms.index')
            ->with('success', 'Đã cập nhật lớp học thành công.');
    }

    public function destroy(Classroom $classroom): RedirectResponse
    {
        $classroom->delete();

        return redirect()
            ->route('classrooms.index')
            ->with('success', 'Đã xóa lớp học.');
    }

    /**
     * @return array{ten_lop: string, ma_lop: string, si_so: int|null, ghi_chu: string|null}
     */
    private function validated(Request $request, ?int $ignoreId = null): array
    {
        $maLopRule = 'required|string|max:50|unique:classrooms,ma_lop';
        if ($ignoreId !== null) {
            $maLopRule .= ','.$ignoreId;
        }

        return $request->validate([
            'ten_lop' => 'required|string|max:255',
            'ma_lop' => $maLopRule,
            'si_so' => 'nullable|integer|min:0|max:65535',
            'ghi_chu' => 'nullable|string|max:5000',
        ]);
    }
}
