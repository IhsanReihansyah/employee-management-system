<?php

namespace App\Models;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'department_code',
        'department_name',
    ];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

}