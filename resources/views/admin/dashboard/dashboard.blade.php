@extends('layouts.admin')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">Dashboard</span> <b>Dashboard</b>
        </h4>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">
                logout
            </button>
        </form>
    </div>
@endsection
