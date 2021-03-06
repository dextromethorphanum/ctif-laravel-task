@extends('layouts.mfadmin')
@section('page_title', 'Admin panel — Edit user roles')

@section('content')
    @parent
    <x-guest-layout>
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <p>User: <b>{{ $user->name }}</b></p>
        <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
            @method('PUT')
            @csrf

            <!-- Roles -->
            <div class="mt-4">
                <x-label :value="__('Roles')" />
                @foreach($roles as $role)
                    <div class="form-check">
                        <input class="form-check-input" name="roles[]" type="checkbox" value="{{ $role->role_id }}" id="{{ $role->role_name }}" @if($user->id == Auth::id() && $role->role_name === 'admin') disabled @elseif(in_array($role->role_id, $user->roles->pluck('role_id')->toArray())) checked @endif>
                        <label style="pointer-events:none;" class="form-check-label" for="{{ $role->role_name }}">{{ $role->role_name }}</label>
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
                    {{ __('Edit') }}
                </x-button>
            </div>
        </form>
    </x-guest-layout>
@endsection

@section('footer-scripts')
    <script type="text/javascript" src="{{ asset('js/jquery-2.1.4.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/roles.js') }}"></script>
@endsection
