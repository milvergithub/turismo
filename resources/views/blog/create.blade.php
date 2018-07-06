@extends('layouts.blog')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Crear Lugar Turistico</div>
                <div class="panel-body">
                    <div class="jumbotron how-to-create">
                        {!! Form::open(['route'=>[ 'blog.store',$model ], 'method' => 'POST', 'files'=>'true', 'id' => 'my-dropzone' , 'class' => 'dropzone form-horizontal']) !!}
                        <div class="form-group {{ $errors->has('nombre') ? ' has-error' : '' }}">
                            {!!  htmlspecialchars_decode( Form::label('nombre','Nombre :', ['class' => 'col-sm-2 control-label']) )!!}
                            <div class="col-sm-10">
                                {!! Form::text('nombre',$model->nombre, ['class'=>'form-control','placeholder'=>'nombre']) !!}
                                @if ($errors->has('nombre'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('nombre') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="dz-message" style="height:200px;">
                            @lang('messages.dropzonemessage')
                        </div>
                        <div class="form-group">
                            <div class="dropzone-previews"></div>
                        </div>
                        <div class="form-group{{  $errors->first('descripcion') ? ' has-error' : '' }}">
                            {!!  htmlspecialchars_decode( Form::label('nombre','Descripcion :', ['class' => 'col-sm-2 control-label']) )!!}
                            <div class="col-sm-10">
                                {!! Form::textarea('descripcion',$model->descripcion, ['class'=>'form-control','placeholder'=>'Descripcion']) !!}
                                @if ($errors->has('descripcion'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('descripcion') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success" id="submit">Guardar</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        Dropzone.options.myDropzone = {
            autoProcessQueue: false,
            uploadMultiple: true,
            maxFilezise: 5,
            maxFiles: 50,
            init: function () {
                var submitBtn = document.querySelector("#submit");
                myDropzone = this;
                submitBtn.addEventListener("click", function (e) {
                    e.preventDefault();
                    e.stopPropagation();
                    myDropzone.processQueue();
                });
                this.on("addedfile", function (file) {
                    // alert("file uploaded");s
                });
                this.on("complete", function (file) {
                    myDropzone.removeFile(file);
                });

                this.on("success",
                    myDropzone.processQueue.bind(myDropzone)
                );
            }
        };
    </script>
@endpush