<?php require APPROOT . '/views/inc/header2.php';
      require APPROOT . '/views/inc/sidebar.php'; 

flash('msg');?>

<!-- BREADCRUMB-->
<section class="au-breadcrumb m-t-75">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="au-breadcrumb-content">
                        <div class="au-breadcrumb-left">
                            <span class="au-breadcrumb-span">You are here:</span>
                            <ul class="list-unstyled list-inline au-breadcrumb__list">
                                <li class="list-inline-item active">
                                    <a href="<?php echo URLROOT?>/inventory">Inventory</a>
                                </li>
                                <li class="list-inline-item seprate">
                                    <span>/</span>
                                </li>
                                <li class="list-inline-item">
                                    Business Summary
                                </li>
                            </ul>
                        </div>
                        <a href="<?php echo URLROOT;?>/inventory/add_goods" class="au-btn au-btn-icon au-btn--green">
                            <i class="zmdi zmdi-plus"></i>Add goods</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END BREADCRUMB-->
  
    <div class="container-fluid">
    <h5 class="py-2">Initial Stock</h5>
      <div class="row">
        <div class="col-6"><h3 class="py-3 text-center">Inventory Goods<br>
          <span class="font-weight-bold text-warning">
          	<?php if(!empty($data['stock'])):?>
          		<?= $data['stock'];?>
          	<?php else:?>
          		0
          	<?php endif;?>
          </span>
          </h3>
        </div>
        <div class="col-6"><h3 class="py-3 text-center">Stock Capital<br>
          <span class="font-weight-bold text-warning">
          	<?php if(!empty($data['capital'])):?>
          		N<?= put_coma($data['capital']);?>
          	<?php else:?>
          		N0.00
          	<?php endif;?>
          </span>
          </h3>
        </div>
      </div>
    </div><hr>

    <div class="container-fluid">
    <h5 class="py-2">Current Stock</h5>
      <div class="row">
        <div class="col-6"><h3 class="py-3 text-center">Inventory Goods<br>
          <span class="font-weight-bold text-warning">
          	<?php if(!empty($data['stock2'])):?>
          		<?= $data['stock2'];?>
          	<?php else:?>
          		0
          	<?php endif;?>
          </span>
          </h3>
        </div>
        <div class="col-6"><h3 class="py-3 text-center">Stock Capital<br>
          <span class="font-weight-bold text-warning">
          	<?php if(!empty($data['capital2'])):?>
          		N<?= put_coma($data['capital2']);?>
          	<?php else:?>
          		N0.00
          	<?php endif;?>
          </span>
          </h3>
        </div>
      </div>
    </div><hr>


    <div class="container-fluid">
    <h5 class="py-2">Current Month Sales</h5>
      <div class="row">
        <div class="col-6"><h3 class="py-3 text-center">Goods Sold<br>
          <span class="font-weight-bold text-warning">
          	<?php if(!empty($data['stock3'])):?>
          		<?= $data['stock3'];?>
          	<?php else:?>
          		0
          	<?php endif;?>
          </span>
          </h3>
        </div>
        <div class="col-6"><h3 class="py-3 text-center">Amount Sold<br>
          <span class="font-weight-bold text-warning">
          	<?php if(!empty($data['capital3'])):?>
          		N<?= put_coma($data['capital3']);?>
          	<?php else:?>
          		N0.00
          	<?php endif;?>
          </span>
          </h3>
        </div>
      </div>
    </div>

<?php require APPROOT . '/views/inc/footer2.php'; ?>

