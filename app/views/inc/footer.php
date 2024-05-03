
<script src="<?php echo URLROOT; ?>/js/jquery.js"></script>

<script src="<?= URLROOT ;?>/js/parsley.min.js"></script>
<script src="<?php echo URLROOT; ?>/js/bootstrap.bundle.min.js"></script>
<script>
  // document.addEventListener('DOMContentLoaded', userScroll);
     const tooltip = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    const tooltipList = [...tooltip].map((tooltipTrigger) => new bootstrap.Tooltip(tooltipTrigger));
    //popover
    const popover = document.querySelectorAll('[data-bs-toggle="popover"]');
    const popoverList = [...popover].map((popoverTrigger) => new bootstrap.Popover(popoverTrigger));
</script>
<script src="<?php echo URLROOT; ?>/app.js"></script>
<script>
  $(document).ready(function(){
    $('#loader').fadeOut();
  });
</script>



<script>
  $(document).ready(function(){
    $('#link1').click(function(){
      $('#loader').fadeIn();
    });
  });
</script>
<script>
  $(document).ready(function(){
    $('#link6').click(function(){
      $('#loader').fadeIn();
    });
  });
</script>
<script>
  $(document).ready(function(){
    $('#link2').click(function(){
      $('#loader').fadeIn();
    });
  });
</script>
<script>
  $(document).ready(function(){
    $('#link3').click(function(){
      $('#loader').fadeIn();
    });
  });
</script>
<script>
  $(document).ready(function(){
    $('#link4').click(function(){
      $('#loader').fadeIn();
    });
  });
</script>
<script>
  $(document).ready(function(){
    $('#link5').click(function(){
      $('#loader').fadeIn();
    });
  });
</script>