<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $fillable = [
        'ten_lop',
        'ma_lop',
        'si_so',
        'ghi_chu',
    ];

    protected function casts(): array
    {
        return [
            'si_so' => 'integer',
        ];
    }
}
