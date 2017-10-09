@extends('layouts.master')
@section('main-header')
    <h1>{{ __('EXAMPLE') }}
        <small></small>
    </h1>
@endsection
@section('main-content')
	<div class="container" id="app">
        <ul class="nav nav-tabs">
            <router-link to="/example" tag="li" exact>
                <a href="">Example</a>
            </router-link>
            <router-link to="/about" tag="li">
                <a href="">About</a>
            </router-link>
            <router-link to="/contact" tag="li">
                <a href="">Contact</a>
            </router-link>
            <router-link to="/notes" tag="li">
                <a href="#">Notes</a>
            </router-link>
        </ul>

        <router-view></router-view>

    </div>
@endsection