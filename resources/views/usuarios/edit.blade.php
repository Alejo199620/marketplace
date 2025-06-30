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
        Editar Usuario
    </h2>
</div>
<!-- Page title actions -->
<div class="col-auto ms-auto d-print-none">
    <div class="btn-list">

        <a href="{{ url('usuarios') }}" class="btn btn-primary d-none d-sm-inline-block">
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

<form action="{{ route('usuarios.update', $usuario->id) }}" method="POST" enctype="multipart/form-data" class="col-md-6"
    id="form">

    @csrf
    @method('PUT')


    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ej: Nombre Completo" required
            autofocus value="{{ old('nombre', $usuario->nombre) }}">
        @error('nombre')
            <div class="error">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="text" class="form-control" name="email" id="email" placeholder="example@gmail.com" required
            autofocus value="{{ old('email', $usuario->email) }}">
        @error('email')
            <div class="error">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        @php
            $userImage = $usuario->imagen;
            $isDefault = Str::startsWith($userImage, 'static/avatars/');
            $imagePath = $isDefault ? $userImage : 'img/usuarios/' . basename($userImage);
            $defaultImage = 'static/avatars/avatar.jpg'; // Ruta de tu imagen por defecto
        @endphp

        <a href="{{ asset($userImage ? $imagePath : $defaultImage) }}" data-lightbox="{{ $usuario->nombre }}"
            data-title="{{ $usuario->nombre }}">
            <img src="{{ asset($userImage ? $imagePath : $defaultImage) }}" class="img-category"
                onerror="this.src='{{ asset($defaultImage) }}'">
        </a>
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
    <div class="row">


        <div class="col-md-6 mb-3">
            <label class="form-label">Ciudad</label>
            <select class="form-control" name="ciudad_id" id="ciudad" required autofocus>
                <option value="">Seleccione una ciudad</option>
                @foreach ($ciudades as $ciudad)
                            <option value="{{ $ciudad->id }}" {{ (old('ciudad_id', $usuario->ciudad_id) == $ciudad->id) ? 'selected'
                    : '' }}>
                                {{ $ciudad->nombre }}
                            </option>
                @endforeach
            </select>
            @error('ciudad_id')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label">Rol</label>
            <select class="form-control" name="rol" id="rol" required autofocus>
                <option value="">Seleccione un rol</option>
                <option value="admin" {{ old('rol', $usuario->rol) == 'admin' ? 'selected' : '' }}>Administrador</option>
                <option value="vendedor" {{ old('rol', $usuario->rol) == 'vendedor' ? 'selected' : '' }}>Vendedor</option>
            </select>
            @error('rol')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="row">

            <div class="col-md-6 mb-3">
                <div>
                    <label class="form-label">Movil</label>
                    <input type="text" class="form-control" id="movil" name="movil" required
                        value="{{ old('movil', $usuario->movil) }}">
                    @error('movil')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <div>
                    <label class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password"
                        placeholder="Minimo 8 caracteres" required value="{{ old('password') }}">
                    @error('password')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
    </div>



    <div class="my-3 ">

        <a href="{{ url('usuarios') }}" class="btn btn-link link-secondary">
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
        $('#ciudad').select2({
            placeholder: 'Seleccione una ciudad',
            allowClear: true
        });

        $('#rol').select2({
            placeholder: 'Seleccione un rol',
            allowClear: true
        });
    });

</script>





@stop
