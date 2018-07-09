<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use DB;
class User extends Authenticatable
{
    use Notifiable;
    use EntrustUserTrait;

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
        'id', 'nombre_usuario', 'email', 'contrasenia','apellido_paterno','apellido_materno','genero','estado','descripcion'
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

    public static function getRolesAsigandos($userId) {
        return DB::table('users')
            ->join('role_user','users.id','=','role_user.user_id')
            ->join('roles','roles.id','=','role_user.role_id')
            ->where('users.id', '=', $userId)
            -> select('roles.*')->get();
    }

}
