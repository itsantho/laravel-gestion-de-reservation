@extends('layouts.app')

@section('title', 'Accueil')

@section('content')

        <h1>Bienvenue, {{ auth()->user()->name }} !</h1>

@endsection
