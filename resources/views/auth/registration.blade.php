@extends('layouts.auth.main')
@section('content')

<div id="login">

    <h2><strong>Welcome.</strong> Please register.</h2>

    <form action="{{route('register.store')}}" method="POST" enctype="multipart/form-data">

      <fieldset>
            @csrf
            <input type="text" name="username" value="{{old('username')}}" placeholder="Username" />
            @error('username')
                <span class="text-danger small">{{ $message }}</span>
            @enderror
            <input type="text" name="email" value="{{old('email')}}" placeholder="E-mail" />
            @error('email')
                <span class="text-danger small">{{ $message }}</span>
            @enderror
            <p>Avatar</p>
            <input type="file" name="avatar" />
            @error('avatar')
                <span class="text-danger small">{{ $message }}</span>
            @enderror
            <input type="password" name="password"  placeholder="Password" />
            @error('password')
                <span class="text-danger small">{{ $message }}</span>
            @enderror
            <input type="password" name="password_confirmation" placeholder="Retype password" />

            <input type="submit" name="signup_submit" value="Sign me up" />

            <a href="{{route('forgot-password.create')}}">Forgot Password ?</a>

      </fieldset>

    </form>
    <p>You already have an account ?</p>
    <button class="btn"><a href="{{route('login.index')}}">Login</a></button>


    <p>

      <a class="facebook-before"><span class="fontawesome-facebook"></span></a>
      <button class="facebook">Login Using Facbook</button>

    </p>

    <p>

      <a class="twitter-before"><span class="fontawesome-twitter"></span></a>
      <button class="twitter">Login Using Twitter</button>

    </p>

  </div>


@endsection
