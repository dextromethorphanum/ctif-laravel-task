@extends('layouts.mfbase')

@section('footer-included', '')
@section('footer-scripts', '')

@section('auth-link')
    @auth
        <a href="{{ route('logout') }}" class="logo__link">Log out</a>
    @endauth
@endsection
