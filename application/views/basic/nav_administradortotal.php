    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Encar</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/encar/index.php/encar">Encar</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="/encar/index.php/encar">Inicio</a></li>
            <li><a href="http://getbootstrap.com/examples/starter-template/#contact">Reservas</a></li>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="http://getbootstrap.com/examples/starter-template/#contact" class="dropdown-toggle" data-toggle="dropdown">Vehiculos<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="/encar/index.php/encar/registrar_vehiculovista">Registrar</a></li>               
              </ul>
            </li>                   
          </ul> 
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="http://getbootstrap.com/examples/starter-template/#contact" class="dropdown-toggle" data-toggle="dropdown">Administrador Sede<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="/encar/index.php/encar/registrar_adminsedevista">Registrar</a></li>               
              </ul>
            </li>                   
          </ul> 
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="http://getbootstrap.com/examples/starter-template/#contact" class="dropdown-toggle" data-toggle="dropdown">Codigos de descuento<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="/encar/index.php/encar/registrar_codigovista">Registrar</a></li>               
              </ul>
            </li>                   
          </ul>                                                               
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="http://getbootstrap.com/examples/starter-template/#contact" class="dropdown-toggle" data-toggle="dropdown"><?php if (isset($usuario)) {echo $usuario;} ?><span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="/encar/index.php/encar/logout">Cerrar sesion</a></li>               
              </ul>
            </li>                   
          </ul>          
        </div><!--/.nav-collapse -->
      </div>
    </nav>