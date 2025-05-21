@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Komunitas</h2>

    @if ($communities->isEmpty())
        <p>Tidak ada komunitas yang tersedia.</p>
    @else
        <ul>
            @foreach ($communities as $community)
                <li>
                    <strong>{{ $community->name }}</strong><br>
                    {{ $community->description }}
                </li>
                <hr>
            @endforeach
        </ul>
    @endif
</div>
@endsection
