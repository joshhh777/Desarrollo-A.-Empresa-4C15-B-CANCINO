<?php namespace GestorImagen;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model implements AuthenticatableContract, CanResetPasswordContract {


  
	 * @var string
	 */
	protected $table = 'fotos';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['id', 'nombre', 'descripcion', 'ruta', 'album_id'];

  public function album(){
    return $this->belongsTo('GestorImagen\Album');
  }

}
