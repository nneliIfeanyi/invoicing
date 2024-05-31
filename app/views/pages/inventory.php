<?php require APPROOT . '/views/inc/header2.php';
      require APPROOT . '/views/inc/sidebar.php'; 
// $page = 'posts/index';
//  $count = 0;
//  $visits = $this->userModel->get_page_visits($page);
//  if (empty($visits)) {
//    $this->userModel->page_visit_count($page);
//  }else{
//   $count = $visits->count + 1;
//   $this->userModel->updateVisit($page,$count);
// //  echo 'page visited '.$count.' times';
//  }

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
                                    <a href="<?php echo URLROOT?>/posts">Home</a>
                                </li>
                                <li class="list-inline-item seprate">
                                    <span>/</span>
                                </li>
                                <li class="list-inline-item">Inventory</li>
                            </ul>
                        </div>
                        <?php if($_SESSION['inventory'] == 'false'):?>
                            <form action="<?php echo URLROOT;?>/submissions/activate" method="post">
                                <button type="submit" class="au-btn au-btn-icon au-btn--green">Activate Inventory</button>
                            </form>
                        <?php else:?>
                            <a href="<?php echo URLROOT;?>/inventory/today" class="au-btn au-btn-icon au-btn--green">
                                <i class="zmdi zmdi-eye"></i>View Sales</a>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END BREADCRUMB-->
<div class="container-fluid">
<div class="row py-2">
<div class="col-lg-10">
    <div class="card">
        <img src="<?php echo URLROOT;?>/logo/bg.png" class="card-img-top" style="width: 100%;height: 300px;">
        <div class="card-header"><?php echo $_SESSION['user_name']?> Inventory</div>
        <div class="card-body">
            <div class="card-title">
                <h3 class="title-2">Take control of your business inventory managment</h3>
            </div>
            <hr>
            <?php if($_SESSION['inventory'] == 'false'):?>
                <form action="<?php echo URLROOT;?>/submissions/activate" method="post">
                    <button type="submit" class="au-btn au-btn-icon au-btn--green">Activate Inventory</button>
                </form>
            <?php else:?>
                <a href="<?php echo URLROOT;?>/inventory/today" class="au-btn au-btn-icon au-btn--green">
                    <i class="zmdi zmdi-eye"></i>View Sales</a>
            <?php endif;?>
        </div>
    </div>
</div>
</div>
</div>
<!-- END STATISTIC-->

<?php require APPROOT . '/views/inc/footer2.php'; ?>



















