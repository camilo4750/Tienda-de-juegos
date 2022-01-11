<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

    <link rel="stylesheet" href="<?= baseUrl ?>node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link href="<?= baseUrl ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?= baseUrl ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" type="text/css" href="<?= baseUrl ?>node_modules/DataTables/datatables.min.css" />
    <link rel="stylesheet" href="<?= baseUrl ?>assets/css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
</head>

<body id="page-top">
    <div id="wrapper" class="overflow-auto">
        <ul class="navbar-nav bg-gradient-dark  sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= baseUrl ?>Users/panel">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="bi bi-cart4"></i>
                </div>
                <div class="sidebar-brand-text mx-2">QUICK SHOPPING<sup><i class="bi bi-controller"></i></sup></div>
            </a>
            <hr class="sidebar-divider my-0">

            <a class="btn btn-sm btn-danger mb-2 mt-2" href="<?= baseUrl ?>Users/logout">
                Cerrar Session
            </a>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Opciones
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapseTwo1" aria-expanded="true" aria-controls="collapseTwo1">
                    <i class="bi bi-people-fill"></i>
                    <span>Clientes</span>
                </a>
                <div id="collapseTwo1" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Componentes:</h6>
                        <a class="collapse-item" href="<?= baseUrl ?>Clients/view">Ver</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapseTwo7" aria-expanded="true" aria-controls="collapseTwo1">
                    <i class="bi bi-people-fill"></i>
                    <span>Pedidos</span>
                </a>
                <div id="collapseTwo7" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Componentes:</h6>
                        <a class="collapse-item" href="<?= baseUrl ?>Orders/listOrders">Ver</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo2" aria-expanded="true" aria-controls="collapseTwo2">
                    <i class="bi bi-joystick"></i>
                    <span>Participantes</span>
                </a>
                <div id="collapseTwo2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Componentes:</h6>
                        <a class="collapse-item" href="<?= baseUrl ?>Participants/view">Ver</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo3" aria-expanded="true" aria-controls="collapseTwo3">
                    <i class="bi bi-newspaper"></i>
                    <span>Noticias</span>
                </a>
                <div id="collapseTwo3" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Componentes:</h6>
                        <a class="collapse-item" href="<?= baseUrl ?>Tidings/create">Crear</a>
                        <a class="collapse-item" href="<?= baseUrl ?>Tidings/view">Ver</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#collapseTwo4" aria-expanded="true" aria-controls="collapseTwo4">
                    <i class="bi bi-calendar-day-fill"></i>
                    <span>Eventos</span>
                </a>
                <div id="collapseTwo4" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Componentes:</h6>
                        <a class="collapse-item" href="<?= baseUrl ?>Events/create">Crear</a>
                        <a class="collapse-item" href="<?= baseUrl ?>Events/view">Ver</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo5" aria-expanded="true" aria-controls="collapseTwo5">
                    <i class="bi bi-bag-plus-fill"></i>
                    <span>Productos</span>
                </a>
                <div id="collapseTwo5" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Componentes:</h6>
                        <a class="collapse-item" href="<?= baseUrl ?>Products/create">Crear</a>
                        <a class="collapse-item" href="<?= baseUrl ?>Products/view">Ver</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo8" aria-expanded="true" aria-controls="collapseTwo5">
                    <i class="bi bi-chat-left-text-fill"></i>
                    <span>Comentarios</span>
                </a>
                <div id="collapseTwo8" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Componentes:</h6>
                        <a class="collapse-item" href="<?= baseUrl ?>Comments/view">Ver</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo6" aria-expanded="true" aria-controls="collapseTwo6">
                    <i class="bi bi-file-earmark-plus-fill"></i>
                    <span>Categorias</span>
                </a>
                <div id="collapseTwo6" class="collapse" aria-labelledby="headingTwo6" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Componentes:</h6>
                        <a class="collapse-item" href="<?= baseUrl ?>Category/create">Crear</a>
                        <a class="collapse-item" href="<?= baseUrl ?>Category/view">Ver</a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider">
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-dark topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bi bi-search"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bi bi-bell-fill"></i>
                                <?php $count = utilities::countOrdersPending(); ?>
                                <span class="badge badge-danger badge-counter">+<?= $count->totalPending ?></span>
                            </a>
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in overflow-auto" aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    PEDIDOS PENDIENTES
                                </h6>

                                <?php if ($count->totalPending == 0) : ?>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="mr-3">
                                            <div class="icon-circle bg-primary text-white">
                                                <i class="bi bi-cart4"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <span class="font-weight-bold">No tienes pedidos pendiente</span>
                                        </div>
                                    </a>
                                <?php else : ?>

                                <?php endif; ?>
                                <?php $Pending = utilities::ordersPending(); ?>

                                <?php while ($orderPending = $Pending->fetch_object()) : ?>
                                    <a class="dropdown-item d-flex align-items-center" href="<?= baseUrl ?>Orders/detailsOrder&id=<?= $orderPending->idorder ?>">
                                        <div class="mr-3">
                                            <div class="icon-circle bg-primary text-white">
                                                <i class="bi bi-cart-plus-fill"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="small text-gray-500"><?= $orderPending->create_ad . " " . $orderPending->time  ?></div>
                                            <span class="font-weight-bold"><?= $orderPending->city ?> - $<?= $orderPending->coste ?></span>
                                        </div>
                                    </a>
                                <?php endwhile; ?>

                                <a class="dropdown-item text-center text-success font-weight-bold " href="<?= baseUrl ?>Orders/listOrders">Ver todos los pedidos</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php if (isset($_SESSION['Admin'])) : ?>
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION['Admin']->name ?> <i class="bi bi-caret-down-fill"></i></span>
                                <?php endif; ?>
                                <img class="img-profile rounded-circle" src="<?= baseUrl ?>Uploads/profiles/<?= $_SESSION['Admin']->image ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?= baseUrl ?>Users/profileAdmin&id=<?= $_SESSION['Admin']->idclient ?>">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>