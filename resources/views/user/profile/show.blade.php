@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Your Profile</h1>
    <ul>
        <li>Name: {{ $user->name }}</li>
        <li>Email: {{ $user->email }}</li>
        <li>Phone: {{ $user->phone_number }}</li>
    </ul>

    <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>

    <form action="{{ route('profile.destroy') }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete Account</button>
    </form>
</div>
@endsection
