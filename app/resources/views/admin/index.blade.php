@extends('layouts.mfadmin')
@section('page_title', 'Admin panel — Main page')

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

    <a href="{{ route('admin.users.create') }}"><button class="adm__button" role="button">Создание нового пользователя</button></a><br>
    <a href="{{ route('admin.roles-management') }}"><button class="adm__button" role="button">Управление ролями пользователей</button></a><br>
    <a href="{{ route('admin.ibans-management') }}"><button class="adm__button" role="button">Управление кодами IBAN</button></a>
@endsection
