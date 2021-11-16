<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= baseUrl ?>node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= baseUrl ?>node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= baseUrl ?>assets/css/style.css?v=<?php echo time(); ?>">
    <title>Document</title>
</head>
<header id="header">
    <div class="row m-0">
        <div class="col-3 bg-black  overflow-auto">
            <nav class="primary-nav navbar-expand-md">
                <div class=" text-center py-3">
                    <a href="<?= baseUrl ?>Products/index" class="text-title-menu">
                        Quick Shopping
                        <i class="bi bi-controller"></i></a>
                    <p class="text-white">Tienda de juegos online</p>
                </div>
                <div class="flex-colum">
                    <?php if (isset($_SESSION['Admin'])) : ?>
                        <a href="<?= baseUrl ?>Users/perfil" class="nav-item nav-link text-subtitle-menu">Panel</a>
                        <a href="#" class="nav-item nav-link text-subtitle-menu">Ver Clientes</a>
                        <a href="#" class="nav-item nav-link text-subtitle-menu">Lista de Participantes</a>
                        <a href="#" class="nav-item nav-link text-subtitle-menu">Crear Noticia</a>
                        <a href="#" class="nav-item nav-link text-subtitle-menu">Crear Evento</a>
                        <a href="#" class="nav-item nav-link text-subtitle-menu">Crear Producto</a>
                        <a href="#" class="nav-item nav-link text-subtitle-menu">Crear Categoria</a>
                        <a href="<?= baseUrl ?>Users/logout" class="nav-item nav-link text-subtitle-menu">Cerrar Session</a>




                    <?php elseif (!isset($_SESSION['Admin'])) : ?>
                        <a href="#" class="nav-item nav-link text-subtitle-menu">Inicio</a>
                        <a href="#" class="nav-item nav-link text-subtitle-menu">Nosotros</a>
                        <a href="#" class="nav-item nav-link text-subtitle-menu">Servicios</a>
                        <a href="#" class="nav-item nav-link text-subtitle-menu">Portafolio</a>
                        <a href="#" class="nav-item nav-link text-subtitle-menu">Noticias</a>
                        <a href="#" class="nav-item nav-link text-subtitle-menu">Comunicate con
                            nosotros</a>
                        <a href="<?= baseUrl ?>Clients/sessions" class="nav-item nav-link text-subtitle-menu">
                            Iniciar session</a>
                        <a href="<?= baseUrl ?>Users/session" class="nav-item nav-link text-subtitle-menu">Admin</a>
                        <div class="container icons">
                            <a href=""><i class=" bi bi-twitter mx-1"></i></a>
                            <a href=""><i class="bi bi-facebook mx-1"></i></a>
                            <a href=""><i class="bi bi-instagram mx-1"></i></a>
                            <a href=""><i class="bi bi-xbox mx-1"></i></a>
                            <a href=""><i class="bi bi-playstation mx-1"></i></a>
                            <a href=""><i class="bi bi-nintendo-switch mx-1"></i></a>
                        </div>
                    <?php endif; ?>

                </div>
            </nav>
        </div>
    </div>
    <button class="toggle-button"><span class="fas fa-bars fa-2x"></span></button>
    <div class="social">
        <span class="mr-3"><i class="fab fa-facebook"></i></span>
        <span class="mr-3"><i class="fab fa-twitter"></i></span>
        <span class="mr-3"><i class="fab fa-instagram"></i></span>
    </div>
</header>
<nav class="navbar navbar-expand-lg navbar-light bg-black fixed-top" id="menu">
    <div class="container-fluid">
        <a class="navbar-brand text-white" href="#">Tienda de juegos</a>
        <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                <li class="nav-item">
                    <a class="nav-link active text-white" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Link</a>
                </li>
        </div>
    </div>
</nav>

<body>