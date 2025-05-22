@extends('layout')

@section('header')
  <div class="col">
                
                <h2 class="page-title">
Ciudades

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
        <th scope="col">Nombre</th>   
        <th scope="col">Estado</th>
        <th scope="col">Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach($data as $ciudad)
        <tr>
          <td>{{ $ciudad->nombre }}</td>
          <td>{{ $ciudad->estado }}</td>
          <td>
            <a href="{{ route('categorias.edit', $ciudad->id) }}" class="ui button">Editar</a>
            <form action="{{ route('categorias.destroy', $ciudad->id) }}" method="POST" style="display:inline;">
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