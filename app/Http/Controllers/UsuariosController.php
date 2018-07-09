<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;

use Yajra\Datatables\Datatables;
use App\User;

use App\Http\Requests\UserRequest;
use App\Notificacion;
use Illuminate\Support\Facades\Auth;
class UsuariosController extends Controller
{
    public function index()
    {
        return view('usuarios.index');
    }

    /**
     * Displays datatables front end view
     *
     * @return \Illuminate\View\View
     */
    public function getIndex()
    {

        //return view('usuarios.index');
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function data()
    {

        return Datatables::of(User::query())
            ->addColumn('action', function ($user) {
                return '<a href="'.route('usuario.edit',$user->id).'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
            })
            ->make(true);
    }

    public function usuarios()
    {
        return view('usuarios');
    }
    public function edit($id)
    {
        $user = User::find($id);
        $rolesUser = User::getRolesAsigandos($user->id);
        $roles = Role::all();
        foreach ($rolesUser as $roleUser) {
            foreach ($roles as $role) {
                if ($roleUser->id === $role->id) {
                    $role->selected = true;
                }
            }
        }
        return view('usuarios.edit')
            ->with(['model' => $user,
                'rolesAssigned' => $roles]);

    }
    public function update(UserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->fill($request->all());
        $user->save();
        $roles = [];
        if (!empty($request->get("roles"))) {
            foreach ($request->get("roles") as $item) {
                array_push($roles, $item);
            }
        }
        $user->roles()->sync($roles);
        return redirect()->route('usuario.index');
    }

    public function setting()
    {

        $model =  Auth::user();

        return view('usuarios.setting')->with('model',$model);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $user = User::find($id);
        $user->delete();

        return redirect()->route('usuarios.index');
    }
    public function getAdvanceFilterData(Request $request)
    {
        $users = User::select([
            DB::raw("CONCAT(users.id,'-',users.id) as id"),
            'users.name',
            'users.email',
            DB::raw('count(posts.user_id) AS count'),
            'users.created_at',
            'users.updated_at'
        ])->leftJoin('posts', 'posts.user_id', '=', 'users.id')
            ->groupBy('users.id');

        $datatables =  app('datatables')->of($users)
            ->filterColumn('users.id', 'whereRaw', "CONCAT(users.id,'-',users.id) like ? ", ["$1"]);

        // having count search
        if ($post = $datatables->request->get('post')) {
            $datatables->having('count', $datatables->request->get('operator'), $post);
        }

        // additional users.name search
        if ($name = $datatables->request->get('name')) {
            $datatables->where('users.name', 'like', "$name%");
        }

        return $datatables->make(true);
    }


}
