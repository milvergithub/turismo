<ul>
    <li class="dropdown ">
        <a href="#" class="dropdown-toggle color-texto" data-toggle="dropdown" role="button" aria-expanded="false"
           aria-haspopup="true" v-pre>
            @if(App::getLocale() === 'es')
                <img src="{{asset('img/spain.png')}}" width="25" class="img" height="25" style="border-radius: 100%">
            @else
                <img src="{{asset('img/united-states.png')}}" width="25" class="img" height="25" style="border-radius: 100%">
            @endif
            <span class="caret"></span>
        </a>

        <ul class="dropdown-menu">
            <li>
                <a href="{{ url('lang', ['en']) }}">
                    <img src="{{asset('img/united-states.png')}}" width="25" class="img" height="25" style="border-radius: 100%">
                </a>
            </li>
            <li>
                <a href="{{ url('lang', ['es']) }}">
                    <img src="{{asset('img/spain.png')}}" width="25" class="img" height="25" style="border-radius: 100%">
                </a>
            </li>
        </ul>
    </li>
    @guest

        <li><a href="{{ route('login') }}" class="color-texto">@lang('home.login')</a></li>
        <li><a href="{{ route('register') }}" class="color-texto">@lang('home.register')</a></li>
    @else
        @role('admin')
        <li><a href="{{ route('usuario.index') }}" class="color-texto">@lang('home.administrator')</a></li>
        @endrole
        <li class="dropdown ">
            <a href="#" class="dropdown-toggle color-texto" data-toggle="dropdown" role="button" aria-expanded="false"
               aria-haspopup="true" v-pre>
                {{ Auth::user()->nombre_usuario }} <span class="caret"></span>
            </a>

            <ul class="dropdown-menu">
                <li>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                        @lang('home.logout')
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
                <li><a href="{{ route('setting') }}" class="color-texto">@lang('home.setting')</a></li>
            </ul>
        </li>
    @endguest

</ul>