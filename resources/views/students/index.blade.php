<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Data Siswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <div class="flex flex-col md:flex-row justify-between mb-8 font-roboto">
                        <a href="{{ route('students.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-2 md:mb-0 flex items-center">
                            Tambah Siswa
                        </a>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full border" id="studentsTable">
                            <thead>
                                <tr>
                                    <th class="border px-4 py-2">Nama</th>
                                    <th class="border px-4 py-2">Photo</th>
                                    <th class="border px-4 py-2">No HP</th>
                                    <th class="border px-4 py-2">NISN</th>
                                    <th class="border px-4 py-2">Jenis Kelamin</th>
                                    <th class="border px-4 py-2">Alamat</th>
                                    <th class="border px-4 py-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($students as $student)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $student->first_name }} {{ $student->last_name }}</td>
                                        <td class="border px-4 py-2"><img src="{{ asset('storage/' . $student->photo) }}" alt="Foto Siswa" class="mb-4 w-32 h-32 object-cover"></td>
                                        <td class="border px-4 py-2">{{ $student->phone }}</td>
                                        <td class="border px-4 py-2">{{ $student->nisn }}</td>
                                        <td class="border px-4 py-2">{{ $student->gender == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                                        <td class="border px-4 py-2">{{ $student->address }}</td>
                                        <td class="border px-4 py-2 flex space-x-2">
                                          <!-- View Button -->
                                          <a href="{{ route('students.show', $student->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white rounded-full p-2 flex items-center justify-center w-10 h-10">
                                              <span class="material-symbols-outlined text-center">
                                                  visibility
                                              </span>
                                          </a>

                                          <!-- Edit Button -->
                                          <a href="{{ route('students.edit', $student->id) }}" class="bg-green-500 hover:bg-green-600 text-white rounded-full p-2 flex items-center justify-center w-10 h-10">
                                              <span class="material-symbols-outlined text-center">
                                                  edit
                                              </span>
                                          </a>

                                          <!-- Delete Button -->
                                          <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="inline">
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
        $('#studentsTable').DataTable();
    });
</script>