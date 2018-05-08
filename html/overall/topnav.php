<nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-dark" id="mainNav">  
  <a href="#" class="navbar-brand">
    <span>Real Estate</span>
  </a>
  <button data-toggle="collapse" data-target="#navbarResponsive" class="navbar-toggler navbar-toggler-right" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
      <li role="presentation" class="nav-item" data-toggle="tooltip" data-placement="right" title="Propiedades">
        <a href="#collapsePropiedades" class="nav-link nav-link-collapse collapsed" data-toggle="collapse" data-parent="#exampleAccordion">
          <i class="fa fa-home fa-fw"></i>
          <span class="nav-link-text">Propiedades</span>
        </a>
        <ul class="sidenav-second-level collapse" id="collapsePropiedades">
          <li>
            <a href="#">
              <i class="fa fa-table fa-fw"></i>
              Registros
            </a>
          </li>
          <li>
            <a href="Agregar/agrprop.html">
              <i class="fa fa-plus fa-fw"></i>
              Nuevo registro
            </a>
          </li>
          <li>
            <a href="Agregar/agrentdoc.html">
              <i class="fa fa-file fa-fw"></i>
              Entregar documentos
            </a>
          </li>
        </ul>
      </li>
      <li role="presentation" class="nav-item" data-toggle="tooltip" data-placement="right" title="Documentos">
        <a href="#collapseDocumentos" class="nav-link nav-link-collapse collapsed" data-toggle="collapse" data-parent="#exampleAccordion">
          <i class="fa fa-file fa-fw"></i>
          <span class="nav-link-text">Documentos</span>
        </a>
        <ul class="sidenav-second-level collapse" id="collapseDocumentos">
          <li>
            <a href="Registros/regdocto.html">
              <i class="fa fa-table fa-fw"></i>
              Registros
            </a>
          </li>
          <li>
            <a href="Agregar/agrdocto.html">
              <i class="fa fa-plus fa-fw"></i>
              Nuevo registro
            </a>
          </li>
        </ul>
      </li>
      <li role="presentation" class="nav-item" data-toggle="tooltip" data-placement="right" title="Usuarios">
        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
          <i class="fa fa-fw fa-users"></i>
          <span class="nav-link-text">Usuarios</span>
        </a>
        <ul class="sidenav-second-level collapse" id="collapseMulti">
          <li>
            <a href="Registros/regusu.html">
              <i class="fa fa-table fa-fw"></i>
              Registros
            </a>
          </li>
          <li>
            <a href="Agregar/agrusu.html">
              <i class="fa fa-plus fa-fw"></i>
              Nuevo registro
            </a>
          </li>
          <li>
            <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapsePermisos">
              <i class="fa fa-wrench fa-fw"></i>
              Permisos
            </a>
            <ul class="sidenav-third-level collapse" id="collapsePermisos">
              <li>
                <a href="Registros/regperm.html">
                  <i class="fa fa-table fa-fw"></i>
                  Registros
                </a>
              </li>
              <li>
                <a href="Agregar/agrperm.html">
                  <i class="fa fa-plus fa-fw"></i>
                  Nuevo registro
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="fa fa-plus fa-fw"></i>
                  Denegar permiso a un rol
                </a>
              </li>
            </ul>
          </li>
          <li>
            <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseRoles">
              <i class="fa fa-gear fa-fw"></i>
              Roles
            </a>
            <ul class="sidenav-third-level collapse" id="collapseRoles">
              <li>
                <a href="Registros/regrol.html">
                  <i class="fa fa-table fa-fw"></i>
                  Registros
                </a>
              </li>
              <li>
                <a href="Agregar/agrrol.html">
                  <i class="fa fa-plus fa-fw"></i>
                  Nuevo registro
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </li>
    </ul>
    <ul class="navbar-nav sidenav-toggler">
      <li role="presentation" class="nav-item">
        <a class="nav-link text-center" id="sidenavToggler">
          <i class="fa fa-fw fa-angle-left"></i>
        </a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-fw fa-user"></i>
          <span>
          <?php echo strtolower($users[$_SESSION['app_id']]['Usuario']); ?>
          </span>
          <span class="indicator text-primary d-none d-lg-block">
            <i class="fa fa-fw fa-circle"></i>
          </span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">
            <strong>Mi cuenta</strong></a>
          <div class="dropdown-divider"></div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
          <i class="fa fa-fw fa-sign-out"></i>
          Logout
        </a>
      </li>
    </ul>
  </div>
</nav>