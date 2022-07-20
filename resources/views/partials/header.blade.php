{{-- <?php
    use App\Developer;

    $developer = DB::table('developers')->where('user_id', Auth::user()->id);

    
    dump($developer->bindings['where']);
?> --}}
<header>
    <nav class="navbar navbar-expand-md shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                BDevelopers
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.developers.index') }}" >
                                <div class="choice-button {{Route::currentRouteName() == 'admin.developers.index' ? 'active' : ''}}">Developers</div>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link {{Route::currentRouteName() == 'admin.messages.index' ? 'active' : ''}}" href="{{ route('admin.messages.index') }}" >Messages</a>
                        </li> --}}
                        {{-- <li class="nav-item">
                            <a class="nav-link {{Route::currentRouteName() == 'admin.reviews.index' ? 'active' : ''}}" href="{{ route('admin.reviews.index') }}" >Reviews</a>
                        </li> --}}
                    @endauth
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                                {{ Auth::user()->surname }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{route('admin.developers.show', DB::table('developers')->where('user_id', Auth::user()->id)->value('id'))}}">Dashboard</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</header>