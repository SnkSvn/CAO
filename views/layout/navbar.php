

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php"><i class="fa-solid fa-graduation-cap m"></i> CAO</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor02">
        <ul class="navbar-nav me-auto">
            
            <li class="nav-item">
            <a id="idnavcursos" class="nav-link active" href="cursos.php">Cursos</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active" href="../index.php#about">About</a>
            </li>

        </ul>

        <ul class="navbar-nav ">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa-solid fa-user"></i><?= " " ,$_SESSION['nombres'], " " , $_SESSION['apellidos'];?></a>
            <div class="dropdown-menu">
                    <a class="dropdown-item" href="perfil.php">Perfil</a>
                    <a class="dropdown-item" href="crearCurso.php">Crear un curso</a>
                    <a class="dropdown-item" href="lista-Curso.php">Mis Cursos</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../controllers/usuario.controller.php?op=cerrar-sesion">Cerrar sesion</a>
            </div>
            </li>
        </ul>
        </div>
    </div>
    </nav>
    <!-- Navbar -->