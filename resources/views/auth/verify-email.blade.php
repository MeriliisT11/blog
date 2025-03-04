@extends('partials.layout')

@section('content')
<div class="card bg-base-200 w-2/5 shadow-xl mx-auto mt-24">
    <div class="card-body">
        <!-- Informational Text -->
        <div class="mb-4 text-sm text-white-600">
            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div>

        <!-- Status Message -->
        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
        @endif

        <!-- Button Section -->
        <div class="flex justify-between items-center mt-4">
            <!-- Resend Verification Form -->
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button class="btn btn-primary">
                    {{ __('Resend Verification Email') }}
                </button>
            </form>

            <!-- Logout Form -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-outline btn-secondary">
                    {{ __('Log Out') }}
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
