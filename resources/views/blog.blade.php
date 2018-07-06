@extends('layouts.site')
@section('content')
    <div class="content">
        <div class="services-agile">
            <div class="container">
                <h2 class="tittle">Blog</h2>
                <a href="{{ route('blog.create') }}" class="btn btn-info"> Nuevo</a>
                @foreach($model as $blos)
                    <div class="service-grids">
                        <div class="col-md-5 service-grid ser-bottom">
                            <h4>{{$blos->nombre}}</h4>
                            <p> {{$blos->descripcion}}</p>
                            <a href="{{ route('showblog', $blos->id) }}" class="btn btn-primary btn-sm active"><i></i>Ver mas</a>
                        </div>
                        <div class="col-md-7 service-grid1">
                            <img src="{{$blos->fotoPrimero()}}" class="img-responsive gray" alt=""/>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@push('scripts')
@endpush