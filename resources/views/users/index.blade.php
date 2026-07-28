<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl">
            User Management
        </h2>
    </x-slot>

    <div class="py-8">

        <div class="max-w-7xl mx-auto">

            <div class="bg-white shadow rounded-lg p-6">

                <div class="flex justify-between mb-6">

                    <h1 class="text-2xl font-bold">
                        User List
                    </h1>

                    <a href="{{ route('users.create') }}" class="bg-blue-600 text-black px-4 py-2 rounded">

                        + Add User

                    </a>

                </div>

                <table class="w-full border">

                    <thead class="bg-gray-100">

                        <tr>

                            <th class="border p-3">Name</th>

                            <th class="border p-3">Email</th>

                            <th class="border p-3">Role</th>

                            <th class="border p-3">Action</th>

                        </tr>

                    </thead>

                    <tbody>

                        @foreach($users as $user)

                            <tr>

                                <td class="border p-3">
                                    {{ $user->name }}
                                </td>

                                <td class="border p-3">
                                    {{ $user->email }}
                                </td>

                                <td class="border p-3">

                                    {{ $user->roles->pluck('name')->join(', ') }}

                                </td>

                                <td class="border p-3">

                                    <a href="{{ route('users.edit', $user->id) }}" class="text-blue-600">

                                        Edit

                                    </a>

                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="text-red-600"
                                            onclick="return confirm('Delete this user?')">

                                            Delete

                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

                <div class="mt-5">

                    {{ $users->links() }}

                </div>

            </div>

        </div>

    </div>

</x-app-layout>