@extends('layouts.site')

@section('content')
<div class="container-fluid">

    <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('place.showblog') </div>

                <div class="panel-body">
                    <div class="service-grid ser-bottom">
                        @if(App::getLocale() === 'es')
                            <h4>{{$model->nombre_es}}</h4>
                        @else
                            <h4>{{$model->nombre}}</h4>
                        @endif
                    </div>
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            @foreach($model->getMedia($model::TAG_PICTURE) as $fotoblog)
                                <li data-target="#carousel-example-generic" data-slide-to="{{$contador}}" class="{{$contadoractive}}"></li>
                            @endforeach

                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            @foreach($model->getMedia($model::TAG_PICTURE) as $fotoblog)
                                <div class="item {{ $yourVar }}">
                                    <img src="{{$fotoblog->getUrl()}}" alt="..." class="img img-responsive" width="100%">
                                    <div class="carousel-caption">
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
                    <div>
                        @if(App::getLocale() === 'es')
                            {{$model->descripcion_es}}
                        @else
                            {{$model->descripcion}}
                        @endif
                    </div>
                </div>
            </div>
        </div>
</div>
<div id="success">

</div>
{!! Form::open( ['route' => ['comentarioajax',$comentario],'method' =>'POST', 'onsubmit' => "return InsertViaAjax();",'id' => "ajax-form-submit"]) !!}
  <div class="form-group{{  $errors->first('email') ? ' has-error' : '' }}" >
    {!!  htmlspecialchars_decode( Form::label('nombre','Comentar : <span class=" fa fa-asterisk  colorspan"></span>') )!!}
    {!! Form::textarea('comentario',$comentario->comentario, ['class'=>'form-control','placeholder'=>'' ,'id' => 'comentario']) !!}
    @if ($errors->has('comentario'))
        <span class="help-block">
         <strong>{{ $errors->first('comentario') }}</strong>
        </span>
    @endif
</div>
{!! Form::hidden('usuario_id',$comentario->usuario_id) !!}
{!! Form::hidden('blog_id',$comentario->blog_id) !!}
<button type="submit" class="btn btn-primary">@lang('resource.send')</button>
{!! Form::close() !!}
<div class="panel-body" id="commentsBlog">
    @include("comment.comments")
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
                    $("#commentsBlog").html(data);
                }
            });

            // To Stop the loading of page after a button is clicked
            return false;
        }
    </script>


@endpush

