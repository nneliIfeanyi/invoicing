
</div>
<!-- <footer class="text-center text-light fs-6 p-3 bg-dark mt-7">
	Copyright &copy; <?php echo date('Y');?>
	<a class="badge"> Stanvic_Concepts
	</a>
</footer> -->
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
