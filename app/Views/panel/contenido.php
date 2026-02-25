<!-- Content Row -->
<div class="row">


<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
    <img src="<?= base_url('public/img/usuarios.jpg') ?>" alt="img.jpg">    
    <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2 text-center"> 
                    <div class="text-xs font-weight-bold text-custom text-uppercase mb-1">
                        Usuarios</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php echo $totalUsuarios?>
                    </div>
                </div>
                <div class="col-auto">
                    <i class="bi bi-person-rolodex fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
    <img src="<?= base_url('public/img/autos.jpg') ?>" alt="img.jpg">    
    <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2 text-center">
                    <div class="text-xs font-weight-bold text-custom text-uppercase mb-1">
                        Autos</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalAutos?></div>
                </div>
                <div class="col-auto">
                    <i class="bi bi-car-front-fill fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
    <img src="<?= base_url('public/img/clientes.jpg') ?>" alt="img.jpg">    
    <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2 text-center">
                    <div class="text-xs font-weight-bold text-custom text-uppercase mb-1">
                        Clientes</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalClientes?></div>
                </div>
                <div class="col-auto">
                    <i class="bi bi-people-fill fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
    <img src="<?= base_url('public/img/proveedores.jpg') ?>" alt="img.jpg">    
    <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2 text-center">
                    <div class="text-xs font-weight-bold text-custom text-uppercase mb-1">
                        Proveedores</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalProveedores?></div>
                </div>
                <div class="col-auto">
                    <i class="bi bi-box-fill fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
    <img src="<?= base_url('public/img/reparaciones.jpg') ?>" alt="img.jpg">    
    <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2 text-center">
                    <div class="text-xs font-weight-bold text-custom text-uppercase mb-1">
                        Reparaciones</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalReparaciones?></div>
                </div>
                <div class="col-auto">
                    <i class="bi bi-tools fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Aplicación Chart Js -->
 <h3>Resumen de Ingresos/Egresos</h3>
 <canvas id="graficoFinanzas"></canvas>

<!-- Content Row -->
<div class="row">

<!-- Content Column -->
<div class="col-lg-6 mb-4">






</div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
