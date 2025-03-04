@extends('partials.layout')
@section('content')
<div class="card bg-base-200 w-2/5 shadow-xl mx-auto my-auto">
    <div class="card-body">
        <form method="POST" action="{{ route('login') }}">
            @csrf
           
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">Email</span>
                </div>
                <input type="text" name="email" placeholder="Email" value="{{ old('email') }}" class="input input-bordered w-full" />
                <div class="label">
                    @error('email')
                    <span class="label-text-alt text-error">{{ $message }}</span>
                    @enderror
                </div>
            </label>
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">Password</span>
                </div>
                <input type="password" name="password" placeholder="Password" class="input input-bordered w-full @error('password') input-error @enderror" />
                <div class="label">
                    @error('password')
                    <span class="label-text-alt text-error">{{ $message }}</span>
                    @enderror
                </div>
            </label>
            <div class="form-control w-32">
                <label class="label cursor-pointer">
                  <span class="label-text">Remember me</span>
                  <input name="remmeber" type="checkbox" checked="checked" class="checkbox checkbox-primary" />
                </label>
              </div>
            <div class="flex justify-between">
                <a class="link link-primary" href="{{ route('password.request') }}">Already registered?</a>
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
        </form>
    </div>
</div>
@endsection
