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
        'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'full_name',
        'email',
        'phone',
        'photo',
        'department_id',
        'position',
        'status',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

}