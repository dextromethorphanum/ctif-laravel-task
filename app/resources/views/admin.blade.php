@extends('layouts.mfbase')
@section('page_title', 'Admin panel — Main page')

@section('content')
    @parent <br>
    — btn_1: форма создания нового пользователя (указать имя, e-mail, пароль, роль).<br>
    — btn_2: форма для назначения ролей для существующих пользователей.<br>
    — btn_3: форма для управления кодами IBAN.<br>
@endsection
