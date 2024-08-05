<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Ekstrakurikuler') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <h2 class="text-2xl mb-4">Tambah Ekstrakurikuler</h2>

                    <form action="{{ route('extracurriculars.store') }}" method="POST">
                        @csrf

                        <!-- Student -->
                        <div class="mb-4">
                            <label for="student_id" class="block">Nama Siswa:</label>
                            <select name="student_id" id="student_id" class="border p-2 w-full" required>
                                @foreach($students as $student)
                                    <option value="{{ $student->id }}">{{ $student->first_name }} {{ $student->last_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Nama Ekstrakurikuler -->
                        <div class="mb-4">
                            <label for="extracurricular_name" class="block">Nama Ekstrakurikuler:</label>
                            <input type="text" name="extracurricular_name" id="extracurricular_name" class="border p-2 w-full" required>
                        </div>

                        <!-- Tahun Mulai -->
                        <div class="mb-4">
                            <label for="start_year" class="block">Tahun Mulai:</label>
                            <input type="number" name="start_year" id="start_year" class="border p-2 w-full" required>
                        </div>

                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Tambah
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>