<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">Crear Lugar Turistico</div>

            <div class="panel-body">
                {!! Form::open( ['route' => ['lugares.storeGuest',$model],'method' =>'POST', 'files'=>'true']) !!}

                <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                    {!!  htmlspecialchars_decode( Form::label('nombre','Nombre : <span class=" fa fa-asterisk  colorspan"></span>') )!!}
                    {!! Form::text('nombre',$model->nombre, ['class'=>'form-control','placeholder'=>'nombre']) !!}
                    @if ($errors->has('nombre'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('latitud') ? ' has-error' : '' }}">
                    {!! Form::hidden('latitud',$model->nombre, ['class'=>'form-control','placeholder'=>'latitud', 'id' => 'latitud']) !!}
                    @if ($errors->has('latitud'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('latitud') }}</strong>
                                    </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('longitud') ? ' has-error' : '' }}">
                    {!! Form::hidden('longitud',$model->longitud, ['class'=>'form-control','placeholder'=>'longitud','id' => 'longitud']) !!}
                    @if ($errors->has('longitud'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('longitud') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="form-group">
                    <input id="pac-input" class="form-control" type="text"
                           placeholder="Buscar Direcciones">

                </div>
                <div class="form-group">
                    <div id="map" style="height: 350px;"></div>
                </div>
                <div class="form-group">
                    <div class="file-loading">
                        <input id="file-lugares" name="files[]" type="file" multiple>
                    </div>
                </div>

                <div class="form-group{{  $errors->first('descripcion') ? ' has-error' : '' }}">
                    {!!  htmlspecialchars_decode( Form::label('nombre','Descripcion : <span class=" fa fa-asterisk  colorspan"></span>') )!!}
                    {!! Form::textarea('descripcion',$model->descripcion, ['class'=>'form-control','placeholder'=>'Descripcion']) !!}
                    @if ($errors->has('descripcion'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('descripcion') }}</strong>
                                    </span>
                    @endif
                </div>


                <div class="form-group">

                    {!! Form::submit('Registrar',['class' => 'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>