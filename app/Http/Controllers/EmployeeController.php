<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

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

        if ($request->hasFile('photo')) {

            $validated['photo'] = $request
                ->file('photo')
                ->store('employees', 'public');

        }

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
        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
{
    $departments = Department::all();

    return view('employees.edit', compact(
        'employee',
        'departments'
    ));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $validated = $request->validate([
            'employee_code' => 'required|unique:employees,employee_code,' . $employee->id,
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'full_name' => 'required',
            'email' => 'nullable|email',
            'phone' => 'nullable',
            'department_id' => 'required|exists:departments,id',
            'position' => 'required',
            'status' => 'required',
        ]);

        if ($request->hasFile('photo')) {

            if (
                $employee->photo &&
                Storage::disk('public')->exists($employee->photo)
            ) {

                Storage::disk('public')->delete($employee->photo);

            }

            $validated['photo'] = $request
                ->file('photo')
                ->store('employees', 'public');

        }

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

    public function exportPdf()
{
    $employees = Employee::with('department')->get();

    $pdf = Pdf::loadView('employees.pdf', compact('employees'));

    return $pdf->download('employee-report.pdf');
}
}
