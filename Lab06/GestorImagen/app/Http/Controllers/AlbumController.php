<?php namespace GestorImagen\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use GestorImagen\Album;
use GestorImagen\Http\Requests\CrearAlbumRequest;

class AlbumController extends Controller {

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
	public function getIndex()
	{
		$usuario=Auth::user();
		$albumes=$usuario->albumes;
		return view('albumes.mostrar',['albumes'=>$albumes]);
	}

  public function getCrearAlbum(){
    return view('albumes.crear-album');
  }

  public function postCrearAlbum(CrearAlbumRequest $request){
    $usuario=Auth::user();
		Album::create
		(
			[
				'nombre'=>$request->get('nombre'),
				'descripcion'=>$request->get('descripcion'),
				'usuario_id'=>$usuario->id,
			]
		);
		return redirect('/validado/albumes')->with('creado','El álbum ha sido creado');
  }

  public function getActualizarAlbum(){
    return 'formulario de actualizar Albume';
  }

  public function postActualizarAlbum(){
    return 'actualizar Album';
  }

  public function getEliminarAlbum(){
    return 'formulario de eliminar Album';
  }

  public function postEliminarAlbum(){
    return 'eliminando Album';
  }


}
