<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Comentario;
use App\LugarTuristico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mapper;
use DB;
use GoogleMaps;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = LugarTuristico::all()->first();
        $yourVar = 'active';
        $contadoractive = 'active';
        $contador = 0;
        return view('home')->with(['model' => $model, 'yourVar' => $yourVar, 'contadoractive' => $contadoractive, 'contador' => $contador]);
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
        $fotoLugares = $model->getMedia('foto-lugares');
        Mapper::streetview($model->latitud, $model->longitud, 1, 1);


        return view('show')->with(['model' => $model, 'yourVar' => $yourVar,
            'fotoLugares' => $fotoLugares,
            'contadoractive' => $contadoractive, 'contador' => $contador,

        ]);
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
            if ($lugar->estado === LugarTuristico::ESTADO_ACTIVO) {
                $data[] = $lugar;
            }
        }

        return view('lugares')->with(['model' => $data]);
    }

    public function blog()
    {
        $model = Blog::all();
        return view('blog')->with(['model' => $model]);
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
