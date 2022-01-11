<?php require_once('view/layout/Header2.php') ?>
<div class="container">
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= baseUrl ?>Products/create">Crear</a></li>
            <li class="breadcrumb-item"><a href="<?= baseUrl ?>Products/view">Ver Tabla</a></li>

        </ol>
    </nav>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <?php if (isset($editProduct) && is_object($editProduct)) : ?>
                <h6 class="m-0 font-weight-bold text-primary">EDITAR PRODUCTO N°<?= $editProduct->idproduct ?></h6>
                <?php $UrlAction = baseUrl . "Products/save&id=" . $editProduct->idproduct ?>
            <?php else : ?>
                <h6 class="m-0 font-weight-bold text-primary">PRODUCTOS</h6>
                <?php $UrlAction = baseUrl . "Products/save" ?>

            <?php endif; ?>
        </div>
        <div class="card-body">
            <form class="user" action="<?= $UrlAction ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label class="form-label">Nombre del producto:</label>
                        <input type="text" class="form-control" name="name" required value="<?= isset($editProduct) && is_object($editProduct) ? $editProduct->name : "" ?>">
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label">Descripcion:</label>
                        <input type="text" class="form-control" name="description" required value="<?= isset($editProduct) && is_object($editProduct) ? $editProduct->description : "" ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label class="form-label">Nombre del Fabricante:</label>
                        <input type="text" class="form-control" name="creator" required value="<?= isset($editProduct) && is_object($editProduct) ? $editProduct->creator : "" ?>">
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label">Formato:</label>
                        <input type="text" class="form-control" name="format" required value="<?= isset($editProduct) && is_object($editProduct) ? $editProduct->format : "" ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label class="form-label">Lenguaje de voces:</label>
                        <input type="text" class="form-control" name="voices" required value="<?= isset($editProduct) && is_object($editProduct) ? $editProduct->voices : "" ?>">
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label">Idioma general del juego:</label>
                        <input type="text" class="form-control" name="language" required value="<?= isset($editProduct) && is_object($editProduct) ? $editProduct->language : "" ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label class="form-label">Requeriminetos:</label>
                        <input type="textarea" class="form-control" name="requirements" required value="<?= isset($editProduct) && is_object($editProduct) ? $editProduct->requirements : "" ?>">
                    </div>

                    <div class="col-sm-6">
                        <label for="">Es online</label>
                        <select class="form-control " aria-label="Default select example" name="online">
                            <option value="Si" <?= isset($editProduct) && is_object($editProduct) && $editProduct->online == "Si" ? 'selected' : "" ?>>Si</option>
                            <option value="No" <?= isset($editProduct) && is_object($editProduct) && $editProduct->online == "No"  ? 'selected' : "" ?>>No</option>
                        </select>
                    </div>

                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label class="form-label">Precio de compra:</label>
                        <input type="number" class="form-control " placeholder="" name="price_init" required value="<?= isset($editProduct) && is_object($editProduct) ? $editProduct->price_init : "" ?>">
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label">Precio de vemta:</label>
                        <input type="number" class="form-control " name="price" required value="<?= isset($editProduct) && is_object($editProduct) ? $editProduct->price : "" ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label class="form-label">Cantidad de productos disponibles:</label>
                        <input type="number" class="form-control" name="stock" required value="<?= isset($editProduct) && is_object($editProduct) ? $editProduct->stock : "" ?>">


                    </div>
                    <div class="col-sm-6">
                        <label class="form-label">Descuento aplicado:</label>
                        <input type="number" class="form-control" name="discount" required value="<?= isset($editProduct) && is_object($editProduct) ? $editProduct->discount : "" ?>">


                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label class="form-label">Fecha de creacion:</label>
                        <input type="date" class="form-control" name="create_at" required value="<?= isset($editProduct) && is_object($editProduct) ? $editProduct->create_at : "" ?>">

                    </div>
                    <div class="col-sm-6">
                        <label for="">Seleccionar la categoria</label>
                        <select class="form-control " aria-label="Default select example" name="Category_id">
                            <?php $CATEGORIES = utilities::allCategory(); ?>
                            <?php while ($CATEGORY = $CATEGORIES->fetch_object()) : ?>
                                <option value="<?= $CATEGORY->idcategory ?>" <?= isset($editProduct) && is_object($editProduct) && $CATEGORY->idcategory == $editProduct->Category_id ? 'selected' : "" ?>><?= $CATEGORY->name ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>

                </div>
                <div class="form-group row">
                    <div class="col-sm-6">

                        <label for="">Mostrar Producto</label>
                        <select class="form-control " aria-label="Default select example" name="status">
                            <option value="Activo" <?= isset($editProduct) && is_object($editProduct) && $editProduct->status == "Activo" ? 'selected' : "" ?>>Activo</option>
                            <option value="Inactivo" <?= isset($editProduct) && is_object($editProduct) && $editProduct->status == "Inactivo" ? 'selected' : "" ?>>Inactivo</option>
                        </select>

                    </div>
                    <div class="col-sm-6">
                        <?php if (isset($editProduct) && is_object($editProduct)) : ?>
                            <label for="">Cambiar imagen:</label>
                            <input type="file" class="form-control" name="image">
                            <img src="<?= baseUrl ?>Uploads/products/<?= $editProduct->image ?>" class="float-right mt-1" height="90" width="80" alt="">
                        <?php else : ?>
                            <label for="">Seleccionar imagen del producto</label>
                            <input type="file" class="form-control" name="image" required>
                        <?php endif; ?>
                        <?php if (isset($editProduct) && is_object($editProduct)) : ?>
                        <?php endif; ?>
                    </div>
                </div>
                <?php if (isset($editProduct) && is_object($editProduct)) : ?>
                    <button class="btn btn-warning btn-icon-split float-right" type="submit">
                        <span class="icon text-white-50">
                            <i class="bi bi-check-circle-fill"></i>
                        </span>
                        <span class="text">EDITAR PRODUCTO</span>
                    </button>
                <?php else : ?>
                    <button class="btn btn-success btn-icon-split float-right" type="submit">
                        <span class="icon text-white-50">
                            <i class="bi bi-check-circle-fill"></i>
                        </span>
                        <span class="text">CREAR PRODUCTO</span>
                    </button>
                <?php endif; ?>

            </form>
        </div>
    </div>
</div>
<?php require_once('view/layout/Footer2.php') ?>