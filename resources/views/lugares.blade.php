@extends('layouts.site')

@section('content')
    <div class="content">
        <!--services-->
        <div class="services-agil">
            <div class="container">
                <h2 class="tittle">@lang('place.places')</h2>
                <div class="form-group">
                    @permission('create-lugar-turistico')
                    <a href="{{ route('lugares.createGuest') }}" class="btn btn-info"> @lang('resource.new')</a>
                    @endpermission
                </div>
                @foreach($model as $lugares)

                    <div class="service-grids">
                        <div class="col-md-5 service-grid ser-bottom">
                            <h4>{{$lugares->nombre}}</h4>
                            <p> {{$lugares->descripcion}}</p>
                            <a href="{{ route('show', $lugares->id) }}" class="btn btn-primary btn-sm active" ><i ></i>@lang('place.showmore')</a>
                        </div>
                        <div class="col-md-7 service-grid1">
                            @if($lugares->firstMedia($lugares::TAG_PICTURE))
                                <img src="{{$lugares->firstMedia($lugares::TAG_PICTURE)->getUrl()}}" class="img-responsive img img-thumbnail" alt=""/>
                            @endif
                        </div>
                        <div class="clearfix"></div>
                    </div>
                @endforeach
                {!!$model->render()!!}
            </div>
        </div>
        <!--services-->

    </div>
@endsection

 @push('scripts')

            <script>

            </script>

@endpush