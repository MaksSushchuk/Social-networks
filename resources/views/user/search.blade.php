@extends('layouts.main')
@section('content')

<link rel="stylesheet" href="{{asset('css/search.css')}}">

<div id="sidebar">
    <h3>Filters</h3>
    <form id="filter-form" method="GET" enctype="{{route('user.search.index')}}">
        <div class="filter">
            <label for="age-filter">Age:</label>
            <input type="number" name="age" id="age-filter" value="{{old('age')}}">
        </div>
        <div class="filter">
            <label for="gender-filter">Gender:</label>
            <select id="gender-filter" name="sex">
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
        </div>
        <div class="filter">
            <label for="country-filter">Country:</label>
            <input type="text" name="country" id="country-filter" value="{{old('country')}}">
        </div>
        <div class="filter">
            <label for="location-filter">Location:</label>
            <input type="text" name="location" id="location-filter" value="{{old('location')}}">
        </div>
        <div class="filter">
            <label for="birthplace-filter">Birthplace:</label>
            <input type="text" name="birthplace" id="birthplace-filter" value="{{old('birthplace')}}">
        </div>
        <div class="filter">
            <button type="submit" id="apply-filters">Apply Filters</button>
        </div>
    </form>
</div>

<div id="content">
    <div id="search-form">
        <form action="{{route('user.search.index')}}" method="GET">
            <input type="text" name = "text" id="search-input" placeholder="Search by name or surname" value="{{old('text')}}">
            <button type ="submit" id="search-button">Знайти</button>
        </form>
    </div>
    <div id="search-results">
        @foreach ($users as $user)
            <div class="user-card">
                <div class="user-avatar">
                    <img src="{{asset('storage/' . $user->avatar)}}" alt="">
                </div>
                <div class="user-info">
                <h6>{{$user->username}}</h6>
                <p>{{$user->email}}</p>
                <form action="{{route('user.friend.send',$user->id)}}" method="POST">
                    @csrf
                    <input type="submit" value="Дружити">
                </form>
            </div>
        </div>
        @endforeach
        <div class="paginate">
            {{ $users->links() }}
        </div>
    </div>
</div>
@endsection