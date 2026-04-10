@php
    /** @var \App\Models\Classroom|null $classroom */
    $classroom = $classroom ?? null;
@endphp

<div class="mb-3">
    <label for="ten_lop" class="form-label">Tên lớp <span class="text-danger">*</span></label>
    <input type="text" name="ten_lop" id="ten_lop" class="form-control @error('ten_lop') is-invalid @enderror"
           value="{{ old('ten_lop', $classroom?->ten_lop) }}" required maxlength="255">
    @error('ten_lop')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="ma_lop" class="form-label">Mã lớp <span class="text-danger">*</span></label>
    <input type="text" name="ma_lop" id="ma_lop" class="form-control @error('ma_lop') is-invalid @enderror"
           value="{{ old('ma_lop', $classroom?->ma_lop) }}" required maxlength="50">
    @error('ma_lop')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="si_so" class="form-label">Sĩ số</label>
    <input type="number" name="si_so" id="si_so" class="form-control @error('si_so') is-invalid @enderror"
           value="{{ old('si_so', $classroom?->si_so) }}" min="0" max="65535">
    @error('si_so')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="ghi_chu" class="form-label">Ghi chú</label>
    <textarea name="ghi_chu" id="ghi_chu" rows="3"
              class="form-control @error('ghi_chu') is-invalid @enderror">{{ old('ghi_chu', $classroom?->ghi_chu) }}</textarea>
    @error('ghi_chu')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
