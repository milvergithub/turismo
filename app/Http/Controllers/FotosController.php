<?php

namespace App\Http\Controllers;

use App\Fotos;
use App\FotosLugares;
use Illuminate\Http\Request;
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

        return view('fotos.create')->with(['model'=>$model ,'id_lugar' => $id_lugaresturisticos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /**
         *  $originalName = $photo->getClientOriginalName();
        $extension = $photo->getClientOriginalExtension();
        $originalNameWithoutExt = substr($originalName, 0, strlen($originalName) - strlen($extension) - 1);

         */
         $id_lugar =  $request->request->get('id_lugar');

        $path = public_path().'/uploads/';
        $files = $request->file('file');
        foreach($files as $file){
            $fileName = time().$file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            if($file->move($path, $fileName)) {

                $image = new Fotos();
                $image->nombre = $fileName;
                $image->ruta = $fileName;
                $image->extencion = $extension;
                if( $image->save()) {
                    $fotos_lugares = new FotosLugares();
                    $fotos_lugares ->foto_id = $image->id;
                    $fotos_lugares ->lugares_id = $id_lugar;

                    $fotos_lugares->save();
                }
            }
        }
//route('fotos.create',['id' => $lugar->id ]) // Auth::user()->id;
        return redirect()->route('lugaresturisticos.index');
       // return redirect()->route('fotos.create',['id' => $id_lugar ]);

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
