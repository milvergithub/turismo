<ul class="nav1 nav nav-wil">
    @if(\Illuminate\Support\Facades\Route::currentRouteName() === 'home')
        <li class="active"><a data-hover="@lang('home.home')" href="{{ route('home') }}">@lang('home.home')</a></li>
    @else
        <li><a data-hover="@lang('home.home')" href="{{ route('home') }}">@lang('home.home')</a></li>
    @endif

    @if(\Illuminate\Support\Facades\Route::currentRouteName() === 'about')
        <li class="active"><a data-hover="@lang('home.about')" href="{{ route('about') }}">@lang('home.about')</a></li>
    @else
        <li><a data-hover="@lang('home.about')" href="{{ route('about') }}">@lang('home.about')</a></li>
    @endif

    @if(\Illuminate\Support\Facades\Route::currentRouteName() === 'lugares')
        <li class="active"><a data-hover="@lang('home.place')" href="{{ route('lugares') }}">@lang('home.place')</a></li>
    @else
        <li><a data-hover="@lang('home.place')" href="{{ route('lugares') }}">@lang('home.place')</a></li>
    @endif

    @if(\Illuminate\Support\Facades\Route::currentRouteName() === 'blogshome')
        <li class="active"><a data-hover="@lang('home.blog')" href="{{ route('blogshome') }}">@lang('home.blog')</a></li>
    @else
        <li><a data-hover="@lang('home.blog')" href="{{ route('blogshome') }}">@lang('home.blog')</a></li>
    @endif

    @if(\Illuminate\Support\Facades\Route::currentRouteName() === 'contact')
        <li class="active"><a data-hover="@lang('home.contact')" href="{{ route('contact') }}">@lang('home.contact')</a></li>
    @else
        <li><a data-hover="@lang('home.contact')" href="{{ route('contact') }}">@lang('home.contact')</a></li>
    @endif
</ul>
@if(App::getLocale() === 'es')
        <input type="hidden" id="language_value" value="Spanish">
        <input type="hidden" id="language_val" value="_es">
@else
        <input type="hidden" id="language_value" value="English">
        <input type="hidden" id="language_val" value="">
@endif