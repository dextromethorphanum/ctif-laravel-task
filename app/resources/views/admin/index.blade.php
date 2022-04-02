@extends('layouts.mfadmin')
@section('page_title', 'Admin panel — Main page')

@section('content')
    @parent
    <a href="{{ route('admin.create-user') }}"><button class="adm__button" role="button">Создание нового пользователя</button></a><br>
    <a href="{{ route('admin.roles-management') }}"><button class="adm__button" role="button">Управление ролями пользователей</button></a><br>
    <a href="{{ route('admin.ibans-management') }}"><button class="adm__button" role="button">Управление кодами IBAN</button></a>
@endsection
