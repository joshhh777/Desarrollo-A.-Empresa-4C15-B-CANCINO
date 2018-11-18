<?php namespace GestorImagen\Http\Controllers;

use GestorImagen\Album;
use GestorImagen\Foto;
use GestorImagen\Http\Requests\MostrarFotosRequest;
use GestorImagen\Http\Requests\CrearFotoRequest;
use Illuminate\Http\Request;
use Carbon\Carbon;

class FotoController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function getIndex(MostrarFotosRequest $request)
	{
		$id=$request->get('id');
		$album=Album::find($id);
		$fotos=$album->fotos;
		return view('fotos.mostrar',['fotos'=>$fotos, 'id'=>$id]);
	}

  public function getCrearFoto(Request $request){
    $id=$request->get('id');
		return view('fotos.crear-foto',['id'=>$id]);
  }

  public function postCrearFoto(CrearFotoRequest $request){
		$id=$request->get('id');
		$imagen=$request->file('imagen');
		$ruta='/img/';
		$nombre=sha1(Carbon::now()).".".$imagen->guessExtension();
		$imagen->move(getcwd().$ruta,$nombre);
		Foto::create(
			[
				'nombre'=>$request->get('nombre'),
				'descripcion'=>$request->get('descripcion'),
				'ruta'=>$ruta.$nombre,
				'album_id'=>$id,
			]
		);
		return redirect("/validado/fotos?id=$id")->with('creada','La foto ha sido subida');
  }

  public function getActualizarFoto(){
    return 'formulario de actualizar fotos';
  }

  public function postActualizarFoto(){
    return 'actualizar foto';
  }

  public function getEliminarFoto(){
    return 'formulario de eliminar fotos';
  }

  public function postEliminarFoto(){
    return 'eliminando foto';
  }

  public function missingMethod($parameters = array()){
    abort(404);
  }

}
