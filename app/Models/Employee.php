<?php

namespace App\Models;

use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_code',
        'full_name',
        'email',
        'phone',
        'department_id',
        'position',
        'status',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

}