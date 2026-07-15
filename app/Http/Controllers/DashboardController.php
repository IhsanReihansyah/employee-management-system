<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Employee;
use App\Models\Department;

class DashboardController extends Controller
{
    public function index()
    {
        $employeePerDepartment = Department::withCount('employees')->get();
    
        $totalEmployees = Employee::count();

        $activeEmployees = Employee::where('status', 'Active')->count();

        $inactiveEmployees = Employee::where('status', 'Inactive')->count();

        $totalDepartments = Department::count();

        $employeeCount = Employee::count();

        $departmentCount = Department::count();

        $activeEmployee = Employee::where('status', 'Active')->count();

        $recentEmployees = Employee::latest()->take(5)->get();

        return view('dashboard', compact(
            'totalEmployees',
            'activeEmployees',
            'inactiveEmployees',
            'totalDepartments',
            'employeeCount',
            'departmentCount',
            'activeEmployee',
            'recentEmployees',
            'employeeCount',
            'employeePerDepartment'
        ));
    }
}