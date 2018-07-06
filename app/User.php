<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
class User extends Authenticatable
{
    use Notifiable;

  const ROL_ADMINISTRADOR = 'Administrador';
  const ROL_REGISTRADO    = 'Registrado';
  const ESTADO_ACTIVO    = 'Activo';
  const  ESTADO_INACTIVO = 'Inactivo';

  const MUJER = "Mujer";
  const HOMBRE = "Hombre";

    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre_usuario', 'email', 'contrasenia','apellido_paterno','apellido_materno','genero',
        'rol','estado','descripcion'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'contrasenia', 'remember_token',
    ];

    const ROLE_ADMIN = "Administrador";
    const ROLE_VENTAS = "Ventas";


    public static  function getRoles()
    {
        return  array(User::ROL_ADMINISTRADOR=>User::ROL_ADMINISTRADOR,User::ROL_REGISTRADO=>User::ROL_REGISTRADO);

    }

    public static  function getGeneros()
    {
        return  array('' => ' .. Seleccione ..',User::MUJER=>User::MUJER,User::HOMBRE=>User::HOMBRE);

    }

    public function getAuthPassword()
    {
        return $this->contrasenia;
    }

    public static function getCurrentSession(){
        return Auth::user();
    }

}
