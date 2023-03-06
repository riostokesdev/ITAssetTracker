<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;


    protected $fillable = [
        'asset_name',
        'serial_number',
        'fa_code',
        'employee_id'
    ];

    public function Employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }
}
