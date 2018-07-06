@extends('layouts.site')

@section('content')
<div class="container-fluid">

    <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Mostrar Lugar Turistico </div>

                <div class="panel-body">
                    {!! Form::open( ['route' => ['lugaresturisticos.store',$model],'method' =>'POST']) !!}


                    <div class="form-group" style="width: 100%; height: 30%;">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                @foreach($model->fotosBlog as $fotoblog)
                                    <li data-target="#carousel-example-generic" data-slide-to="{{$contador}}" class="{{$contadoractive}}"></li>
                                    {{ $contadoractive = '' }}
                                    {{ $contador ++ }}
                                @endforeach

                            </ol>

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" role="listbox">
                                @foreach($model->fotosBlog as $fotoblog)
                                    <div class="item {{ $yourVar }}">
                                        <img src="{{$fotoblog->Foto->getFotoPathShow()}}" alt="...">
                                        <div class="carousel-caption">
                                            ...
                                        </div>
                                    </div>
                                    {{ $yourVar = '' }}
                                @endforeach
                            </div>

                            <!-- Controls -->
                            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                    {!! Form::close() !!}
                                <!-- Div with an id to display success message or failed message -->
                </div>
            </div>
        </div>
</div>
<div id="success">

</div>
{!! Form::open( ['route' => ['comentarioajax',$comentario],'method' =>'POST', 'onsubmit' => "return InsertViaAjax();",'id' => "ajax-form-submit"]) !!}
  <div class="form-group{{  $errors->first('email') ? ' has-error' : '' }}" >
    {!!  htmlspecialchars_decode( Form::label('nombre','Comentar : <span class=" fa fa-asterisk  colorspan"></span>') )!!}
    {!! Form::text('comentario',$comentario->comentario, ['class'=>'form-control','placeholder'=>'' ,'id' => 'comentario']) !!}
    @if ($errors->has('comentario'))
        <span class="help-block">
         <strong>{{ $errors->first('comentario') }}</strong>
        </span>
    @endif
</div>
{!! Form::hidden('usuario_id',$comentario->usuario_id) !!}
{!! Form::hidden('blog_id',$comentario->blog_id) !!}
{!! Form::submit('Enviar',['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}
<div class="panel-body">
    <ul class="chat" id="inserted_data">
        @foreach($model->comentarios as $comentario)
        <li class="left clearfix"><span class="chat-img pull-left">
                            <img src="http://placehold.it/50/55C1E7/fff&text" alt="User Avatar" class="img-circle" />
                        </span>
            <div class="chat-body clearfix">
                <div class="header">
                    <strong class="primary-font">{{$comentario->Usuario->nombre_usuario}}</strong> <small class="pull-right text-muted">
                        <span class="glyphicon glyphicon-time"></span>{{$comentario->fecha}}</small>
                </div>
                <p>
                    {{$comentario->comentario}}
                </p>
            </div>
        </li>
        @endforeach
    </ul>
</div>
@endsection

@push('scripts')
    <script>



        function InsertViaAjax() {
            var form = $("#ajax-form-submit");
            // Give the loading icon when data is being submitted
            $("#success").val('loading...');

            var form_data = $("#ajax-form-submit").serialize();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });

            $.ajax({

                type:"POST",
                url:"{{url('comentarioajax')}}",
                data : form_data,
                success: function(data) {
                    $("#comentario").val('');
                    $("#success").html('se envio correctamente').delay(3000).fadeOut();

            var fila =    '<li class="left clearfix"><span class="chat-img pull-left">'+
                        '<img src="http://placehold.it/50/55C1E7/fff&text" alt="User Avatar" class="img-circle" />'+
                        '</span>'+
                        '<div class="chat-body clearfix">'+
                        '<div class="header">'+
                        '<strong class="primary-font">' + data.user.nombre_usuario + '</strong> <small class="pull-right text-muted">' +
                        '<span class="glyphicon glyphicon-time"></span>' + data.model.fecha +'</small>' +
                      '</div>' +
                       '<p>' + data.model.comentario + ' </p>' +
                     '</div>' +
                      '</li>';
                    $("#inserted_data").append(fila);
                }
            });

            // To Stop the loading of page after a button is clicked
            return false;
        }
    </script>


@endpush
