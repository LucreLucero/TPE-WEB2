<!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <script type="text/javascript" src="js/jquery-3.2.1.slim.min.js"></script>
        <script type="text/javascript" src="js/popper.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
        <link rel="stylesheet" type="text/css" href="{$BASE_URL}css/bootstrap.min.css">
        <link rel="stylesheet" href="{$BASE_URL}css/estilos.css">

        <!-- development version, includes helpful console warnings -->
        {* <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script> *}

        <title>Pagina de octi y lu</title>    
    </head>

    <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      {* {if isset($smarty.session.USER_ADMIN)}
        <a class="navbar-brand" href="{$BASE_URL}homeAdmin">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        {else} *}
      {* {/if} *}
        {if $isAdmin = 1}
        <p>{$isAdmin}</p>
          <a class="navbar-brand" href="{$BASE_URL}homeAdmin">Cuevana</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{$BASE_URL}homeAdmin">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{$BASE_URL}homeAdmin">Fechas</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="{$BASE_URL}homeAdmin" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Proximos eventos
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Contacto</a>
            </li>
          </ul>
        
        {else}
        <a class="navbar-brand" href="{$BASE_URL}">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="{$BASE_URL}">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{$BASE_URL}">Fechas</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="{$BASE_URL}" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Proximos eventos
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Contacto</a>
          </li>
      </ul>
      {/if}
          <form class="form-inline my-2 my-lg-0">
              {* <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"> *}
              
               {* si esta ID_USER está seteado el boton LogOut se habilita, sino sólo está logIn *}
              {if isset($smarty.session.ID_USER)}
                <a class="nav-link" id="userName" disabled>{$smarty.session.USERNAME}</a>
                <a href="{$BASE_URL}logout"><div class="btn btn-light" id="LogOut">Log Out</div></a>
              {else} 
                <a href="{$BASE_URL}login"><div class="btn btn-light">Log In</div></a>
                <a href="{$BASE_URL}signIn"><div class="btn btn-light">Sign In</div></a>
              {/if}
              
          </form>
        </div>
      </nav>  
      
