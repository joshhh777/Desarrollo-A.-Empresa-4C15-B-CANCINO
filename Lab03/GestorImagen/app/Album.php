<?php namespace GestorImagen;

use Illuminate\Database\Eloquent\Model;

class Album extends Model implements AuthenticatableContract, CanResetPasswordContract {


	 * @var string
	 */
	protected $table = 'albumes';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['id', 'nombre', 'descripcion', 'usuario_id'];

  public function fotos(){
    return $this->hasMany('GestorImagen\Foto');
  }
  public function propietario(){
    return $this->belongsTo('GestorImagen\Usuario');
  }
}
