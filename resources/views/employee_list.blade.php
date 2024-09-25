<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <a href="/dashboard" class="text-blue-500 font-bold">Dashboard</a> / {{ $employer->name }}
                <h2 class="font-semibold text-xl">List of employees in <span
                        class="text-red-700">{{ $employer->name }}</span></h2>
                <div class="overflow-x-auto mt-6">
                    <table class="min-w-full border-collapse border border-gray-300">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2 border border-gray-300">#</th>
                                <th class="px-4 py-2 border border-gray-300">Employee</th>
                                <th class="px-4 py-2 border border-gray-300">Image</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($employer->employees ?? [] as $employee)
                                <tr>
                                    <td class="px-4 py-2 border border-gray-300">{{ $loop->iteration }}</td>
                                    <td class="px-4 py-2 border border-gray-300">
                                        {{ $employee->name }}<br>
                                        <span class="text-gray-500">{{ $employee->email }}</span>
                                    </td>
                                    <td class="px-4 py-2 border border-gray-300">
                                        @if ($employee->image)
                                            <img src="{{ asset('storage/' . $employee->image) }}"
                                                alt="{{ $employee->name }}" class="h-12 w-12 rounded">
                                        @else
                                            No image
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="px-4 py-2 border border-gray-300 text-center">No
                                        Employees Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
