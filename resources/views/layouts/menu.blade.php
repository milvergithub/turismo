<ul>
    <li><a href="{{ url('lang', ['en']) }}" class="color-texto" >En</a></li>
    <li><a href="{{ url('lang', ['es']) }}" class="color-texto" >Es</a></li>
    @guest

        <li><a href="{{ route('login') }}" class="color-texto">@lang('home.login')</a></li>
        <li><a href="{{ route('register') }}" class="color-texto">@lang('home.register')</a></li>
    @else
        @if (Auth::user()->rol == \App\User::ROL_ADMINISTRADOR)
            <li><a href="{{ route('usuario.index') }}" class="color-texto">@lang('home.administrator')</a></li>
        @endif

        <li class="dropdown ">
            <a href="#" class="dropdown-toggle color-texto" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
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