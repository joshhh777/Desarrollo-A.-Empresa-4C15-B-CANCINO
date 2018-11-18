@extends('app')

@section('content')

@if(Session::has('editada'))
  <div class="alert alert-success">
    <p>La foto fué editada.</p>
  </div>
@endif

@if(Session::has('eliminada'))
  <div class="alert alert-success">
    <p>La foto fué eliminada.</p>
  </div>
@endif

<div class="container-fluid">
<p><a href="/validado/fotos/crear-foto?id={{$id}}" class="btn btn-primary" role=button>Crear Foto</a></p>
@if(sizeof($fotos)>0)
  @foreach($fotos as $foto)
  <div class="row">
    <div class="col-sm-6 col-md-12">
      <div class="thumbnail">
        <img src="{{$foto->ruta}}">
          <div class="caption">
            <h3>{{$foto->nombre}}</h3>
            <p>{{$foto->descripcion}}</p>
          </div>
          <p><a href="/validado/fotos/actualizar-foto/{{$foto->id}}" class="btn btn-primary" role=button>Editar Foto</a></p>
          <form action="/validado/fotos/eliminar-foto" method="POST">
            <input type="hidden" name="_token" value="{{csrf_token()}}" required>
            <input type="hidden" name="id" value="{{$foto->id}}" required>
            <input class="btn btn-danger" role="button" type="submit" value="Eliminar">
          </form>
      </div>
    </div>
  </div>
  @endforeach
@else
<div class="alert alert-danger">
  <p>Al parecer este álbum no tiene fotos. Crea una!!</p>
</div>
@endif
</div>
@endsection
fotos
