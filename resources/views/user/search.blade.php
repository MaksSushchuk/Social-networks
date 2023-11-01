@extends('layouts.main')
@section('content')

<link rel="stylesheet" href="{{asset('css/search.css')}}">

<div id="sidebar">
    <h3>Filters</h3>
    <form id="filter-form">
        <div class="filter">
            <label for="age-filter">Age:</label>
            <input type="text" id="age-filter">
        </div>
        <div class="filter">
            <label for="gender-filter">Gender:</label>
            <select id="gender-filter">
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
        </div>
        <div class="filter">
            <label for="country-filter">Country:</label>
            <input type="text" id "country-filter">
        </div>
        <div class="filter">
            <label for="location-filter">Location:</label>
            <input type="text" id="location-filter">
        </div>
        <div class="filter">
            <label for="birthplace-filter">Birthplace:</label>
            <input type="text" id="birthplace-filter">
        </div>
        <div class="filter">
            <button id="apply-filters">Apply Filters</button>
        </div>
    </form>
</div>

<div id="content">
    <div id="search-form">
        <input type="text" id="search-input" placeholder="Пошук за ім'ям або прізвищем">
        <button id="search-button">Знайти</button>
    </div>
    <div id="search-results">
        @foreach ($users as $user)
            <div class="user-card">
                <div class="user-avatar">АВ</div>
                <div class="user-info">
                <h6>{{$user->username}}</h6>
                <p>{{$user->email}}</p>
                <p>Дружити</p>
            </div>
        </div>
        @endforeach
        <div class="paginate">
            {{ $users->links() }}
        </div>
    </div>
</div>
@endsection