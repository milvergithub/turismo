<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Comentario;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public  function  insertajax(Request $request)
    {
        //TODO

        $blog = Blog::find($request->get("blog_id"));
        $user = Auth::user();
        $user->comment($blog , $request->get("comentario"), 3);

        $comentario  = new Comentario($request->all());
        $comentario -> fecha = date('Y-m-d');
        $comentario -> estado = 'AC';
        if ($comentario->save() ) {
            return response()->json(['success'=>'Ok','model' => $comentario, 'user' => User::find($comentario->usuario_id)]);
        }else{
            return response()->json(['error'=>$comentario->errors()]);
        }


     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
