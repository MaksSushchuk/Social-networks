@extends('layouts.auth.main')

@section('content')
<div id="login">
    <h1><strong>Welcome.</strong> Please login.</h1>

    <form action="{{ route('login.store') }}" method="POST">
        @csrf
        <fieldset>
            <input type="text" name="email" value="{{ old('email') }}" placeholder="E-mail" />
            @error('email')
                <span class="text-danger small">{{ $message }}</span>
            @enderror

            <input type="password" name="password" placeholder="Password" />


            <input type="submit" name="signup_submit" value="Log in" />

            <input id="highload0"  name="remember" type="checkbox" value="Forgot me">
            <label for="remember">Forgot me</label></br>
            <a href="{{route('forgot-password.create')}}">Forgot Password ?</a>

        </fieldset>
    </form>

    <p><span class="btn-round">or</span></p>

    <p>Don't have an account yet?</p>
    <button class="btn"><a href="{{route('register.create')}}">Register</a></button>

    <p>
        <a class="facebook-before"><span class="fontawesome-facebook"></span></a>
       <button class="facebook">Login Using Facebook</button>
    </p>

    <p>
        <a class="twitter-before"><span class="fontawesome-twitter"></span></a>
        <button class="twitter">Login Using Twitter</button>
    </p>
</div>
@endsection
