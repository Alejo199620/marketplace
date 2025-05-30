@extends('layout')
 
@section('styles')
 <link rel="stylesheet" href="{{ url('css/lightbox.min.css') }}">
 <style>

    .error {
        color: red;
        font-size: 0.875em;
        margin-top:10px; 
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
      Categorías
                  </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                  <div class="btn-list">
                    
                    <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-report">
                      <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                      Nuevo
                    </a>
                  </div>
                </div>
@stop

@section('content')

    <table class="ui celled table">
      <thead>
       <tr>
        <th scope="col">Imagen</th>
        <th scope="col">Nombre</th>   
        <th scope="col">Url</th>
        <th scope="col">Descripción</th>
        <th scope="col">Estado</th>
        <th scope="col">Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach($data as $categoria)
        <tr>
          <td>
          @if($categoria->imagen)

          <a href="{{ url ('img/categorias/' .$categoria->imagen)}}" data-lightbox="{{$categoria->nombre}}" data-title="{{$categoria->nombre}}">
            <img src="{{ url ('img/categorias/' .$categoria->imagen)}}" class="img-category">
          </a>
          @else
          <a href="{{ url ('img/categorias/avatar.png')}}" data-lightbox="{{$categoria->nombre}}" data-title="{{$categoria->nombre}}">
             <img src="{{ url('img/categorias/avatar.png')}}" class="img-category">
          </a>
         
         @endif
          </td>

          <td>{{ $categoria->nombre }}</td>
          <td>{{ $categoria->slug }}</td>
          <td>{{ $categoria->descripcion }}</td>
          <td>
            @if($categoria->estado==1)
            <span class="badge bg-green text-white">Activo</span>
            @else
            <span class="badge bg-red text-white">Inactivo</span>
            @endif
          
          </td>
          <td>


            <a href="{{ route('categorias.edit', $categoria->id) }}" class="ui button">Editar</a>
            <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" style="display:inline;">
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
 <div class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

          <form action="{{ URL('categorias') }}" method="POST" enctype="multipart/form-data" id="form">

          <div class="modal-header">
            <h5 class="modal-title">Nueva Categoría</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <div class="modal-body">
            
              @csrf
             

              <div class="mb-3">
                  <label class="form-label">Nombre</label>
                  <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ej: Camisas" required autofocus  value="{{ old('nombre') }}">
                  @error('nombre')
                       <div class="error">{{ $message }}</div>
                  @enderror
              </div>

              <div class="row">
                  
                  <div class="col-md-6 mb-3">
                    <div>
                        <label class="form-label">Slug</label>
                        <input type="text" class="form-control" id="slug" name="slug" required value="{{ old('slug') }}">
                        @error('slug')
                          <div class="error">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>

                <div class="col-md-6 mb-3">
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
                      <textarea class="form-control" rows="3" name="descripcion">{{old('descripcion')}}</textarea>
                      @error('descripcion')
                          <div class="error">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
            </div>
              

            
        </div>
          <div class="modal-footer">
            <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
              Cancelar
            </a>
            
            <button class="btn btn-primary ms-auto">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
              Enviar
            </button>
            
          </div>
          </form>
        </div>
        
      </div>
    </div>
@stop

  @section('scripts')

      @if($errors->any())
        <script>
            $(document).ready(function() {
            $('#modal-report').modal('show');
            });
        </script>
      @endif

        <script src="{{ url('js/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ url('js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ url('js/jquery.validate.min.js') }}"></script>
        <script src="{{ url('js/jquery.validate.unobtrusive.min.js') }}"></script>
  <script src="{{ url('js/lightbox.min.js') }}"></script>

        <script>
      // Escucha el evento input en el campo "nombre"
      document.getElementById('nombre').addEventListener('input', function(e) {
        const nombre = e.target.value;
        const slug = generateSlug(nombre);
        document.getElementById('slug').value = slug;
      });

      // Función para generar el slug
      function generateSlug(text) {
        return text
          .toString()                      // Convertir a string
          .toLowerCase()                   // Convertir a minúsculas
          .normalize('NFD')               // Normalizar caracteres Unicode
          .replace(/[\u0300-\u036f]/g, '') // Eliminar acentos
          .replace(/\s+/g, '-')            // Reemplazar espacios por guiones
          .replace(/[^\w\-]+/g, '-')       // Reemplazar caracteres no válidos por guiones
          .replace(/--+/g, '-')            // Reemplazar múltiples guiones por uno solo
          .replace(/^-+/, '')              // Eliminar guiones al inicio
          .replace(/-+$/, '');             // Eliminar guiones al final
      }
</script>
    @stop