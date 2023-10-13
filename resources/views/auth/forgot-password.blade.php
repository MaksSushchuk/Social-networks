@extends('layouts.auth.main')

@section('content')
<div id="login">
    <h2>Enter your email</h2>

    <form action="{{ route('forgot-password.store') }}" method="POST">
        @csrf
        @if(session('status'))
            <h6>Password reset letter has been sent to your email</h6>
        @endif
        <fieldset>
            <input type="text" name="email" value="{{ old('email') }}" placeholder="E-mail" />
            @error('email')
                <span class="text-danger small">{{ $message }}</span>
            @enderror

            <input type="submit" name="signup_submit" value="Send Reset Link" />

        </fieldset>
    </form>

</div>


@endsection
