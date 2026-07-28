<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl">
            Add User
        </h2>
    </x-slot>

    <div class="py-8">

        <div class="max-w-3xl mx-auto">

            <div class="bg-white shadow rounded-lg p-6">

                <h1 class="text-2xl font-bold mb-6">
                    Add New User
                </h1>

                @if ($errors->any())

                    <div class="bg-red-100 border border-red-400 text-red-700 p-4 rounded mb-4">

                        <ul>

                            @foreach ($errors->all() as $error)

                                <li>• {{ $error }}</li>

                            @endforeach

                        </ul>

                    </div>

                @endif

                <form action="{{ route('users.store') }}" method="POST">

                    @csrf

                    <div class="mb-4">

                        <label>Name</label>

                        <input
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            class="border rounded w-full p-2">

                    </div>

                    <div class="mb-4">

                        <label>Email</label>

                        <input
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            class="border rounded w-full p-2">

                    </div>

                    <div class="mb-4">

                        <label>Password</label>

                        <input
                            type="password"
                            name="password"
                            class="border rounded w-full p-2">

                    </div>

                    <div class="mb-4">

                        <label>Confirm Password</label>

                        <input
                            type="password"
                            name="password_confirmation"
                            class="border rounded w-full p-2">

                    </div>

                    <div class="mb-6">

                        <label>Role</label>

                        <select
                            name="role"
                            class="border rounded w-full p-2">

                            @foreach($roles as $role)

                                <option value="{{ $role->name }}">
                                    {{ $role->name }}
                                </option>

                            @endforeach

                        </select>

                    </div>

                    <button
                        class="bg-blue-600 text-black px-5 py-2 rounded">

                        Save User

                    </button>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>