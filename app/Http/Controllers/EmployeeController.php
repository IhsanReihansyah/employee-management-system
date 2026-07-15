<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $employees = Employee::with('department')
            ->when($search, function ($query) use ($search) {

                $query->where('employee_code', 'like', "%{$search}%")
                    ->orWhere('full_name', 'like', "%{$search}%")
                    ->orWhere('position', 'like', "%{$search}%")
                    ->orWhereHas('department', function ($q) use ($search) {
                        $q->where('department_name', 'like', "%{$search}%");
                    });

            })
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('employees.index', compact('employees', 'search'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::orderBy('department_name')->get();

        return view('employees.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_code' => 'required|unique:employees',
            'full_name' => 'required',
            'email' => 'nullable|email',
            'phone' => 'nullable',
            'department_id' => 'required|exists:departments,id',
            'position' => 'required',
            'status' => 'required',
        ]);

        Employee::create($validated);

        return redirect()
            ->route('employees.index')
            ->with('success', 'Employee added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $validated = $request->validate([
            'employee_code' => 'required|unique:employees,employee_code,' . $employee->id,
            'full_name' => 'required',
            'email' => 'nullable|email',
            'phone' => 'nullable',
            'department' => 'required',
            'position' => 'required',
            'status' => 'required',
        ]);

        $employee->update($validated);

        return redirect()
            ->route('employees.index')
            ->with('success', 'Employee updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()
            ->route('employees.index')
            ->with('success', 'Employee deleted successfully.');
    }
}
