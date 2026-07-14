<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Employee Management
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow rounded-lg p-6">

                <div class="flex justify-between items-center mb-5">

                    <h1 class="text-2xl font-bold">
                        Employee List
                    </h1>

                    <a href="{{ route('employees.create') }}">
                        + Add Employee
                    </a>

                </div>

                @if($employees->count())

                    <table class="w-full border">

                        <thead class="bg-gray-100">

                            <tr>
                                <th class="border p-3">Code</th>
                                <th class="border p-3">Name</th>
                                <th class="border p-3">Department</th>
                                <th class="border p-3">Position</th>
                                <th class="border p-3">Status</th>
                            </tr>

                        </thead>

                        <tbody>

                            @foreach($employees as $employee)

                                <tr>

                                    <td class="border p-3">{{ $employee->employee_code }}</td>

                                    <td class="border p-3">{{ $employee->full_name }}</td>

                                    <td class="border p-3">{{ $employee->department }}</td>

                                    <td class="border p-3">{{ $employee->position }}</td>

                                    <td class="border p-3">{{ $employee->status }}</td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                @else

                    <div class="text-center py-10 text-gray-500">

                        No employees found.

                    </div>

                @endif

            </div>

        </div>
    </div>

</x-app-layout>