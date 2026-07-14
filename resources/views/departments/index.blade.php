<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Department Management
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
                        Department List
                    </h1>

                    <a href="{{ route('departments.create') }}"
                        class="bg-blue-600 hover:bg-blue-700 text-gray-800 px-4 py-2 rounded">

                        + Add Department

                    </a>

                </div>

                @if($departments->count())

                    <table class="w-full border">

                        <thead class="bg-gray-100">
                            <tr>
                                <th class="border p-3">Code</th>
                                <th class="border p-3">Department</th>
                                <th class="border p-3">Action</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach($departments as $department)

                                <tr>

                                    <td class="border p-3">{{ $department->department_code }}</td>

                                    <td class="border p-3">{{ $department->department_name }}</td>

                                    <td class="border p-3">

                                        <div class="flex gap-3">

                                            <a href="{{ route('departments.edit', $department->id) }}" class="text-blue-600 hover:underline">
                                                Edit
                                            </a>

                                            <form action="{{ route('departments.destroy', $department->id) }}" method="POST">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="text-red-600 hover:underline"
                                                    onclick="return confirm('Are you sure you want to delete this Department?')">

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
                        {{ $departments->links() }}
                    </div>

                @else

                    <div class="text-center py-10 text-gray-500">

                        No departments found.

                    </div>

                @endif

            </div>

        </div>
    </div>

</x-app-layout>