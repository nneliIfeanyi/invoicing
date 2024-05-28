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
                                    Edit | Update product
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
<div class="row">
  <div class="col-lg-7">
      <div class="card card-body bg-light my-5">
        <div class="card-title"><h2 class="m-0">Edit Product</h2></div><p>Change the details of this Product</p><hr>
        
        <form action="<?php echo URLROOT; ?>/submissions/edit_product/<?php echo $data['id']; ?>" method="post">

          <div class="form-group">
              <label class="m-0">inStock:</label>
              <input type="number" name="qty" class="form-control" value="<?php echo $data['qty']; ?>">
          </div>


          <div class="form-group mb-3">
              <label class="m-0">Description:</label>
              <input name="dsc" class="form-control" value="<?php echo $data['dsc']; ?>" placeholder="">
          </div>

          <div class="form-group mb-3">
              <label class="m-0">Unit cost Price:</label>
              <input type="number" name="rate" class="form-control" value="<?php echo $data['rate']; ?>">
          </div>
          
          <button type="submit" class="btn btn-success"><i class="fa fa-paper-plane"></i> Edit Product</button>
          <a onclick="history.back()" class="btn btn-light float-right"><i class="fa fa-backward" aria-hidden="true"></i> Back</a>
        </form>
      </div>
    </div>
  </div>
</div>

<?php require APPROOT . '/views/inc/footer2.php'; ?>