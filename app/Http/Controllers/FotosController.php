<?php

namespace App\Http\Controllers;

use App\Fotos;
use App\FotosLugares;
use App\LugarTuristico;
use Illuminate\Http\Request;
use MediaUploader;

class FotosController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $id_lugaresturisticos = $request->request->get('id');
        $model = new Fotos();

        return view('fotos.create')->with(['model' => $model, 'id_lugar' => $id_lugaresturisticos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $idLugar = $request->request->get('id_lugar');
        $lugarTuristico = LugarTuristico::find($idLugar);
        $files = $request->file('file');
        foreach ($files as $file) {
            $media = MediaUploader::fromSource($file)->useHashForFilename()->upload();
            $lugarTuristico->attachMedia($media, 'foto-lugares');
        }
        return redirect()->route('lugaresturisticos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}