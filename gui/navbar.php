<!-- Los estilos de navbar son definidos en la libreria css de Bootstrap -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <a class="navbar-brand" href="#">
        <img src="../lib/img/Logo-UNPA-UARG-azul.png" width="30" height="30" class="d-inline-block align-top" alt="">
        GEF
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

            <li class="nav-item">
                <a class="nav-link" href="../app/inicio.php">
                    <span class="oi oi-person" />
                    Inicio
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../app/gestionExamen.php">
                    <span class="oi oi-spreadsheet" />
                    Gestionar mesa de examen
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../app/docente.php">
                    <span class="oi oi-person" />
                    Gestionar Docente
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../app/Novedades.php">
                    <span class="oi oi-person" />
                    Gestionar Novedades
                </a>
            </li>    
            <li class="nav-item">
                <a class="nav-link" href="../app/gestionarAfectacion.php">
                    <span class="oi oi-person" />
                    Gestionar Afectaciones
                </a>
            </li>          
            <?php if (ControlAcceso::verificaPermiso(PermisosSistema::PERMISO_ROLES)) { ?>
                <li class = "nav-item">
                    <a class = "nav-link" href = "../app/roles.php">
                        <span class = "oi oi-graph" />
                        Roles
                    </a>
                </li>
            <?php } ?>

            <?php if (ControlAcceso::verificaPermiso(PermisosSistema::PERMISO_PERMISOS)) { ?>
                <li class="nav-item">
                    <a class="nav-link" href="../app/permisos.php">
                        <span class="oi oi-lock-locked" />
                        Permisos
                    </a>
                </li>
                <?php } ?>

                <li class="nav-item">
                    <a class="nav-link" href="../app/salir.php">
                        <span class="oi oi-account-logout" />
                        Salir
                    </a>
                </li>
            </ul>
        </div>
    </nav>


    <div class="alert alert-info alert-dismissible fade show" role="alert">
        Ud. est&aacute; conectad@ como <strong><?= $_SESSION['usuario']->nombre; ?></strong>.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
