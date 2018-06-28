<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Routing\Router;
class Permiso
{
    /**
     * Permiso constructor.
     * @param Guard $hua
     */

    private $auth;

    protected $router;
    public function  __construct(Guard $hua, Router $router)
    {
        $this->auth = $hua;
        $this->router = $router;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $lista =  explode('.',$this->router->current()->getAction()['as']);
        $controller= $lista[0];
        $action =$lista[1];
        if (!\App\Permiso::getAccess($this->auth->user()->rol, $controller, $action)) {

            return redirect()->to('home');
        }

        return $next($request);
    }
}
