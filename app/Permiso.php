<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{

    public static function getAccess($rol,$controller,$action) {


        $variable=false;
        $rights_none = array ( 'home' => array ( 'index') );

        $registrado = array_merge_recursive( $rights_none, array (
            'usuario' => array (
             'setting',
                'show'
            ),

            'blog' => array (
                'index',
                'create',
                'store',
                'crear',
                'edit',
                'update',
                'destroy',
                'show'
            ),
            'lugares' => array (
                'index',
                'create',
                'store',
                'edit',
                'update',
                'destroy',
                'show',
                ),
        ) );


        $admin = array (
            'admin' => array (
                'index'
            ),
            'usuario' => array (
                'index',
                'create',
                'store',
                'edit',
                'update',
                'destroy',
                'view',
                'setting',
                'show'

            ),
            'lugaresturisticos' => array (
                'index',
                'create',
                'store',
                'edit',
                'update',
                'destroy',
                'show'),
            'blog' => array (
                'index',
                'create',
                'store',
                'edit',
                'update',
                'destroy',
                'show'),



        );

        $permisos = array ('Administrador' => $admin, 'Registrado'=>$registrado);

        foreach ($permisos[$rol] as $posicion=>$modulos)
        {

            if($posicion==$controller)
            {
                foreach($modulos as $posicion=>$accion)
                {

                    if($action==$accion)
                    {
                        $variable=TRUE;

                    }
                }
            }
        }
        return  $variable;


    }

}
