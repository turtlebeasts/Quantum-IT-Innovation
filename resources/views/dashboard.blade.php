<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <button id="openModal" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                        Add Employer
                    </button>

                    <div id="myModal"
                        class="fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center hidden z-50">
                        <!-- Modal Content -->
                        <div class="bg-white w-1/3 p-6 rounded-lg shadow-lg">
                            <!-- Modal Header -->
                            <div class="flex justify-between items-center pb-3">
                                <h2 class="text-xl font-semibold">Add Employee</h2>
                                <button id="closeModal" class="text-gray-600 hover:text-gray-800">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>

                            <!-- Modal Body -->
                            <div class="py-4">
                                <form id="addEmployerForm" method="POST" action="{{ route('employers.store') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-4">
                                        <label for="employer_name"
                                            class="block text-sm font-medium text-gray-700">Employer Name</label>
                                        <input type="text" name="name" id="employer_name"
                                            class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
                                    </div>

                                    <button type="submit"
                                        class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600 focus:outline-none">
                                        Save Employer
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                    @if ($errors->any())
                        <div class="bg-red-100 text-red-700 px-4 py-2 rounded-md">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Modal JavaScript -->
                    <script>
                        // Get modal element and buttons
                        const modal = document.getElementById('myModal');
                        const openModal = document.getElementById('openModal');
                        const closeModal = document.getElementById('closeModal');
                        const closeModalBtn = document.getElementById('closeModalBtn');

                        // Open modal event
                        openModal.addEventListener('click', () => {
                            modal.classList.remove('hidden');
                        });

                        // Close modal event
                        closeModal.addEventListener('click', () => {
                            modal.classList.add('hidden');
                        });

                        closeModalBtn.addEventListener('click', () => {
                            modal.classList.add('hidden');
                        });

                        // Close modal by clicking outside modal content (optional)
                        window.addEventListener('click', (event) => {
                            if (event.target == modal) {
                                modal.classList.add('hidden');
                            }
                        });
                    </script>

                    @include('table')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
