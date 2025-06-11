@extends('layout')


@section('styles')
<link rel="stylesheet" href="{{ url('css/lightbox.min.css') }}">
<style>
    .error {
        color: red;
        font-size: 0.875em;
        margin-top: 10px;
    }

    .img-category {
        width: 32px;
        height: 32px;
        object-fit: cover;
        border-radius: 50px;
        border: 1px solid #ddd;
        box-shadow: 2px 2px 5px;
    }
</style>
@stop

@section('header')
<div class="col">

    <h2 class="page-title">
        Bienvenido {{ Auth::user()->nombre }} a tu paner de Control

    </h2>
    <small class="text-muted">Rol {{ Auth::user()->rol}}</small>

</div>
@stop

@section('content')

Aqui van los graficos......
@stop
