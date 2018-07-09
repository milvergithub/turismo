<?php
namespace App;

use Zizaco\Entrust\EntrustRole;
use Zizaco\Entrust\Traits\EntrustRoleTrait;
use DB;

class Role extends EntrustRole
{
    use EntrustRoleTrait;

    protected $fillable = [
        'id', 'name', 'display_name', 'description'
    ];

    public function usuarios()
    {
        return $this->belongsToMany('App\User');
    }

    public static function getPermissionsByRole($roleId) {
        return DB::table('roles')
            ->join('permission_role','roles.id','=','permission_role.role_id')
            ->join('permissions','permissions.id','=','permission_role.permission_id')
            ->where('roles.id', '=', $roleId)
            -> select('permissions.*')->get();
    }
}
