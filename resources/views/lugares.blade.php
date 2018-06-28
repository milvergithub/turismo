@extends('layouts.site')

@section('content')
    <div class="content">
        <!--services-->
        <div class="services-agile">
            <div class="container">
                <h2 class="tittle">Lugares Turisticos</h2>
                @foreach($model as $lugares)

                    <div class="service-grids">
                        <div class="col-md-5 service-grid ser-bottom">
                            <h4>{{$lugares->nombre}}</h4>
                            <p> {{$lugares->descripcion}}</p>
                            <a href="{{ route('show', $lugares->id) }}" class="btn btn-primary btn-sm active" ><i ></i>Ver mas</a>
                        </div>
                        <div class="col-md-7 service-grid1">
                            <img src="{{$lugares->fotoPrimero()}}" class="img-responsive gray" alt=""/>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                @endforeach

            </div>
        </div>
        <!--services-->

    </div>
@endsection

 @push('scripts')

            <script>

            </script>

@endpush