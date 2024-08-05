<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard Siswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <div class="overflow-x-auto">
                        <table class="min-w-full border">
                            <thead>
                                <tr>
                                    <th class="border px-4 py-2">Nama</th>
                                    <th class="border px-4 py-2">Foto</th>
                                    <th class="border px-4 py-2">Ekstrakurikuler</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($students as $student)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $student->first_name }} {{ $student->last_name }}</td>
                                        <td class="border px-4 py-2">
                                            @if($student->photo)
                                                <img src="{{ asset('storage/' . $student->photo) }}" alt="Foto Siswa" class="w-32 h-32 object-cover">
                                            @else
                                                <span>Tidak ada foto</span>
                                            @endif
                                        </td>
                                        <td class="border px-4 py-2">
                                            <ul>
                                                @forelse($student->extracurriculars as $extracurricular)
                                                    <li>{{ $extracurricular->extracurricular_name }} ({{ $extracurricular->start_year }})</li>
                                                @empty
                                                    <li>Tidak ada ekstrakurikuler</li>
                                                @endforelse
                                            </ul>
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