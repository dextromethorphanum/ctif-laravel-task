@extends('layouts.mfadmin')
@section('page_title', 'Admin panel — Roles management')

@section('content')
    @parent

    @if(session()->has('message-success'))
        <div class="alert alert-success">
            {{ session()->get('message-success') }}
        </div>
    @elseif(session()->has('message-error'))
        <div class="alert alert-error">
            <b>{{ session()->get('message-error') }}</b>
        </div>
    @elseif(session()->has('message-info'))
        <div class="alert alert-info">
            {{ session()->get('message-info') }}
        </div>
    @endif

    <table class="styled-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>E-Mail</th>
                <th>Roles</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <th>{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>?</td>
                    <td><a class="s__btn" href="{{ route('admin.users.edit', $user->id) }}" role="button">Edit roles</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
