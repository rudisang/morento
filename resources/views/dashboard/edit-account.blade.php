@extends('layouts.main')

@section('content')
<nav class="black">
    <div class="container">
        <div class="nav-wrapper">
            <a href="/dashboard" class="breadcrumb teal-text">Dashboard</a> 
            <a href="/dashboard/account" class="breadcrumb teal-text">My Account</a>
            <a class="breadcrumb grey-text">{{Auth::user()->email}}</a>
        </div>
    </div>
</nav>
    <section class="container">
        <x-flash-messages />
    </section>
    <section class="container" style="margin-top:10px">
        <x-edit-user-form />
    </section>

    <section class="container" style="margin-top:10px">
        <x-edit-password-form />
    </section>
@endsection