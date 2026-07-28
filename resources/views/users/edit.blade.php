<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit User
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto">

            <div class="bg-white shadow rounded-lg p-6">

                <h1 class="text-2xl font-bold mb-6">
                    Edit User
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

                <form action="{{ route('users.update', $user->id) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label>Name</label><br>

                        <input
                            type="text"
                            name="name"
                            value="{{ old('name', $user->name) }}"
                            class="border rounded w-full p-2">
                    </div>

                    <div class="mb-4">
                        <label>Email</label><br>

                        <input
                            type="email"
                            name="email"
                            value="{{ old('email', $user->email) }}"
                            class="border rounded w-full p-2">
                    </div>

                    <div class="mb-4">
                        <label>Password</label><br>

                        <input
                            type="password"
                            name="password"
                            class="border rounded w-full p-2">

                        <p class="text-sm text-gray-500 mt-1">
                            Leave blank if you don't want to change the password.
                        </p>
                    </div>

                    <div class="mb-4">
                        <label>Confirm Password</label><br>

                        <input
                            type="password"
                            name="password_confirmation"
                            class="border rounded w-full p-2">
                    </div>

                    <div class="mb-6">
                        <label>Role</label><br>

                        <select
                            name="role"
                            class="border rounded w-full p-2">

                            @foreach($roles as $role)

                                <option
                                    value="{{ $role->name }}"
                                    {{ $user->hasRole($role->name) ? 'selected' : '' }}>

                                    {{ $role->name }}

                                </option>

                            @endforeach

                        </select>
                    </div>

                    <button
                        type="submit"
                        class="bg-yellow-500 hover:bg-yellow-600 text-black px-4 py-2 rounded">

                        Update User

                    </button>

                </form>

            </div>

        </div>
    </div>

</x-app-layout>