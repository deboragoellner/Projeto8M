
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex justify-content-between align-items-center">

      <div class="logo">
        <h1 class="text-light"><a href="./index.php"><span>Maria Maria</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="('storage/img/logo.png')}}"alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
            <li><a class="active " href="./index.php">Início</a></li>
          <li><a href="team.html">Indicações</a></li>
          <li><a href="contact.html">Depoimentos</a></li>
          <li><a href="{{'usuario'}}">Usuario</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
<br>
<br>
<br>
<br>
<br>
<div style="margin-right: 50px;">
    @guest
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Logar') }}</a>
        </li>
        @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Registrar-se') }}</a>
            </li>
        @endif
    @else
        <!--<div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class='fas fa-user'></i> {{ Auth::user()->name }}
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#"> <i class='fas fa-user-cog'></i> Perfil</a>
                                        <a class="dropdown-item" href="#"><i class='fas fa-cog'></i> Configurações</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class='fas fa-sign-out-alt'></i> {{ __('Logout') }}</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>

                                    </div>
                                </div>-->
    @endguest
</div>
</div>
</nav>
