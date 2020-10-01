 </div>
    </div>
  </div>

  <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#thetable').DataTable();
    } );
  </script>
  <!--  <script src="https://cdn.ckeditor.com/ckeditor5/17.0.0/classic/ckeditor.js"></script> -->
  <script src="<?php echo base_url('assets/ckeditor/ckeditor.js') ?>"></script>
  <script >
    CKEDITOR.replace("theeditor");
  </script>
  <script src="<?php echo base_url('assets/js/sendiri.js') ?>"></script>
</body>
</html>