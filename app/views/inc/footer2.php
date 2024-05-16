
        
        <!-- END PAGE CONTAINER-->
    </div>
    <!-- <section>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="copyright">
                            <p>Copyright © <?php echo date('Y')?> Stanvic Concepts. All rights reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
    <p style="text-align: center;padding-top: 10px;">
        Copyright © <?php echo date('Y')?> Stanvic Concepts. All rights reserved.
    </p>
</div>

    <!-- Jquery JS-->
    <script src="<?= URLROOT;?>/vendor/jquery-3.2.1.min.js"></script>
    <script src="<?= URLROOT ;?>/js/parsley.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="<?= URLROOT;?>/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="<?php echo URLROOT; ?>/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="<?php echo URLROOT; ?>/vendor/slick/slick.min.js">
    </script>
    <script src="<?php echo URLROOT; ?>/vendor/wow/wow.min.js"></script>
    <script src="<?php echo URLROOT; ?>/vendor/animsition/animsition.min.js"></script>
    <script src="<?php echo URLROOT; ?>/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="<?php echo URLROOT; ?>/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="<?php echo URLROOT; ?>/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="<?php echo URLROOT; ?>/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="<?php echo URLROOT; ?>/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="<?php echo URLROOT; ?>/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="<?php echo URLROOT; ?>/vendor/select2/select2.min.js">
    </script>
    <script src="<?php echo URLROOT; ?>/vendor/vector-map/jquery.vmap.js"></script>
    <script src="<?php echo URLROOT; ?>/vendor/vector-map/jquery.vmap.min.js"></script>
    <script src="<?php echo URLROOT; ?>/vendor/vector-map/jquery.vmap.sampledata.js"></script>
    <script src="<?php echo URLROOT; ?>/vendor/vector-map/jquery.vmap.world.js"></script>

    <!-- Main JS-->
    <script src="<?php echo URLROOT; ?>/js/main.js"></script>

    <script>
      $(document).ready(function(){
        $('#loader').fadeOut();
      });
    </script>

    <script>
      $(document).ready(function(){
        $('a').each(function(){
          $(this).click(function(){
             $('#loader').fadeIn();
          });
        });
      });
    </script>

</body>

</html>
<!-- end document-->