<!-- Footer -->
<footer class="sticky-footer bg-white">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>Copyright &copy; <?php echo date('Y') ?> Diseño y Desarrollo - Diego Mansilla</span><br>
      <span>Para Programación III de la Tecnicatura Superior en Análisis y Desarrollo de Software</span><br>
      <span>Docente a Cargo: Castro Delfor</span>
      <img src="<?= base_url('public/img/instituto_icon.png') ?>" alt="Logo" style="height:30px; margin-right:10px; vertical-align:middle;">
    </div>
  </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cerrará la sesión?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Seleccione 'Cerrar sesión' a continuación si está listo para finalizar su sesión actual.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
        <a class="btn btn-primary" href="<?php echo base_url(); ?>public/login/logout">Cerrar Sesión</a>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url(); ?>public/js/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>public/bootstrap-5.3.8/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>public/js/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo base_url(); ?>public/js/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo base_url(); ?>public/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?php echo base_url(); ?>public/js/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?php echo base_url(); ?>public/js/vendor/chart.js/Chart.js"></script>
<script src="<?php echo base_url(); ?>public/js/demo/chart-area-demo.js"></script>
<script src="<?php echo base_url(); ?>public/js/demo/chart-pie-demo.js"></script>


<!-- DataTables con botones -->
<script src="<?php echo base_url(); ?>public/DataTables/DataTables.min.js"></script>
<script src="<?php echo base_url(); ?>public/DataTables/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>public/DataTables/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>public/DataTables/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>public/DataTables/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>public/DataTables/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>public/DataTables/vfs_fonts.js"></script>

<script>
  new DataTable('#contenido-lista', {
    language: {
      url: '<?php echo base_url(); ?>public/DataTables/es-ES.json'
    },
    layout: {
      topStart: {
        buttons: [{
            extend: 'csv',
            text: '<i class="fas fa-file-csv"></i> CSV',
            className: 'btn btn-success btn-sm'
          },
          {
            extend: 'excel',
            text: '<i class="fas fa-file-excel"></i> Excel',
            className: 'btn btn-primary btn-sm'
          },
          {
            extend: 'pdf',
            text: '<i class="fas fa-file-pdf"></i> PDF',
            className: 'btn btn-danger btn-sm'
          },
          {
            extend: 'print',
            text: '<i class="fas fa-print"></i> Imprimir',
            className: 'btn btn-info btn-sm'
          }
        ]
      }
    }
  });
</script>

<script>
  var ctx = document.getElementById('graficoFinanzas');
  if (ctx) {
    new Chart(ctx, {
      type: 'pie',
      data: {
        labels: ['Ingresos', 'Egresos'],
        datasets: [{
          label: 'Total $',
          data: [<?= $ingresos ?? 0 ?>, <?= $egresos ?? 0 ?>],
          backgroundColor: ['#28a745', '#dc3545']
        }]
      }
    });
  }
</script>

<?php
if (session()->getFlashdata('mensaje')):
?>
  <div class="modal fade" id="modalMensaje" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header
          <?php $tipo = session()->getFlashdata('tipo');
          if ($tipo == 'success') echo 'bg-success text-white';
          elseif ($tipo == 'warning') echo 'bg-warning';
          elseif ($tipo == 'info') echo 'bg-info text-white';
          else echo 'bg-secondary text-white';
          ?>">
          <h5 class="modal-title">Sistema</h5>
        </div>
        <div class="modal-body">
          <?= session()->getFlashdata('mensaje') ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Aceptar</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      var modal = new bootstrap.Modal(document.getElementById('modalMensaje'));
      modal.show();
    });
  </script>
<?php
endif;
?>

</body>

</html>