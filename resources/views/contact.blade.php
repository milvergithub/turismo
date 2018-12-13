@extends('layouts.site')

@section('content')
    <div class="contact-grids">
        <div class="col-md-6 contact-grid">
            <h4>@lang('resource.yourmessage')</h4>
            <form action="#" method="post">
                <div class="form-group">
                    <label class="control-label">@lang('resource.name')</label>
                    <input type="text" name="Name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="control-label">@lang('resource.phone')</label>
                    <input type="text"  class="form-control" name="Phone" required>
                </div>
                <div class="form-group">
                    <label class="control-label">@lang('resource.subject')</label>
                    <input type="text" name="Subject" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>@lang('resource.message')</label>
                    <textarea class="form-control" name="Message" ></textarea>
                </div>
                <button class="btn btn-primary" type="submit">@lang('resource.send')</button>
            </form>
        </div>
        <div class="clearfix"></div>
    </div>

@endsection

 @push('scripts')

            <script>

            </script>

@endpush