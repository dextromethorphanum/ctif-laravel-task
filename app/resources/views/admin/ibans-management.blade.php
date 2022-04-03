@extends('layouts.mfadmin')
@section('page_title', 'Admin panel — IBAN management')

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

    <br>
    <a href=" {{ route('admin.ibans.create') }} "><button class="s__btn">Create new IBAN Code</button></a>
    <table class="styled-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Locality code</th>
                <th>Eco-code</th>
                <th>IBAN Code</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ibans as $iban)
                <tr>
                    <td><b>{{ $iban->id }}</b></td>
                    <td>{{ $iban->locality_code }}</td>
                    <td>{{ $iban->eco_code }}</td>
                    <td>{{ $iban->code }}</td>
                    <td>
                        <a class="s__btn" href="{{ route('admin.ibans.edit', $iban->id) }}" role="button">Edit</a>
                        <button type="button" class="s__btn" onclick="event.preventDefault();
                            document.getElementById('delete-iban-form-{{ $iban->id }}').submit();">Delete</button>
                        <form id="delete-iban-form-{{ $iban->id }}" action="{{ route('admin.ibans.destroy', $iban->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
