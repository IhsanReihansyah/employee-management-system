<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Department
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto">

            <div class="bg-white shadow rounded-lg p-6">

                <h1 class="text-2xl font-bold mb-6">
                    Edit Department
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

                <form action="{{ route('departments.update', $department->id) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label>Code</label>
                        <input type="text" name="department_code"
                            value="{{ old('department_code', $department->department_code) }}"
                            class="border rounded w-full p-2">
                    </div>

                    <div class="mb-4">
                        <label>Department</label>
                        <input type="text" name="department_name" value="{{ old('department_name', $department->department_name) }}"
                            class="border rounded w-full p-2">
                    </div>

                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-black px-4 py-2 rounded">

                        Update Department

                    </button>

                </form>

            </div>

        </div>
    </div>

</x-app-layout>