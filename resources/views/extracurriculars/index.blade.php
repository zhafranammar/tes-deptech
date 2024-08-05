<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Data Ekstrakurikuler Siswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <div class="flex flex-col md:flex-row justify-between mb-8 font-roboto">
                        <a href="{{ route('extracurriculars.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-2 md:mb-0 flex items-center">
                            Tambah Ekstrakurikuler
                        </a>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full border" id="extracurricularsTable">
                            <thead>
                                <tr>
                                    <th class="border px-4 py-2">Nama Ekstrakurikuler</th>
                                    <th class="border px-4 py-2">Tahun Mulai</th>
                                    <th class="border px-4 py-2">Nama Siswa</th>
                                    <th class="border px-4 py-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($extracurriculars as $extracurricular)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $extracurricular->extracurricular_name }}</td>
                                        <td class="border px-4 py-2">{{ $extracurricular->start_year }}</td>
                                        <td class="border px-4 py-2">{{ $extracurricular->student->first_name }} {{ $extracurricular->student->last_name }}</td>
                                        <td class="border px-4 py-2 flex space-x-2">
                                            <a href="{{ route('extracurriculars.show', $extracurricular->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white rounded-full p-2 flex items-center justify-center w-10 h-10">
                                              <span class="material-symbols-outlined text-center">
                                                  visibility
                                              </span>
                                            </a>
                                            <!-- Edit Button -->
                                            <a href="{{ route('extracurriculars.edit', $extracurricular->id) }}" class="bg-green-500 hover:bg-green-600 text-white rounded-full p-2 flex items-center justify-center w-10 h-10">
                                                <span class="material-symbols-outlined text-center">
                                                    edit
                                                </span>
                                            </a>

                                            <!-- Delete Button -->
                                            <form action="{{ route('extracurriculars.destroy', $extracurricular->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white rounded-full p-2 flex items-center justify-center w-10 h-10" onclick="return confirm('Are you sure?')">
                                                    <span class="material-symbols-outlined text-center">
                                                        delete
                                                    </span>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    $(document).ready(function() {
        $('#extracurricularsTable').DataTable();
    });
</script>