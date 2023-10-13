@extends('layouts.auth.main')

@section('content')
<div id="login">
    <h1>Reset password</h1>

    <form action="{{ route('password.update') }}" method="POST">
        @csrf
        <fieldset>
            <input type="hidden" name = "token" value="{{$request->token}}">
            <input type="text" name="email" value="{{ old('email',$request->email) }}" placeholder="E-mail" />
                @error('email')
                    <span class="text-danger small">{{ $message }}</span>
                @enderror

            <input type="password" name="password"  placeholder="Password" />
                @error('password')
                    <span class="text-danger small">{{ $message }}</span>
                @enderror

            <input type="password" name="password_confirmation" placeholder="Retype password" />
                @error('password_confirmation')
                    <span class="text-danger small">{{ $message }}</span>
                @enderror

            <input type="submit" name="signup_submit" value="Reset password" />

        </fieldset>
    </form>

</div>


@endsection
