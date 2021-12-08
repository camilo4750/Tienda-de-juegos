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
                        <input type="text" class="form-control form-control-user" placeholder="Nombre del producto" name="name" required value="<?= isset($editProduct) && is_object($editProduct) ? $editProduct->name : "" ?>">
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control form-control-user" placeholder="Descripcion" name="description" required value="<?= isset($editProduct) && is_object($editProduct) ? $editProduct->description : "" ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="number" class="form-control form-control-user" placeholder="Precio del producto" name="price" required value="<?= isset($editProduct) && is_object($editProduct) ? $editProduct->price : "" ?>">
                    </div>
                    <div class="col-sm-6">
                        <input type="number" class="form-control form-control-user" placeholder="Cantidad de productos disponibles" name="stock" required value="<?= isset($editProduct) && is_object($editProduct) ? $editProduct->stock : "" ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="number" class="form-control form-control-user" placeholder="Descuento aplicado" name="discount" required value="<?= isset($editProduct) && is_object($editProduct) ? $editProduct->discount : "" ?>">
                    </div>
                    <div class="col-sm-6">
                        <input type="date" class="form-control form-control-user" placeholder="Cantidad de productos disponibles" name="create_at" required value="<?= isset($editProduct) && is_object($editProduct) ? $editProduct->create_at : "" ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="">Seleccionar la categoria</label>
                        <select class="form-control " aria-label="Default select example" name="Category_id">
                            <?php $CATEGORIES = utilities::allCategory(); ?>
                            <?php while ($CATEGORY = $CATEGORIES->fetch_object()) : ?>
                                <option value="<?= $CATEGORY->idcategory ?>" <?= isset($editProduct) && is_object($editProduct) && $CATEGORY->idcategory == $editProduct->Category_id ? 'selected' : "" ?>><?= $CATEGORY->name ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label for="">Mostrar Producto</label>
                        <select class="form-control " aria-label="Default select example" name="status">
                            <option value="Activo">Activo</option>
                            <option value="Inactivo">Inactivo</option>
                        </select>
                    </div>

                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <?php if (isset($editProduct) && is_object($editProduct)) : ?>
                            <label for="">Cambiar imagen:</label>
                            <input type="file" class="form-control" name="image">
                        <?php else : ?>
                            <label for="">Seleccionar imagen del producto</label>
                            <input type="file" class="form-control" name="image" required>
                        <?php endif; ?>
                    </div>
                    <div class="col-sm-6">
                        <?php if (isset($editProduct) && is_object($editProduct)) : ?>
                            <img src="<?= baseUrl ?>Uploads/products/<?= $editProduct->image ?>" height="90" width="80" alt="">
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