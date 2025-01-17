@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
    
    <p>HOME</p>
    @livewire('prueba')
    @livewire('project-cards')

@endsection