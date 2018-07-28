@extends('layouts.site')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>@lang('resource.yourmessage')</h2></div>

                <div class="panel-body">
                    @if (Session::has('message'))
                        <div class="alert alert-info">{{ Session::get('message') }}</div>
                    @endif
                    <span>Lorem Ipsum is inting and typesetting in simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the is dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</span>
                    {!! Form::open( ['route' => ['messagecontact.store',null],'method' =>'POST']) !!}

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="control-label">@lang('resource.name')</label>
                        {!! Form::text('name',null, ['class'=>'form-control']) !!}
                        @if ($errors->has('name'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                        <label for="phone" class="control-label">@lang('resource.phone')</label>
                        {!! Form::text('phone',null, ['class'=>'form-control']) !!}
                        @if ($errors->has('phone'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
                        <label for="subject" class="control-label">@lang('resource.subject')</label>
                        {!! Form::text('subject',null, ['class'=>'form-control']) !!}
                        @if ($errors->has('subject'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('subject') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group{{  $errors->first('message') ? ' has-error' : '' }}">
                        <label for="message" class="control-label">@lang('resource.message')</label>
                        {!! Form::textarea('message', null, ['class'=>'form-control']) !!}
                        @if ($errors->has('message'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('message') }}</strong>
                                    </span>
                        @endif
                    </div>


                    <div class="form-group">

                        <button type="submit" class="btn btn-primary">@lang('resource.send')</button>
                    </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
@endpush