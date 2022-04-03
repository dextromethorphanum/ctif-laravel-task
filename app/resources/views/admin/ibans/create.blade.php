@extends('layouts.mfadmin')
@section('page_title', 'Admin panel — Create new IBAN code')

@section('content')
    @parent
    <x-guest-layout>
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('admin.ibans.store') }}">
            @csrf

            <!-- IBAN Code -->
            <div>
                <x-label for="code" :value="__('IBAN Code')" />

                <x-input id="code" class="block mt-1 w-full" type="text" name="code" required autofocus />
            </div>

            <!-- Eco codes -->
            <div>
                <x-label for="eco_code" :value="__('Eco code')" class="block mt-4"/>

                <select name="eco_code" style="width: 600px;">
                    @foreach ($eco_codes as $eco_code)
                        <option value="{{ $eco_code->code }}">{{ $eco_code->code }} — {{ $eco_code->label }}</option>
                    @endforeach		
                </select>
            </div>

            <!-- Localities -->
            <div>
                <x-label for="locality_code" :value="__('Locality')" class="block mt-4"/>

                <select name="locality_code" style="width: 600px;">
                    @foreach ($localities as $locality)
                        <option value="{{ $locality->code }}">{{ $locality->code }} — {{ $locality->name }}</option>
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
