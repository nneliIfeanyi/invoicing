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
                                    <a href="<?php echo URLROOT?>/posts">Home</a>
                                </li>
                                <li class="list-inline-item seprate">
                                    <span>/</span>
                                </li>
                                <li class="list-inline-item">Search Results</li>
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
<div class="container-fluid">
      <section class="statistic">
          <div class="section__content section__content--p30">
              <div class="container-fluid">
                <h1 class="h3">Search results for "<?= $data['search_input'];?>"</h1>
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
                    <p>To balance: <span class="text-warning h6 fw-bold">&#8358;<?php echo $to_balance; ?>.00</span></p>
              
                  <div class="row mt-3"> 
                  <?php if($_SESSION['user_phone'] == "08122321932"):?>
                    <div class="col-6"> 
                       <form action="<?php echo URLROOT; ?>/pages/invoice/<?= $post->t_id ; ?>" method="POST">
                        <input class="btn btn-sm btn-dark" name="generate-invoice" type="submit" value="Print receipt">
                       </form>
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
                    <i class="fa fa-spinner fa-spin"> </i> No more transactions...
                  </div>
                <?php else:?>
                  <div class="lead">
                    <p>No records found.</p>
                  </div>
                <?php endif;?>
          
          </div>
        </div>
      </section>
</div>
<?php require APPROOT . '/views/inc/footer2.php'; ?>
