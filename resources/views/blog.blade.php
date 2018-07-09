@extends('layouts.site')
@section('content')
    <div class="content">
        <div class="services-agile">
            <div class="container">
                <h2 class="tittle">Blog</h2>
                <a href="{{ route('blog.create') }}" class="btn btn-info"> Nuevo</a>
                @foreach($model as $blog)
                    <div class="service-grids">
                        <div class="col-md-5 service-grid ser-bottom">
                            <h4>{{$blog->nombre}}</h4>
                            <p> {{$blog->descripcion}}</p>
                            <a href="{{ route('showblog', $blog->id) }}" class="btn btn-primary btn-sm active"><i></i>Ver mas</a>
                        </div>
                        <div class="col-md-7 service-grid1">
                            @if($blog->firstMedia($blog::TAG_PICTURE))
                                <img src="{{$blog->firstMedia($blog::TAG_PICTURE)->getUrl()}}" class="img-responsive gray" alt=""/>
                            @endif
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