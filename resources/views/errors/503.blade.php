@extends('layouts.site')
@section('content')
    <div class="col-sm-12">
        <div class="col-sm-12 text-center">
            <img src="{{asset("/img/access-denied.png")}}" alt="" class="" width="200">
        </div>
        <div class="text-center">
            <h1 class="text-danger">Internal server error</h1>
        </div>
    </div>
@endsection
@push('scripts')
@endpush