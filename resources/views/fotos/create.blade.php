@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Crear Lugar Turistico </div>

                <div class="panel-body">

                    <div class="jumbotron how-to-create" >


                        {!! Form::open(['route'=>  [ 'fotos.store',null ], 'method' => 'POST', 'files'=>'true', 'id' => 'my-dropzone' , 'class' => 'dropzone']) !!}
                        <div class="dz-message" style="height:200px;">
                            Suelta tus archivos aquí
                        </div>
                        <div class="form-group">
                            <div class="dropzone-previews"></div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success" id="submit">Guardar</button>
                            {{ Form::hidden('id_lugar', $id_lugar, array('class' => 'form-control')) }}

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
            maxFilezise: 20,
            maxFiles: 50,

            init: function() {
                var submitBtn = document.querySelector("#submit");
                myDropzone = this;

                submitBtn.addEventListener("click", function(e){
                    e.preventDefault();
                    e.stopPropagation();
                    myDropzone.processQueue();
                });
                this.on("addedfile", function(file) {
                   // alert("file uploaded");s
                });

                this.on("complete", function(file) {
                    myDropzone.removeFile(file);
                });

                this.on("success",
                    myDropzone.processQueue.bind(myDropzone)
                );
            }
        };
    </script>

@endpush