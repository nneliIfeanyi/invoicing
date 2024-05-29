<?php require APPROOT . '/views/inc/header2.php';
      require APPROOT . '/views/inc/sidebar2.php'; 

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
                                    Add Goods
                                </li>
                            </ul>
                        </div>
                        <a href="<?php echo URLROOT;?>/inventory/goods" class="au-btn au-btn-icon au-btn--green">
                            go to added goods</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END BREADCRUMB-->

<div class="container-fluid">
<div class="row py-5">
<div class="col-lg-10 mx-auto">
    <div class="card">
        <div class="card-header"><?php echo $_SESSION['user_name']?></div>
        <div class="card-body">
            <div class="card-title">
                <h3 class="text-center title-2">Add Goods To Your Inventory</h3>
            </div>
            <hr>
            <form action="<?php echo URLROOT;?>/submissions/add_goods" method="post" novalidate="novalidate">
                <div class="table-responsive">
		            <table class="table  border w-100">
		              <thead>
		                <tr class="border text-center text-muted">
		                  <th style="text-align: left;">SN</th>
		                  <th style="text-align: left;">Instock</th>
		                  <th style="text-align: left;">Description of goods</th>
		                  <th style="text-align: left;">Unit cost price</th>
		                </tr>
		              </thead>
		              <tbody>
		                <?php for ($i=1; $i < 16; $i++) { 
		                  ?>
		                  <tr>
		                  	<td><?= $i;?></td>
		                    <td>
		                       <input min="0" name="qty[]" class="form-input" data-parsley-trigger="keyup" data-parsley-pattern="^[0-9.]+$" style="width: 60px;">
		                    </td>
		                    <td>
		                      <input name="name[]" class="form-input" data-parsley-trigger="keyup" data-parsley-pattern="^[a-zA-Z0-9. ']+$" type="text" style="width: 50vh;">
		                    </td>
		                    <td>
		                      <input name="rate[]" min="0" data-parsley-pattern="^[0-9.]+$" data-parsley-trigger="keyup" class="form-input" style="width: 10vw;">
		                    </td>
		                  </tr>
		                  <?php
		                }?>
		              </tbody>
		            </table>
            	</div>
                <button id="add-button" type="submit" class="btn btn-lg btn-info btn-block">
                    <i class="fa fa-plus fa-lg"></i>&nbsp;
                    <span id="add-button-dsc">Add Goods</span>
                    <span id="add-button-sending" style="display:none;">Sending…</span>
                </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer2.php'; ?>





