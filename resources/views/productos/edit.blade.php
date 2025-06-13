@extends('layout')

@section('styles')
<link rel="stylesheet" href="{{ url('css/lightbox.min.css') }}">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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

    .select2-container {
        z-index: 9999 !important;
    }
</style>
@stop

@section('header')
<div class="col">
    <h2 class="page-title">
        Editar Categoría
    </h2>
</div>
<!-- Page title actions -->
<div class="col-auto ms-auto d-print-none">
    <div class="btn-list">

        <a href="{{ url('productos') }}" class="btn btn-primary d-none d-sm-inline-block">
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

<form action="{{ route('productos.update', $producto->id) }}" method="POST" enctype="multipart/form-data"
    class="col-md-6" id="form">

    @csrf
    @method('PUT')


    <div class="mb-3">
        <label class="form-label">Titulo</label>
        <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Ej: Camisas" required autofocus
            value="{{ old('titulo', $producto->titulo) }}">
        @error('titulo')
        <div class="error">{{ $message }}</div>
        @enderror
    </div>

    <div class="row">

        <div class=" mb-3">
            <div>
                <label class="form-label">Slug</label>
                <input type="text" class="form-control" id="slug" name="slug" required
                    value="{{ old('slug', $producto->slug) }}">
                @error('slug')
                <div class="error">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class=" mb-3">
            @if ($producto->imagen)
            <a href="{{ url('img/productos/' . $producto->imagen) }}" data-lightbox="{{ $producto->nombre }}"
                data-title="{{ $producto->nombre }}">
                <img src="{{ url('img/productos/' . $producto->imagen) }}" class="img-category">
            </a>
            @else
            <a href="{{ url('img/productos/avatar.png') }}" data-lightbox="{{ $producto->nombre }}"
                data-title="{{ $producto->nombre }}">
                <img src="{{ url('img/productos/avatar.png') }}" class="img-category">
            </a>
            @endif
        </div>


        <div class=" mb-3">
            <div>
                <label class="form-label">Imagen</label>
                <input type="file" class="form-control" name="imagen" accept="image/*">
                @error('imagen')
                <div class="error">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="col-lg-12">
            <div>
                <label class="form-label">Descripción</label>
                <textarea class="form-control" rows="3"
                    name="descripcion">{{ old('descripcion', $producto->descripcion) }}</textarea>
                @error('descripcion')
                <div class="error">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    <div class="mb-3">
        <label class="form-label">Valor</label>
        <input type="number" class="form-control" name="valor" id="valor" placeholder="Ej: 100.00" required
            value="{{ old('valor', $producto->valor) }}">
        @error('valor')
        <div class="error">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6 mb-3">
        <div>
            <label class="form-label">Estado producto</label>
            <select class="form-control" name="estado_producto" required>
                <option value="nuevo" {{ old('estado_producto')=='nuevo' ? 'selected' : '' }}>Nuevo
                </option>
                <option value="Poco uso" {{ old('estado_producto')=='Poco uso' ? 'selected' : '' }}>
                    Poco uso</option>
                <option value="usado" {{ old('estado_producto')=='usado' ? 'selected' : '' }}>Usado
                </option>
            </select>
            @error('estado_producto')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>
    </div>



    <div class="my-3 ">

        <a href="{{ url('productos') }}" class="btn btn-link link-secondary">
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function () {
        $('select').select2({
            width: '100%' // elimina dropdownParent si no estás usando un modal
        });

        @if ($errors->any())
            $('#modal-report').modal('show');
        @endif

        document.getElementById('titulo').addEventListener('input', function (e) {
            const titulo = e.target.value;
            const slug = generateSlug(titulo);
            document.getElementById('slug').value = slug;
        });

        function generateSlug(text) {
            return text
                .toString()
                .toLowerCase()
                .normalize('NFD')
                .replace(/[\u0300-\u036f]/g, '')
                .replace(/\s+/g, '-')
                .replace(/[^\w\-]+/g, '')
                .replace(/\-\-+/g, '-')
                .replace(/^-+/, '')
                .replace(/-+$/, '');
        }
    });
</script>
@stop
