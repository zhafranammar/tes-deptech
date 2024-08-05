<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Siswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <h2 class="text-2xl mb-4">Edit Siswa</h2>

                    <form action="{{ route('students.update', $student->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- First Name -->
                        <div class="mb-4">
                            <label for="first_name" class="block">Nama Depan:</label>
                            <input type="text" name="first_name" id="first_name" class="border p-2 w-full" value="{{ $student->first_name }}" required>
                        </div>

                        <!-- Last Name -->
                        <div class="mb-4">
                            <label for="last_name" class="block">Nama Belakang:</label>
                            <input type="text" name="last_name" id="last_name" class="border p-2 w-full" value="{{ $student->last_name }}" required>
                        </div>

                        <!-- Phone -->
                        <div class="mb-4">
                            <label for="phone" class="block">Nomor HP:</label>
                            <input type="text" name="phone" id="phone" class="border p-2 w-full" value="{{ $student->phone }}" required>
                        </div>

                        <!-- NISN -->
                        <div class="mb-4">
                            <label for="nisn" class="block">NISN:</label>
                            <input type="text" name="nisn" id="nisn" class="border p-2 w-full" value="{{ $student->nisn }}" required>
                        </div>

                        <!-- Address -->
                        <div class="mb-4">
                            <label for="address" class="block">Alamat:</label>
                            <textarea name="address" id="address" class="border p-2 w-full" required>{{ $student->address }}</textarea>
                        </div>

                        <!-- Gender -->
                        <div class="mb-4">
                            <label for="gender" class="block">Jenis Kelamin:</label>
                            <select name="gender" id="gender" class="border p-2 w-full" required>
                                <option value="L" {{ $student->gender == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="P" {{ $student->gender == 'P' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>

                        <!-- Photo -->
                        <div class="mb-4">
                            <label for="photo" class="block">Foto:</label>
                            <!-- Display existing photo if available -->
                            @if($student->photo)
                                <img src="{{ asset('storage/' . $student->photo) }}" alt="Foto Siswa" class="mb-4 w-32 h-32 object-cover">
                            @endif
                            <input type="file" name="photo" id="photo" class="border p-2 w-full">
                        </div>

                        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                            Submit
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
