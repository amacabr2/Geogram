<nav class="navbar navbar-expand-lg bg-primary fixed-top navbar-transparent" color-on-scroll="400">
    <div class="container">
        <div class="navbar-translate">

            <a class="navbar-brand" href="{{ url('/') }}" title="{{ config('app.name', 'Laravel') }}" rel="tooltip" title="Le meilleur des réseaux sociaux" data-placement="bottom">
                {{ config('app.name', 'Laravel') }}
            </a>

            <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="./assets/img/blurred-image-1.jpg">
            <ul class="navbar-nav">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" rel="tooltip" title="Recherche de nouveaux amis" data-placement="bottom" href="{{ route('users.search') }}">
                            <i class="fa fa-user-plus"></i>
                            <p class="d-lg-none d-xl-none">Recherche de nouveaux amis</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Fil d'actualités</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                            {{ Auth::user()->pseudo }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu">
                            <li class="dropdown-item">
                                <a href="{{ route('profil', ['id' =>  Auth::user()->id]) }}">Mon profil</a>
                            </li>
                            <li class="dropdown-item">
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
                <li class="nav-item">
                    <a class="nav-link" rel="tooltip" title="Follow us on Twitter" data-placement="bottom" href="https://twitter.com/CreativeTim" target="_blank">
                        <i class="fa fa-twitter"></i>
                        <p class="d-lg-none d-xl-none">Twitter</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" rel="tooltip" title="Like us on Facebook" data-placement="bottom" href="https://www.facebook.com/CreativeTim" target="_blank">
                        <i class="fa fa-facebook-square"></i>
                        <p class="d-lg-none d-xl-none">Facebook</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" rel="tooltip" title="Follow us on Instagram" data-placement="bottom" href="https://www.instagram.com/CreativeTimOfficial" target="_blank">
                        <i class="fa fa-instagram"></i>
                        <p class="d-lg-none d-xl-none">Instagram</p>
                    </a>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->

            </ul>
        </div>
    </div>
</nav>