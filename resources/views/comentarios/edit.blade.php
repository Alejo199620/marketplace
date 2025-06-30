@extends('layout')

@section('styles')
<link rel="stylesheet" href="{{ url('css/lightbox.min.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<style>
     .rating {
        display: flex;
        flex-direction: row-reverse;
        justify-content: flex-end;
    }
    .rating > input {
        display: none;
    }
    .rating > label {
        position: relative;
        width: 1.1em;
        font-size: 2rem;
        color: #f5eec8;
        cursor: pointer;
    }
    .rating > label:hover,
    .rating > label:hover ~ label,
    .rating > input:checked ~ label {
        color: #ffc107;
    }
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
        Editar Comentarios
    </h2>
</div>
<!-- Page title actions -->
<div class="col-auto ms-auto d-print-none">
    <div class="btn-list">

        <a href="{{ url('comentarios') }}" class="btn btn-primary d-none d-sm-inline-block">
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

<form action="{{ route('comentarios.update', $comentario->id) }}" method="POST" enctype="multipart/form-data"
    class="col-md-6" id="form">

    @csrf
    @method('PUT')

<div class="mb-3"> <!-- Contenedor del Producto -->
    <span style="font-size: 15px; color: #000000; font-weight: normal;">Producto:    </span>
    <span style="font-size: 30px; color: #da0b0b;">{{ $comentario->producto->titulo ?? 'Sin producto asociado' }}</span>
</div>

<!-- Sección Descripción (agregamos mb-4) -->
<div class="col-lg-12 mb-4"> <!-- Margen inferior agregado -->
    <div>
        <label class="form-label">Descripción</label>
        <textarea class="form-control" rows="3" name="descripcion">{{ old('descripcion', $comentario->descripcion) }}</textarea>
        @error('descripcion')
            <div class="error">{{ $message }}</div>
        @enderror
    </div>
</div>

<!-- Sección Valoración (agregamos mb-4) -->
<div class="mb-4"> <!-- Margen inferior agregado -->
    <label class="form-label">Valoración</label>
    <div class="rating">
        @for($i = 5; $i >= 1; $i--)
            <input type="radio" id="star{{$i}}" name="valoracion" value="{{$i}}"
                {{ old('valoracion', $comentario->valoracion) == $i ? 'checked' : '' }} />
            <label for="star{{$i}}"><i class="fas fa-star"></i></label>
        @endfor
    </div>
    @error('valoracion')
        <div class="error">{{ $message }}</div>
    @enderror
</div>







    <div class="my-3 ">
        <a href="{{ url('comentarios') }}" class="btn btn-link link-secondary">
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
