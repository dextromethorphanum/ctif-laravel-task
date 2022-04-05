@extends('layouts.mfadmin')
@section('page_title', 'Admin panel — Create new user')

@section('content')
    @parent
    <x-guest-layout>
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('admin.users.store') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Roles -->
            <div class="mt-4">
                <x-label :value="__('Roles')" />
                @foreach($roles as $role)
                    <div class="form-check">
                        <input class="form-check-input" name="roles[]" type="checkbox" value="{{ $role->role_id }}" id="{{ $role->role_name }}">
                        <label class="form-check-label" for="{{ $role->role_name }}">{{ $role->role_name }}</label>
                    </div>
                @endforeach
            </div>

            <!-- Districts -->
            <div id="districts_div" style="display: none">
                <x-label for="district" :value="__('District')" class="block mt-4"/>

                <select name="district_code" style="width: 600px;">
                    @foreach ($districts as $district)
                        <option value="{{ $district->code }}">{{ $district->code }} — {{ $district->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Create') }}
                </x-button>
            </div>
        </form>
    </x-guest-layout>
@endsection

@section('footer-scripts')
    <script type="text/javascript" src="{{ asset('js/jquery-2.1.4.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/roles.js') }}"></script>
@endsection
