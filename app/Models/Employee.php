<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'employee_code',
        'photo',
        'full_name',
        'email',
        'phone',
        'gender',
        'birth_date',
        'department',
        'position',
        'salary',
        'address',
        'status',
    ];
}