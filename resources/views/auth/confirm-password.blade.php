@extends('partials.layout')
@section('content')

<div class="card bg-base-200 w-2/5 shadow-xl mx-auto mt-24">
    <div class="card-body">
        <!-- Informational Text -->
        <div class="mb-4 text-sm text-white-600">
            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
        </div>

        <!-- Password Confirmation Form -->
        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <!-- Password Field -->
            <div class="form-control w-full mb-4">
                <label class="label">
                    <span class="label-text">{{ __('Password') }}</span>
                </label>
                <input id="password" type="password" name="password" class="input input-bordered w-full" required autocomplete="current-password" />
                
                @error('password')
                    <span class="label-text-alt text-error mt-2">{{ $message }}</span>
                @enderror
            </div>

            <!-- Button Section -->
            <div class="flex justify-end mt-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Confirm') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
