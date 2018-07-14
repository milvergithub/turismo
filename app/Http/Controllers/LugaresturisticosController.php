<?php

namespace App\Http\Controllers;

use App\LugarTuristico;
use Illuminate\Http\Request;
use MediaUploader;
use Yajra\Datatables\Datatables;
use Mapper;

use Edofre\SliderPro\Models\Slide;
use Edofre\SliderPro\Models\Slides\Caption;
use Edofre\SliderPro\Models\Slides\Image;
use Edofre\SliderPro\Models\Slides\Layer;
use Edofre\SliderPro\SliderPro;

class LugaresturisticosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('lugaresturisticos.index');
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function data()
    {

        return Datatables::of(LugarTuristico::query())
            ->addColumn('action', function ($lugar) {
                return

                    // edit
                    '<a href="'. route('lugaresturisticos.edit', $lugar->id) .'" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</a> '.

                    '<a href="'. route('lugaresturisticos.show', $lugar->id) .'" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Agregar Fotos"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Mostrar</a> '.
                    '<a href="'. route('fotos.create',['id' => $lugar->id ]) .'" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Agregar Fotos"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Agregar Fotos</a> '
                 ;     })
            ->make(true);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new LugarTuristico();
        $config = array();
        $config['center'] = 'auto';
        $config['onboundschanged'] = 'if (!centreGot) {
            var mapCentre = map.getCenter();
            marker_0.setOptions({
                position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng())
            });
        }
        centreGot = true;';

        app('map')->initialize($config);

        // set up the marker ready for positioning
        // once we know the users location
        $marker = array();
        app('map')->add_marker($marker);

        $map = app('map')->create_map();


        $config['center'] = '-17.4139766, -66.16532239999998';
        $config['zoom'] = 'auto';
        $config['places'] = TRUE;
        $config['placesAutocompleteInputID'] = 'myPlaceTextBox';
        $config['placesAutocompleteBoundsMap'] = TRUE; // set results biased towards the maps viewport
        $config['placesAutocompleteOnChange'] = 'alert(\'You selected a place\');';

        return view('lugaresturisticos.create')->with(['model'=>$model,'map' => $map] );
    }
    public function createGuest()
    {
        $model = new LugarTuristico();
        $config = array();
        $config['center'] = 'auto';
        $config['onboundschanged'] = 'if (!centreGot) {
            var mapCentre = map.getCenter();
            marker_0.setOptions({
                position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng())
            });
        }
        centreGot = true;';

        app('map')->initialize($config);

        // set up the marker ready for positioning
        // once we know the users location
        $marker = array();
        app('map')->add_marker($marker);

        $map = app('map')->create_map();


        $config['center'] = '-17.4139766, -66.16532239999998';
        $config['zoom'] = 'auto';
        $config['places'] = TRUE;
        $config['placesAutocompleteInputID'] = 'myPlaceTextBox';
        $config['placesAutocompleteBoundsMap'] = TRUE; // set results biased towards the maps viewport
        $config['placesAutocompleteOnChange'] = 'alert(\'You selected a place\');';

        return view('lugaresturisticos.create-guest')->with(['model'=>$model,'map' => $map] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $lugarTuristico = new LugarTuristico($request->all());
        $lugarTuristico -> estado = LugarTuristico::ESTADO_ACTIVO;
        $lugarTuristico ->save();
        return redirect()->route('lugaresturisticos.index');

    }


    public function storeGuest(Request $request)
    {

        $lugarTuristico = new LugarTuristico($request->all());
        $lugarTuristico -> estado = LugarTuristico::ESTADO_INACTIVO;
        $lugarTuristico ->save();
        if (!empty($request->has('file'))) {
            $files = $request->file('file');
            foreach ($files as $file) {
                $media = MediaUploader::fromSource($file)->useHashForFilename()->upload();
                $lugarTuristico->attachMedia($media, LugarTuristico::TAG_PICTURE);
            }
        }
        return redirect()->route('lugares');

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $yourVar = 'active';
        $contadoractive = 'active' ;
        $contador = 0 ;
        /**
         *
        return view('home')->with(['model'=>$model,'yourVar' => $yourVar, 'contadoractive' => $contadoractive,'contador'=> $contador ]);

         */
        $model = LugarTuristico::find($id);
        $fotos = $model->getMedia(LugarTuristico::TAG_PICTURE);
        Mapper::streetview($model->latitud, $model->longitud, 1, 1);


        return view('lugaresturisticos.show')
            ->with(['model'=>$model,
                'yourVar' => $yourVar,
                'fotos' => $fotos,
                'contadoractive' => $contadoractive,
                'contador'=> $contador]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /**
        $model = User::find($id);

        return view('usuario.edit')->with('model',$model);
         */
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
        /**
        $user= User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->nombre = $request->nombre;
        $user->apellidos = $request->apelldios;
        $user->genero = $request->genero;
        $user->telefono = $request->telefono;
        $user->rol = $request ->rol;
        $user->save();
        return redirect()->route('usuarios.index');
         */
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /**
        $user = User::find($id);
        $user->delete();

        return redirect()->route('usuarios.index');
         * */
    }
}
