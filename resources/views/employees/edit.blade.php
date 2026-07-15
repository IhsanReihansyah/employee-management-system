<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Employee
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto">

            <div class="bg-white shadow rounded-lg p-6">

                <h1 class="text-2xl font-bold mb-6">
                    Edit Employee
                </h1>

                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>• {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('employees.update', $employee->id) }}" method="POST"
                    enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label>Employee Code</label>
                        <input type="text" name="employee_code"
                            value="{{ old('employee_code', $employee->employee_code) }}"
                            class="border rounded w-full p-2">
                    </div>

                    <div class="mb-4">
                        <label class="block mb-2">Photo</label>

                        <input type="file" name="photo" class="border rounded w-full p-2">
                        
                        @if($employee->photo)

                            <img src="{{ asset('storage/' . $employee->photo) }}" width="120" class="rounded">

                        @endif
                    </div>

                    <div class="mb-4">
                        <label>Full Name</label>
                        <input type="text" name="full_name" value="{{ old('full_name', $employee->full_name) }}"
                            class="border rounded w-full p-2">
                    </div>

                    <div class="mb-4">
                        <label>Email</label>
                        <input type="email" name="email" value="{{ old('email', $employee->email) }}"
                            class="border rounded w-full p-2">
                    </div>

                    <div class="mb-4">
                        <label>Phone</label>
                        <input type="text" name="phone" value="{{ old('phone', $employee->phone) }}"
                            class="border rounded w-full p-2">
                    </div>

                    <div class="mb-4">
                        <label>Department</label>
                        <input type="text" name="department" value="{{ old('department', $employee->department) }}"
                            class="border rounded w-full p-2">
                    </div>

                    <div class="mb-4">
                        <label>Position</label>
                        <input type="text" name="position" value="{{ old('position', $employee->position) }}"
                            class="border rounded w-full p-2">
                    </div>

                    <div class="mb-4">
                        <label>Status</label>

                        <select name="status" class="border rounded w-full p-2">

                            <option value="Active" {{ $employee->status == 'Active' ? 'selected' : '' }}>
                                Active
                            </option>

                            <option value="Inactive" {{ $employee->status == 'Inactive' ? 'selected' : '' }}>
                                Inactive
                            </option>

                        </select>
                    </div>

                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-black px-4 py-2 rounded">

                        Update Employee

                    </button>

                </form>

            </div>

        </div>
    </div>

</x-app-layout>