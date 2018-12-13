<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Http\Requests\BlogRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use MediaUploader;
use Yajra\Datatables\Datatables;
use Lang;
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
        return view('blog.index');
    }
    public function data()
    {

        return Datatables::of(Blog::query())
            ->addColumn('action', function ($user) {
                return $this->getButtonUrl($user);
            })
            ->make(true);
    }
    private function getButtonUrl($user): string
    {
        $delete = Lang::get('resource.delete');
        $edit = Lang::get('resource.edit');
        return '<a href="/blog/'.$user->id.'/edit" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-pencil"></i> '.$edit.'</a> 
                <a href="/blogs/delete/'.$user->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-trash"></i> '.$delete.'</a>';
    }

    public function blogs()
    {
        return view('blog');
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
    public function store(Request $request)
    {
        $rules = Blog::rulesEnglish();
        if (App::getLocale() === 'es') {
            $rules = Blog::rulesSpanish();
        }
        $request->validate($rules);
        $blog = new Blog($request->all());

        $blog->usuario_id = User::getCurrentSession()->id;
        $blog->fecha = date('Y-m-d');
          if( $blog ->save()) {
              if (!empty($request->has('file'))) {
                  $files = $request->file('file');
                  foreach ($files as $file) {
                      $media = MediaUploader::fromSource($file)->useHashForFilename()->upload();
                      $blog->attachMedia($media, 'foto-blog');
                  }
              }

          }
        return redirect()->route('blogshome')->with('message', 'Blog creado exitosamente');
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
        $model = Blog::find($id);
        return view('blog.edit')->with(['blog'=>$model]);
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
        $request->validate(Blog::rules());
        $blog = Blog::find($id);
        $blog->fill($request->all());
        $blog->save();
        return redirect()->route('blog.index')->with('message', 'Blog actualizado exitosamente');
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
    public function deleteBlog($id) {
        $model = Blog::find($id);
        $model->delete();
        return redirect()->route('blog.index');
    }
}
