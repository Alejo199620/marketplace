@extends('layout')

@section('styles')
    <link rel="stylesheet" href="{{ url('css/lightbox.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <style>
        <style>.error {
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


        .select2-container {
            z-index: 9999 !important;
        }
    </style>

    </style>
@stop

@section('header')
    <div class="col">

        <h2 class="page-title">
            Usuarios

        </h2>
    </div>
    <!-- Page title actions -->
    <div class="col-auto ms-auto d-print-none">
        <div class="btn-list">

            <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal"
                data-bs-target="#modal-report">
                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                    stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M12 5l0 14" />
                    <path d="M5 12l14 0" />
                </svg>
                Nuevo
            </a>

        </div>
    </div>
@stop

@section('content')

    <table class="ui celled table">


        <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Movil</th>
                <th scope="col">Email</th>
                <th scope="col">Ciudad</th>
                <th scope="col">Estado</th>
                <th scope="col">Rol</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $usuario)
                <tr>
                    <td>{{ $usuario->nombre }}</td>
                    <td>{{ $usuario->movil }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>{{ $usuario->ciudad->nombre }}</td>
                    <td>
                        @if ($usuario->estado == 1)
                            <span class="badge bg-green text-white">Activo</span>
                        @else
                            <span class="badge bg-red text-white">Inactivo</span>
                        @endif

                    </td>
                    <td>{{ $usuario->rol }}</td>

                    <td>
                        <a href="{{ route('usuarios.edit', $usuario->id) }}" class="ui button">Editar</a>
                        <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="ui button red">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@stop

@section('modals')
    @php
        $ciudades = \App\Models\Ciudad::all();
    @endphp

    <div class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">

                <form action="{{ URL('usuarios') }}" method="POST" enctype="multipart/form-data" id="form">

                    <div class="modal-header">
                        <h5 class="modal-title">Nuevo Usuario</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">

                        @csrf


                        <div class="mb-3">
                            <label class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="nombre"
                                placeholder="Ej: Nombre Completo" required autofocus value="{{ old('nombre') }}">
                            @error('nombre')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="text" class="form-control" name="email" id="email"
                                placeholder="example@gmail.com" required autofocus value="{{ old('email') }}">
                            @error('email')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">


                            <div class="col-md-6 mb-3">
                                <label class="form-label">Ciudad</label>
                                <select class="form-control" name="ciudad_id" id="ciudad" required autofocus>
                                    <option value="">Seleccione una ciudad</option>
                                    @foreach ($ciudades as $ciudad)
                                        <option value="{{ $ciudad->id }}"
                                            {{ old('ciudad_id') == $ciudad->id ? 'selected' : '' }}>
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
                                    <option value="admin" {{ old('rol') == 'admin' ? 'selected' : '' }}>Administrador
                                    </option>
                                    <option value="vendedor" {{ old('rol') == 'vendedor' ? 'selected' : '' }}>Vendedor
                                    </option>
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
                                            value="{{ old('movil') }}">
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
                            <div class="modal-footer">
                                <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                                    Cancelar
                                </a>

                                <button class="btn btn-primary ms-auto">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M12 5l0 14" />
                                        <path d="M5 12l14 0" />
                                    </svg>
                                    Enviar
                                </button>

                            </div>
                </form>
            </div>

        </div>
    </div>
@stop

@section('scripts')



    @if ($errors->any())
        <script>
            $(document).ready(function() {
                $('#modal-report').modal('show');
            });
        </script>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            function initSelect2() {
                $('#ciudad').select2({
                    dropdownParent: $('#modal-report'),
                    placeholder: "Seleccione una ciudad",
                    width: '100%'
                });

                $('#rol').select2({
                    dropdownParent: $('#modal-report'),
                    placeholder: "Seleccione un rol",
                    width: '100%'
                });
            }

            initSelect2();

            @if ($errors->any())
                $('#modal-report').modal('show');
            @endif

            $('#modal-report').on('shown.bs.modal', function() {
                initSelect2();
            });
        });
    </script>


@stop
