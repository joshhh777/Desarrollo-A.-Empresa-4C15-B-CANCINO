@extends('app')

@section('content')

@if(Session::has('creado'))
  <div class="alert alert-success">
    <p>El álbum ha sido creado</p>
  </div>
@endif

@if(Session::has('actualizado'))
  <div class="alert alert-success">
    <p>El álbum ha sido actualizado.</p>
  </div>
@endif

<div class="container-fluid">
<p><a href="/validado/albumes/crear-album" class="btn btn-primary" role=button>Crear Album</a></p>
@if(sizeof($albumes)>0)
  @foreach($albumes as $album)
  <div class="row">
    <div class="col-sm-6 col-md-12">
      <div class="thumbnail">
        <div class="caption">
          <h3>{{$album->nombre}}</h3>
          <p>{{$album->descripcion}}</p>
          <p><a href="/validado/fotos?id={{$album->id}}" class="btn btn-primary" role=button>Ver Fotos</a></p>
          <p><a href="/validado/albumes/actualizar-album/{{$album->id}}" class="btn btn-primary" role=button>Editar Álbum</a></p>
        </div>
      </div>
    </div>
  </div>
  @endforeach
@else
<div class="alert alert-danger">
  <p>Al parecer no tienes álbumes. Crea uno!!</p>
</div>
@endif
</div>
@endsection
