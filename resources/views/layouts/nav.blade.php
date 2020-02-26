<nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: white !important;">
    <div class="navbar-header">
        <a class="navbar-brand" href="/">
          <img src="/images/logo.png" width="35"></a>
    </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
           <ul class="navbar-nav mr-auto">           
                
          </ul>
            <div class="form-inline">
              
                
            <ul class="navbar-nav mr-auto">
              <li class="nav-item"><a class="nav-link" href="">Contacto</a></li>
              
              @guest
                  <li class="nav-item"><a class="nav-link" href="{{route('register')}}">
                    Registro
                  </a></li>
                  <li class="nav-item"><a class="nav-link" href="{{route('login')}}">
                    <i class="fas fa-sign-in-alt"></i>
                  </a></li>
              @else
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user"></i></a>          
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                      @if(\Auth::user()->type == 'admin')
                        <a class="dropdown-item" href="{{route('home')}}">Panel</a>
                        <a class="dropdown-item" href="{{route('user.perfil')}}">{{\Auth::user()->name}} {{\Auth::user()->lastname}}</a>
                      @else
                        @if(\Auth::user()->commerce != null)
                          <a class="dropdown-item" href="{{route('home')}}">{{\Auth::user()->commerce->name}}</a>
                        @endif
                        <a class="dropdown-item" href="{{route('user.perfil')}}">{{\Auth::user()->name}} {{\Auth::user()->lastname}}</a>

                      @endif
                        
                        {{-- @if(Auth::user()->type == "admin")
                            
                        @else                                    
                           <a class="dropdown-item" href="">Mi Perfil</a>
                        @endif --}}
                      <a class="dropdown-item" href="{{ route('logout') }}"
                                  onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                                  Cerrar Sesion
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          {{ csrf_field() }}
                      </form>
                    </div>
                  </li>
              @endguest
            </ul>            
            </div>
        </div>
    </div>

</nav>
