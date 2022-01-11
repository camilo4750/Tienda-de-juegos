<?php require_once('view/layout/Header2.php') ?>
<?php if (isset($_SESSION['Admin'])) : ?>
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">CONTROL DE PEDIDOS</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div>
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                    Pedidos Pendientes</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= isset($pendientes) && is_object($pendientes) ? $pendientes->totalPending : "0" ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-exclamation-triangle fa-2x text-danger"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Pedidos En Preparacion</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= isset($preparacion) && is_object($preparacion) ? $preparacion->totalPreparation : "0" ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-hammer fa-2x text-warning"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Pedidos Enviados</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= isset($enviados) && is_object($enviados) ? $enviados->totalSend : "0" ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-paper-plane fa-2x text-info"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Pedidos Entregados</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= isset($entregados) && is_object($entregados) ? $entregados->totalDelivered : "0" ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-thumbs-up  fa-2x text-success"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">PANEL DE CONTROL</h1>
        </div>
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Total en ventas</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"> $<?= isset($ValorPedidos) && is_object($ValorPedidos) ? number_format($ValorPedidos->totalOrders) : "0" ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-success"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="<?= baseUrl ?>Products/stockEmpty" class="text-decoration-none">
                    <div class="card border-left-danger border-panel h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                        Stocks vacios</div>
                                    <div class="h5 mb-0 font-weight-bold text-dark"><?= isset($stock) && is_object($stock) ? $stock->totalStock : "0" ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-shopping-bag fa-2x text-gray-400"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="<?= baseUrl ?>Clients/view" class="text-decoration-none">
                    <div class="card border-left-secondary border-panel h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                        Clientes Registrados</div>
                                    <div class="h5 mb-0 font-weight-bold text-dark"><?= isset($totalClients) && is_object($totalClients) ? $totalClients->total : "0" ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-users fa-2x text-gray-400"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="<?= baseUrl ?>Products/view" class="text-decoration-none">
                    <div class="card border-left-secondary border-panel h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                        Prouductos de la tienda</div>
                                    <div class="h5 mb-0 font-weight-bold text-dark"> <?= isset($totalProducts) && is_object($totalProducts) ? $totalProducts->total : "0" ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-cart-plus fa-2x text-gray-400"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="<?= baseUrl ?>Comments/view" class="text-decoration-none">
                    <div class="card border-left-secondary border-panel h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                        Comentarios Productos</div>
                                    <div class="h5 mb-0 font-weight-bold text-dark"> <?= isset($totalComments) && is_object($totalComments) ? $totalComments->total : "0" ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-comments fa-2x text-gray-400"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="<?= baseUrl ?>Events/view" class="text-decoration-none">
                    <div class="card border-left-secondary border-panel h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                        Eventos Creados</div>
                                    <div class="h5 mb-0 font-weight-bold text-dark"> <?= isset($totalEvents) && is_object($totalEvents) ? $totalEvents->total : "0" ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar-day fa-2x text-gray-400"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="<?= baseUrl ?>Participants/view" class="text-decoration-none">
                    <div class="card border-left-secondary border-panel h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                        Participantes</div>
                                    <div class="h5 mb-0 font-weight-bold text-dark"><?= isset($totalParticipants) && is_object($totalParticipants) ? $totalParticipants->total : "0" ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-user fa-2x text-gray-400"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php require_once('view/layout/Footer2.php') ?>