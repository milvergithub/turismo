@extends('layouts.site')

@section('content')
    <div class="contact-grids">
        <div class="col-md-6 contact-grid">
            <h4>@lang('resource.yourmessage')</h4>
            <span>Lorem Ipsum is inting and typesetting in simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the is dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</span>
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