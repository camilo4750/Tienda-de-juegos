<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= baseUrl ?>node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= baseUrl ?>node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= baseUrl ?>assets/css/style.css">
    <style type="text/css">
        #global {
            height: 300px;
            width: 200px;
            border: 1px solid #ddd;
            background: #f1f1f1;
            overflow-y: scroll;
        }

        #mensajes {
            height: auto;
        }

        .texto {
            padding: 4px;
            background: #fff;
        }
    </style>
    <title>Document</title>
</head>
<header id="header">
    <div class="row m-0">
        <div class="col-3 bg-black">
            <nav class="primary-nav navbar-expand-md">
                <div class="site-title text-center py-3">
                    <a href="#" class="text-title-menu">Quick Shopping</a>
                    <p class="text-white">Tienda de juegos online</p>
                </div>
                <div class="flex-colum overflow-auto">
                    <a href="#" class="nav-item nav-link text-subtitle-menu">Inicio</a>
                    <a href="#" class="nav-item nav-link text-subtitle-menu">Nosotros</a>
                    <a href="#" class="nav-item nav-link text-subtitle-menu">Servicios</a>
                    <a href="#" class="nav-item nav-link text-subtitle-menu">Portafolio</a>
                    <a href="#" class="nav-item nav-link text-subtitle-menu">Noticias</a>
                    <a href="#" class="nav-item nav-link text-subtitle-menu">Comunicate con
                        nosotros</a>
                    <a href="#" class="nav-item nav-link text-subtitle-menu">Iniciar session</a>
                    <ul>
                        <li><a href=""><i class="bi bi-instagram"></i></a></li>
                        <li><a href=""><i class="bi bi-instagram"></i></a></li>
                    </ul>
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