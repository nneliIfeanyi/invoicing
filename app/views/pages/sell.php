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
                                    <a href="<?php echo URLROOT?>/admin">Home</a>
                                </li>
                                <li class="list-inline-item seprate">
                                    <span>/</span>
                                </li>
                                <li class="list-inline-item">
                                    Sell Points
                                </li>
                            </ul>
                        </div>
                        <?php if($_SESSION['user_type'] != 'marketer'):?>
                            <form action="<?php echo URLROOT;?>/submissions/agenting" method="post">
                                <button type="submit" class="au-btn au-btn-icon au-btn--green">Activate Referal</button>
                            </form>
                        <?php else:?>
                            <a href="<?php echo URLROOT;?>/users/referal/<?php echo $_SESSION['ref_id'];?>" class="au-btn au-btn-icon au-btn--green">
                                <i class="zmdi zmdi-eye"></i>View Referals</a>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END BREADCRUMB-->

<!-- MAIN CONTENT-->
  <!-- <div class="container-fluid">
        <div class="card">
           <form action="<?php echo URLROOT?>/pages/sellp" method="post" class="">
            <div class="card-header">
                Your Points Balance: <span class="text-warning">P</span><?= $_SESSION['user_points']?>
            </div>
            <div class="card-body card-block">
                <div class="form-group">
                    <label for="nf-email" class=" form-control-label">Email</label>
                    <input type="email" id="nf-email" name="email" placeholder="Enter Email.." class="form-control">
                    <span class="help-block">Please enter buyer's email</span>
                </div>
                <div class="form-group">
                    <label for="nf-password" class=" form-control-label">Amount</label>
                    <input type="number" id="nf-password" name="amount" placeholder="Enter amount.." class="form-control">
                    <span class="help-block">Please enter the amount to sell</span>
                </div>
                
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success">
                    <i class="fa fa-dot-circle-o"></i> Submit
                </button>
                <button type="reset" class="btn btn-danger btn-sm">
                    <i class="fa fa-ban"></i> Reset
                </button>
            </div>
            </form>
          </div>
  </div> -->

  <div class="container-fluid">
     <h3 class="py-3">Exchange Points For Money</h3>
     <div class="row">
        <div class="col-md-9">
             <img src="<?php echo URLROOT;?>/logo/soon.jpg" class="card-img-top" style="width: 100%;height: 300px;">
              <div class="alert alert-warning" role="alert">
                Coming soon.. keep your heads up..
            </div>
        </div>
    </div>
  </div>
<?php require APPROOT . '/views/inc/footer2.php'; ?>

