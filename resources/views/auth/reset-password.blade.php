@extends('partials.layout')
{{-- @section('content') --}}
<div class="card bg-base-200 w-2/5 shadow-xl mx-auto my-auto">
    <div class="card-body">
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <label class="form-control w-full">
            <div class="label">
                <span class="label-text">Email</span>
            </div>
            <input type="email" name="email" placeholder="Email" value="{{ old('email', $request->email) }}" class="input input-bordered w-full" required autofocus />
            <div class="label">
                @error('email')
                <span class="label-text-alt text-error">{{ $message }}</span>
                @enderror
            </div>
        </label>


        <!-- Password -->
        <label class="form-control w-full">
            <div class="label">
                <span class="label-text">New Password</span>
            </div>
            <input type="password" name="password" placeholder="New Password" class="input input-bordered w-full @error('password') input-error @enderror" required autocomplete="new-password" />
            <div class="label">
                @error('password')
                <span class="label-text-alt text-error">{{ $message }}</span>
                @enderror
            </div>
        </label>


        <!-- Confirm Password -->
        <label class="form-control w-full">
            <div class="label">
                <span class="label-text">Confirm Password</span>
            </div>
            <input type="password" name="password_confirmation" placeholder="Confirm Password" class="input input-bordered w-full" required autocomplete="new-password" />
            <div class="label">
                @error('password_confirmation')
                <span class="label-text-alt text-error">{{ $message }}</span>
                @enderror
            </div>
        </label>

        <div class="flex justify-between mt-4">
            <a class="link link-primary" href="{{ route('login') }}">Remembered your password?</a>
            <input type="submit" class="btn btn-primary" value="Reset Password">
        </div>
    </form>
</div>
</div>
