@extends('layouts.site')
@push('scriptshead')
    <script type='text/javascript'>
        var centreGot = false;
    </script>
    {!! $map['js'] !!}
@endpush
@section('content')
    <div class="content">
        {!! $map['html'] !!}
        <div id="directionsDiv"></div>
    </div>
    <a href="/show/{{$model->id}}" class="helpbutton" ><span class="glyphicon glyphicon-chevron-left"></span> @lang('resource.return')</a>

@endsection

