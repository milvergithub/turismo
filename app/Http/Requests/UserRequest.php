<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\User;
use Illuminate\Routing\Route;

class UserRequest extends FormRequest
{
   private $route;
    public function  __construct(Route $route )
    {
        $this->route = $route;
          }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch($this->method())
        {
            case 'GET':
            case 'DELETE':
                {
                    return [];
                }
            case 'POST':
                {
                    return [
                        'user.name.first' => 'required',
                        'user.name.last'  => 'required',
                        'user.email'      => 'required|email|unique:users,email',
                        'user.password'   => 'required|confirmed',
                    ];
                }
            case 'PUT':
            case 'PATCH':
                {
                    return [
                          'nombre_usuario' => 'required|string|max:255|unique:usuarios,nombre_usuario,'.$this->route->parameter('usuario'),
                           'email' => 'required|string|email|max:255|unique:usuarios,email,'.$this->route->parameter('usuario')
                    ];
                }
            default:break;
        }
    }
}
