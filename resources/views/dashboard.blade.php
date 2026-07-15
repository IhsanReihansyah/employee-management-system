<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-8">

        <div class="max-w-7xl mx-auto">

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

                <div class="bg-white shadow rounded-lg p-6 mt-6 lg:col-span-4">
                    <h3 class="text-gray-500">Total Employees</h3>

                    <p class="text-3xl font-bold">
                        {{ $totalEmployees }}
                    </p>
                </div>

                <div class="bg-white shadow rounded-lg p-6 mt-6 lg:col-span-4">
                    <h3 class="text-gray-500">Departments</h3>

                    <p class="text-3xl font-bold">
                        {{ $totalDepartments }}
                    </p>
                </div>

                <div class="bg-white shadow rounded-lg p-6 mt-6 lg:col-span-4">
                    <h3 class="text-gray-500">Active Employees</h3>

                    <p class="text-3xl font-bold text-green-600">
                        {{ $activeEmployees }}
                    </p>
                </div>

                <div class="bg-white shadow rounded-lg p-6 mt-6 lg:col-span-4">
                    <h3 class="text-gray-500">Inactive Employees</h3>

                    <p class="text-3xl font-bold text-red-600">
                        {{ $inactiveEmployees }}
                    </p>
                </div>

                <div class="bg-white shadow rounded-lg p-6 mt-6 lg:col-span-4">

                    <h2 class="text-xl font-bold mb-4">
                        Recent Employees
                    </h2>

                    <table class="w-full">

                        <thead>

                            <tr>
                                <th>Code</th>
                                <th>Name</th>
                                <th>Department</th>
                            </tr>

                        </thead>

                        <tbody>

                            @foreach($recentEmployees as $employee)

                                <tr>

                                    <th>{{ $employee->employee_code }}</th>

                                    <th>{{ $employee->full_name }}</th>

                                    <th>{{ $employee->department->department_name }}</th>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

                <div class="bg-white shadow rounded-lg p-6 mt-6 lg:col-span-4">

                    <h2 class="text-xl font-bold mb-4">
                        Employee by Department
                    </h2>

                    <canvas id="departmentChart" data-labels='@json($employeePerDepartment->pluck("department_name"))'
                        data-values='@json($employeePerDepartment->pluck("employees_count"))'>
                    </canvas>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>