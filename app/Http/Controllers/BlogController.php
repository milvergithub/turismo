<?php

namespace App\Http\Controllers;

use App\Blog;
use App\FotosBlog;
use App\Http\Requests\BlogRequest;
use App\User;
use App\Fotos;
use Illuminate\Http\Request;

class BlogController extends Controller
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
    public function create()
    {
        $model = new Blog();

        return view('blog.create')->with(['model'=>$model]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogRequest $request)
    {
        $blog = new Blog($request->all());

        $blog->usuario_id = User::getCurrentSession()->id;
        $blog->fecha = date('Y-m-d');
          if( $blog ->save()) {

              $path = public_path() . '/uploads/';
              $files = $request->file('file');
              foreach ($files as $file) {
                  $fileName = time() . $file->getClientOriginalName();
                  $extension = $file->getClientOriginalExtension();
                  if ($file->move($path, $fileName)) {

                      $image = new Fotos();
                      $image->nombre = $fileName;
                      $image->ruta = $fileName;
                      $image->extencion = $extension;
                      if ($image->save()) {
                          $fotos_blog = new FotosBlog();
                          $fotos_blog->foto_id = $image->id;
                          $fotos_blog ->blog_id = $blog->id;

                          $fotos_blog->save();
                      }
                  }
              }

          }

        return redirect()->route('blogs');

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
