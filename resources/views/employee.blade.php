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
                        Add Employees
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
                                <form id="addEmployeeForm" method="POST"
                                    action="{{ route('employees.store', $employer->id) }}"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="mb-4">
                                        <label for="employee_name"
                                            class="block text-sm font-medium text-gray-700">Employee Name</label>
                                        <input type="text" name="name" id="employee_name"
                                            class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
                                    </div>

                                    <div class="mb-4">
                                        <label for="employee_email"
                                            class="block text-sm font-medium text-gray-700">Employee Email</label>
                                        <input type="email" name="email" id="email"
                                            class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
                                        <span id="emailError" class="text-red-500 text-sm hidden">This email is already
                                            in use. Please choose another one.</span>
                                    </div>

                                    <div class="mb-4">
                                        <label for="employee_image"
                                            class="block text-sm font-medium text-gray-700">Employee Image</label>
                                        <input type="file" name="image" id="employee_image" accept="image/*"
                                            class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                                    </div>

                                    <button type="submit"
                                        class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600 focus:outline-none">
                                        Save Employee
                                    </button>
                                </form>
                                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                <script>
                                    $(document).ready(function() {
                                        $('#email').on('blur', function() {
                                            var email = $(this).val();

                                            $.ajax({
                                                url: "{{ route('check.email') }}",
                                                type: 'GET',
                                                data: {
                                                    email: email
                                                },
                                                success: function(response) {
                                                    if (response.exists) {
                                                        $('#emailError').removeClass('hidden');
                                                        $('#email').val('');
                                                    } else {
                                                        $('#emailError').addClass('hidden');
                                                    }
                                                },
                                                error: function(xhr) {
                                                    console.error(xhr.responseText);
                                                }
                                            });
                                        });
                                    });
                                </script>

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

                    <script>
                        const modal = document.getElementById('myModal');
                        const openModal = document.getElementById('openModal');
                        const closeModal = document.getElementById('closeModal');
                        const closeModalBtn = document.getElementById('closeModalBtn');

                        openModal.addEventListener('click', () => {
                            modal.classList.remove('hidden');
                        });

                        closeModal.addEventListener('click', () => {
                            modal.classList.add('hidden');
                        });

                        closeModalBtn.addEventListener('click', () => {
                            modal.classList.add('hidden');
                        });

                        window.addEventListener('click', (event) => {
                            if (event.target == modal) {
                                modal.classList.add('hidden');
                            }
                        });
                    </script>

                    @include('employee_list')
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
