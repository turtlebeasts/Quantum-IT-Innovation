<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h2 class="font-semibold text-xl">Employers List</h2>
                <div class="overflow-x-auto mt-6">
                    <table class="min-w-full border-collapse border border-gray-300">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2 border border-gray-300">#</th>
                                <th class="px-4 py-2 border border-gray-300">Employer Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($employers as $employer)
                                <tr>
                                    <td class="px-4 py-2 border border-gray-300">{{ $loop->iteration }}</td>
                                    <td class="px-4 py-2 border border-gray-300">
                                        <a
                                            href="{{ route('employers.employees', $employer->id) }}">{{ $employer->name }}</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="px-4 py-2 border border-gray-300 text-center">No
                                        Employers Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
