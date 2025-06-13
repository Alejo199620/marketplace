@extends('layout')

@section('styles')
<link rel="stylesheet" href="{{ url('css/lightbox.min.css') }}">
<style>
    .error {
        color: red;
        font-size: 0.875em;
        margin-top: 10px;
    }

    .input-error {
        border: 2px solid #e74c3c !important;
        background-color: #ffeaea;
    }




    .img-category {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 10px;
        border: 1px solid #ddd;
        box-shadow: 2px 2px 5px;
        padding: 2px;
    }
</style>
@stop

@section('header')
<div class="col">
    <h2 class="page-title">
        Editar ciudades
    </h2>
</div>
<!-- Page title actions -->
<div class="col-auto ms-auto d-print-none">
    <div class="btn-list">

        <a href="{{ url('ciudades') }}" class="btn btn-primary d-none d-sm-inline-block">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-narrow-left">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M5 12l14 0" />
                <path d="M5 12l4 4" />
                <path d="M5 12l4 -4" />
            </svg>
        </a>
    </div>
</div>
@stop

@section('content')

<form action="{{ route('ciudades.update', $ciudad->id) }}" method="POST" enctype="multipart/form-data" class="col-md-6"
    id="form">

    @csrf
    @method('PUT')


    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ej: cali" required autofocus
            value="{{ old('nombre', $ciudad->nombre) }}">
        @error('nombre')
        <div class="error">{{ $message }}</div>
        @enderror
    </div>



    <div class="my-3 ">

        <a href="{{ url('ciudades') }}" class="btn btn-link link-secondary">
            Cancelar
        </a>

        <button class="btn btn-primary ms-auto">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M12 5l0 14" />
                <path d="M5 12l14 0" />
            </svg>
            Enviar
        </button>
    </div>
</form>

@stop



@section('scripts')


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>





@stop
