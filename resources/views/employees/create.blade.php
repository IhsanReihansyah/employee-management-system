<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add Employee
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto">

            <div class="bg-white shadow rounded-lg p-6">

                <h1 class="text-2xl font-bold mb-6">
                    Add New Employee
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

                <form action="{{ route('employees.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label>Employee Code</label><br>
                        <input type="text" name="employee_code" class="border rounded w-full p-2">
                    </div>

                    <div class="mb-4">
                        <label>Full Name</label><br>
                        <input type="text" name="full_name" class="border rounded w-full p-2">
                    </div>

                    <div class="mb-4">
                        <label>Email</label><br>
                        <input type="email" name="email" class="border rounded w-full p-2">
                    </div>

                    <div class="mb-4">
                        <label>Phone</label><br>
                        <input type="text" name="phone" class="border rounded w-full p-2">
                    </div>

                    <div class="mb-4">
                        <label>Department</label><br>
                        <input type="text" name="department" class="border rounded w-full p-2">
                    </div>

                    <div class="mb-4">
                        <label>Position</label><br>
                        <input type="text" name="position" class="border rounded w-full p-2">
                    </div>

                    <div class="mb-4">
                        <label>Status</label><br>

                        <select name="status" class="border rounded w-full p-2">

                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>

                        </select>
                    </div>

                    <button type="submit">
                        Save Employee
                    </button>

                </form>

            </div>

        </div>
    </div>

</x-app-layout>