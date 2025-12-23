<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InvestmentInitiation extends Model
{
    use HasFactory;

    protected $fillable = [
        'sumber_investment',
        'nama_investasi',
        'deskripsi',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'sumber_investment' => 'string',
            'status' => 'string',
        ];
    }
}
