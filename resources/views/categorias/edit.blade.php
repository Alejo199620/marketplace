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
            Editar Categoría
        </h2>
    </div>
    <!-- Page title actions -->
    <div class="col-auto ms-auto d-print-none">
        <div class="btn-list">

            <a href="{{ url('categorias') }}" class="btn btn-primary d-none d-sm-inline-block">
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

    <form action="{{ route('categorias.update', $categoria->id) }}" method="POST" enctype="multipart/form-data" class="col-md-6"
        id="form">

        @csrf
        @method('PUT')


        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ej: Camisas" required
                autofocus value="{{ old('nombre', $categoria->nombre) }}">
            @error('nombre')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="row">

            <div class=" mb-3">
                <div>
                    <label class="form-label">Slug</label>
                    <input type="text" class="form-control" id="slug" name="slug" required
                        value="{{ old('slug', $categoria->slug) }}">
                    @error('slug')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class=" mb-3">
                 @if ($categoria->imagen)
                            <a href="{{ url('img/categorias/' . $categoria->imagen) }}"
                                data-lightbox="{{ $categoria->nombre }}" data-title="{{ $categoria->nombre }}">
                                <img src="{{ url('img/categorias/' . $categoria->imagen) }}" class="img-category">
                            </a>
                        @else
                            <a href="{{ url('img/categorias/avatar.png') }}" data-lightbox="{{ $categoria->nombre }}"
                                data-title="{{ $categoria->nombre }}">
                                <img src="{{ url('img/categorias/avatar.png') }}" class="img-category">
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
                    <textarea class="form-control" rows="3" name="descripcion">{{ old('descripcion', $categoria->descripcion) }}</textarea>
                    @error('descripcion')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>



        <div class="my-3 ">

            <a href="{{ url('categorias') }}" class="btn btn-link link-secondary">
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



    <script>
        document.getElementById('nombre').addEventListener('input', function(e) {
            const nombre = e.target.value;
            const slug = generateSlug(nombre);
            document.getElementById('slug').value = slug;
        });

        function generateSlug(text) {
            return text
                .toString()
                .toLowerCase()
                .normalize('NFD') // Normaliza caracteres especiales
                .replace(/[\u0300-\u036f]/g, '') // Elimina acentos
                .replace(/\s+/g, '-') // Reemplaza espacios por guiones
                .replace(/[^\w\-]+/g, '') // Elimina caracteres no permitidos
                .replace(/\-\-+/g, '-') // Reemplaza múltiples guiones por uno solo
                .replace(/^-+/, '') // Elimina guiones al inicio
                .replace(/-+$/, ''); // Elimina guiones al final
        }
    </script>



    <script>
        document.getElementById('form').addEventListener('submit', function(e) {
            const campos = ['nombre', 'slug', 'descripcion'];
            let incompletos = [];

            campos.forEach(id => {
                const campo = document.getElementById(id) || document.querySelector(`[name="${id}"]`);
                if (campo.value.trim() === '') {
                    campo.classList.add('input-error');
                    incompletos.push(campo);
                } else {
                    campo.classList.remove('input-error');
                }
            });

            if (incompletos.length > 0) {
                e.preventDefault();
                Swal.fire({
                    icon: 'warning',
                    title: 'Campos incompletos',
                    text: 'Por favor complete todos los campos obligatorios.',
                    confirmButtonColor: '#3085d6'
                });
            }
        });
    </script>


@stop
