<?php require APPROOT . '/views/inc/header2.php';
      require APPROOT . '/views/inc/sidebar.php'; 
$page = 'posts/index';
 $count = 0;
 $visits = $this->userModel->get_page_visits($page);
 if (empty($visits)) {
   $this->userModel->page_visit_count($page);
 }else{
  $count = $visits->count + 1;
  $this->userModel->updateVisit($page,$count);
//  echo 'page visited '.$count.' times';
 }
$dept = $data['t_total'] - $data['d_total'];
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
                                <li class="list-inline-item">Dashboard</li>
                            </ul>
                        </div>
                        <a href="<?php echo URLROOT;?>/posts/add/1" class="au-btn au-btn-icon au-btn--green">
                            <i class="zmdi zmdi-plus"></i>add transaction</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END BREADCRUMB-->
<section class="statistic">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="statistic__item">
                        <h2 class="number text-warning"><?php echo $_SESSION['user_points'];?>.00</h2>
                        <span class="desc">Available Points</span><br>
                        <a href="<?php echo URLROOT?>/pages/subscribe" class="btn-sm text-muted">Fund Wallet &nbsp; &nbsp;<i class="fas fa-forward"></i> </a>
                        <div class="icon">
                            <i class="zmdi zmdi-money"></i>
                        </div>
                    </div>
                </div>

                 <div class="col-md-6 col-lg-4">
                    <div class="statistic__item">
                        <h2 class="number text-warning">&#8358;<?php echo put_coma($data['month_total']);?></h2>
                        <span class="desc"><?= date('M');?> Sales</span><br>
                        <a href="<?php echo URLROOT?>/posts/sales" class="btn-sm text-muted">View Sales Book &nbsp; &nbsp;<i class="fas fa-forward"></i> </a>
                        <div class="icon">
                            <i class="zmdi zmdi-money"></i>
                        </div>
                        
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="statistic__item">
                            <h2 class="number text-warning">&#8358;<?php echo put_coma($dept);?></h2>
                        <span class="desc">Total credits</span><br>
                        <a href="<?php echo URLROOT?>/posts/creditors" class="btn-sm text-muted">View Credit Book &nbsp; &nbsp;<i class="fas fa-forward"></i> </a>
                        <div class="icon">
                            <i class="zmdi zmdi-money"></i>
                        </div>
                        
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- END STATISTIC-->
<section class="statistic">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
          <h1 class="h3">Recent Transactions</h1>
          <p class="lead mb-2">Today <span class="text-warning">|</span> <?php echo date('D-jS-M-Y'); ?></p>
          <?php if(!empty($data['transactions'])):?>
            <?php foreach($data['transactions'] as $post):
              $customer_info = $this->postModel->getInfo($post->t_id);
            ?>
            <div class="card card-body mb-3">
              <h6 class="text-warning pb-3">
                Customer Details
              </h6>
              <h4 class="card-title text-muted">
                <i class="fa fa-user"></i>&nbsp;<?php echo $customer_info->name; ?>
              </h4>
              <p>
                <i class="fa fa-map-marker"></i>&nbsp;<?= $customer_info->address ?>
              </p>
              <div class="bg-light p-2 mb-3">
                Transaction date: <span class="text-muted font-weight-bold"><?php echo $customer_info->t_date.' '.$customer_info->t_month; ?></span>
                at <?php echo $customer_info->t_time; ?>
              </div>
              <?php 
                $to_balance = $customer_info->t_total - $customer_info->paid;
              ?>
              <p>To balance: <span class="text-warning h6 fw-bold">&#8358;<?php echo put_coma($to_balance); ?>.00</span></p>
        
            <div class="row mt-3"> 
            <?php if($_SESSION['user_phone'] == "08122321931"):?>
              <div class="col-6"> 
                <a href="<?php echo URLROOT; ?>/posts/print_pos/<?= $post->t_id;?>" 
                    class="btn btn-sm btn-dark">
                    Print receipt
                </a>
               </div>
           <?php else:?>
            <div class="col-6"> 
                 <form action="<?php echo URLROOT; ?>/pages/download_reciept/<?= $post->t_id ; ?>" method="POST">
                  <input class="btn btn-sm btn-dark" name="generate-invoice" type="submit" value="Generate receipt">
                 </form>
            </div>
           <?php endif;?>
               <div class="col-6">
                 <a href="<?= URLROOT;?>/posts/preview/<?php echo $post->t_id;?>" class="btn btn-sm btn-success">Preview transaction</a>
              </div>
            </div>
          </div>
          <?php endforeach;?>
            
            <div class="fs-6 fs-italics text-center mb-2">
              <i class="fa fa-spinner fa-spin"> </i> Showing last 4 transactions<br><a href="<?php echo URLROOT?>/posts/sales" class="btn-sm text-muted">View All Transactions &nbsp; &nbsp;<i class="fas fa-forward"></i> </a>
            </div>
          <?php else:?>
            <div class="lead">
              <p>Your transactions will appear here.</p>
            </div>
          <?php endif;?>
    
    </div>
  </div>
</section><hr />
<section class="statistic">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Leave A Feedback</h4>
                </div>
                <div class="card-body">
                    <p>Send us a message</p>
                    <a href="https://wa.me/2349168655298" class="text-warning" target="_blank">
                                <i class="fab fa-whatsapp font-weight-bold"></i> WhatsApp</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require APPROOT . '/views/inc/footer2.php'; ?>

