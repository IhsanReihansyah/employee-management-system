<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Employee Management
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow rounded-lg p-6">

                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="flex justify-between items-center mb-5">

                    <h1 class="text-2xl font-bold">
                        Employee List

                        <form method="GET" action="{{ route('employees.index') }}" class="mb-4">

                            <input type="text" name="search" value="{{ request('search') }}"
                                placeholder="Search employee..." class="border rounded p-2 w-72">

                            <button class="bg-blue-600 text-white px-4 py-2 rounded">

                                Search

                            </button>

                        </form>
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
                                <th class="border p-3">Action</th>
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

                                    <td class="border p-3">

                                        <div class="flex gap-3">

                                            <a href="{{ route('employees.edit', $employee->id) }}" class="text-blue-600">
                                                Edit
                                            </a>

                                            <form action="{{ route('employees.destroy', $employee->id) }}" method="POST">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="text-red-600"
                                                    onclick="return confirm('Are you sure you want to delete this employee?')">

                                                    Delete

                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                    <div class="mt-6">
                        {{ $employees->links() }}
                    </div>

                @else

                    <div class="text-center py-10 text-gray-500">

                        No employees found.

                    </div>

                @endif

            </div>

        </div>
    </div>

</x-app-layout>