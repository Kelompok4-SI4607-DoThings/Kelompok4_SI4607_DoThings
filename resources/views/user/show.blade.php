@extends('layouts.app')

@section('title', 'Program Volunteer')

@section('content')
<div class="container py-5">
    <h1 class="text-2xl font-bold mb-6 text-center">Program Volunteer Tersedia</h1>

    @if ($programs->isEmpty())
        <p class="text-center text-gray-600">Belum ada program volunteer yang tersedia saat ini.</p>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($programs as $program)
                <div class="bg-white rounded-xl shadow-md p-5 hover:shadow-lg transition">
                    <h2 class="text-xl font-semibold mb-2">{{ $program->title }}</h2>
                    <p class="text-gray-700 mb-3">{{ Str::limit($program->description, 100) }}</p>
                    <p class="text-sm text-gray-500 mb-2">
                        <strong>Minat:</strong> {{ $program->category ?? 'Tidak ditentukan' }}
                    </p>
                    <p class="text-sm text-gray-500 mb-4">
                        <strong>Lokasi:</strong> {{ $program->location ?? 'Online' }}
                    </p>
                    <a href="{{ route('volunteer.show', $program->id) }}" class="text-blue-600 hover:underline text-sm">
                        Lihat Detail
                    </a>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
