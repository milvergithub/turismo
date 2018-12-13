<?php

namespace App\Http\Controllers;

use App\Http\Requests\LugarturisticoRequest;
use App\LugarTuristico;
use Illuminate\Http\Request;
use MediaUploader;
use Yajra\Datatables\Datatables;
use Mapper;
use FarhanWazir\GoogleMaps\GMaps;
use Lang;
use Edofre\SliderPro\Models\Slide;
use Edofre\SliderPro\Models\Slides\Caption;
use Edofre\SliderPro\Models\Slides\Image;
use Edofre\SliderPro\Models\Slides\Layer;
use Edofre\SliderPro\SliderPro;

class LugaresturisticosController extends Controller
{

    protected $gmap;

    public function __construct(GMaps $gmap){
        $this->gmap = $gmap;
    }
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
        $edit = Lang::get('messages.welcome');

        return Datatables::of(LugarTuristico::query())
            ->addColumn('action', function ($lugar) use ($edit) {
                return

                    // edit
                    '<a href="'. route('lugaresturisticos.edit', $lugar->id) .'" class="btn btn-xs btn-primary" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> '.Lang::get('resource.edit').' </a> '.

                    '<a href="'. route('lugaresturisticos.show', $lugar->id) .'" class="btn btn-xs btn-primary" data-toggle="tooltip" data-placement="top" title="Agregar Fotos"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>'.Lang::get('resource.show').'</a> '.
                    '<a href="'. route('fotos.create',['id' => $lugar->id ]) .'" class="btn btn-xs btn-primary" data-toggle="tooltip" data-placement="top" title="Agregar Fotos"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>'.Lang::get('resource.addpicture').'</a> '
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
    public function store(LugarturisticoRequest $request)
    {

        $lugarTuristico = new LugarTuristico($request->all());
        $lugarTuristico -> estado = LugarTuristico::ESTADO_ACTIVO;
        $lugarTuristico ->save();
        return redirect()->route('lugaresturisticos.index')->with('message', 'Se creo exitosamente');

    }


    public function storeGuest(LugarturisticoRequest $request)
    {

        $lugarTuristico = new LugarTuristico($request->all());
        $lugarTuristico -> estado = LugarTuristico::ESTADO_PENDING;
        $lugarTuristico ->save();
        if (!empty($request->has('files'))) {
            $files = $request->file('files');
            foreach ($files as $file) {
                $media = MediaUploader::fromSource($file)->useHashForFilename()->upload();
                $lugarTuristico->attachMedia($media, LugarTuristico::TAG_PICTURE);
            }
        }
        return redirect()->route('lugares')->with('message', 'Se creo exitosamente');

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
        $model = LugarTuristico::find($id);
        $center = $model->latitud.', '.$model->longitud;
        $config = array();
        $config['map_height'] = '500px';
        $config['zoom'] = 17;
        $config['streetViewAddressPosition'] = 'BOTTOM';
        $config['center'] = $center;
        $config['onboundschanged'] = 'if (!centreGot) {
            var mapCentre = map.getCenter();
            marker_0.setOptions({
                position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng())
            });
        }
        centreGot = true;';

        $this->gmap->initialize($config); // Initialize Map with custom configuration

        // set up the marker ready for positioning
        $marker = array();
        $marker['draggable'] = true;
        $marker['ondragend'] = '
        iw_'. $this->gmap->map_name .'.close();
        reverseGeocode(event.latLng, function(status, result, mark){
            if(status == 200){
                iw_'. $this->gmap->map_name .'.setContent(result);
                iw_'. $this->gmap->map_name .'.open('. $this->gmap->map_name .', mark);
            }
        }, this);
        ';

        $this->gmap->add_marker($marker);

        $map = $this->gmap->create_map(); // This object will render javascript files and map view; you can call JS by $map['js'] and map view by $map['html']
        return view('lugaresturisticos.edit')->with(['model'=>$model,'map' => $map, 'states' => LugarTuristico::getEstados()] );
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
        $lugar = LugarTuristico::find($id);
        $lugar->fill($request->all());
        $lugar->save();
        return redirect()->route('lugaresturisticos.index');
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
