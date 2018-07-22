<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Comentario;
use App\LugarTuristico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Mapper;
use DB;
use GoogleMaps;
use FarhanWazir\GoogleMaps\GMaps;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $gmap;

    public function __construct(GMaps $gmap){
        $this->gmap = $gmap;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lugares = LugarTuristico::all()->first();
        $yourVar = 'active';
        $contadoractive = 'active';
        $contador = 0;
        return view('home')->with(['model' => $lugares, 'yourVar' => $yourVar, 'contadoractive' => $contadoractive, 'contador' => $contador]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $yourVar = 'active';
        $contadoractive = 'active';
        $contador = 0;
        $model = LugarTuristico::find($id);
        if (App::getLocale() === 'es') {
            $model->nombre = $model->nombre_es;
            $model->descripcion = $model->descripcion_es;
        }
        $fotoLugares = $model->getMedia('foto-lugares');
        Mapper::streetview($model->latitud, $model->longitud, 1, 1);


        return view('show')->with(['model' => $model, 'yourVar' => $yourVar,
            'fotoLugares' => $fotoLugares,
            'contadoractive' => $contadoractive, 'contador' => $contador,

        ]);
    }

    public function showRoadMap($id, $lat, $long)
    {
        $model = LugarTuristico::find($id);
        $center = $model->latitud.', '.$model->longitud;

        $config['center'] = $center;
        $config['zoom'] = '14';
        $config['map_height'] = '500px';
        $config['language'] = App::getLocale();
        $config['directions'] = true;
        $config['directionsStart'] = $lat.','.$long;
        $config['directionsEnd'] = $center;
        $config['directionsDivID'] =  'directionsDiv';

        $this->gmap->initialize($config);
        $map = $this->gmap->create_map();
        return view('show-roadmap')->with(['model' => $model, 'map' => $map]);
    }

    public function showblog($id)
    {
        $yourVar = 'active';
        $contadoractive = 'active';
        $contador = 0;
        $model = Blog::find($id);
        $comments = $model->comments;
        $comentario = new Comentario();
        $comentario->usuario_id = Auth::user()->id;
        $comentario->blog_id = $id;

        return view('showblog')->with(['model' => $model, 'yourVar' => $yourVar,
            'contadoractive' => $contadoractive, 'contador' => $contador, 'comentario' => $comentario,
            'comments' => $comments->reverse()
        ]);
    }

    public function lugares()
    {
        $lugares = LugarTuristico::all();
        $data = [];
        foreach ($lugares as $lugar) {
            if (App::getLocale() === 'es') {
                $lugar->nombre = $lugar->nombre_es;
                $lugar->descripcion = $lugar->descripcion_es;
            }
            if ($lugar->estado === LugarTuristico::ESTADO_ACTIVO) {
                $data[] = $lugar;
            }
        }

        return view('lugares')->with(['model' => $data]);
    }

    public function blog()
    {
        $blogs = Blog::all();
        if (App::getLocale() === 'es') {
            foreach ($blogs as $blog) {
                $blog->nombre = $blog->nombre_es;
                $blog->descripcion = $blog->descripcion_es;
            }
        }
        return view('blog')->with(['model' => $blogs]);
    }

    public function about()
    {
        $model = LugarTuristico::all();

        return view('about')->with(['model' => $model]);
    }

    public function contact()
    {
        $model = LugarTuristico::all()->first();
        return view('contact')->with(['model' => $model]);
    }
}
