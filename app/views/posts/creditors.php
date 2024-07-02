<?php require APPROOT . '/views/inc/header2.php';
      require APPROOT . '/views/inc/sidebar.php'; 
if (strlen($data['num']) == 1) {
    $data['num'] = '0'.$data['num'];
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
                                <li class="list-inline-item">Creditors</li>
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
                            <h2 class="number text-warning">&#8358;<?php echo put_coma($dept);?></h2>
                        <span class="desc">Total credits</span>
                        <div class="icon">
                            <i class="zmdi zmdi-money"></i>
                        </div>
                        
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="statistic__item">
                            <h2 class="number text-warning"><?php echo $data['num'];?></h2>
                        <span class="desc">customers</span>
                        <div class="icon">
                            <i class="fa fa-user"></i>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END STATISTIC-->
<div class="container-fluid">
  <h1 class="h3 mx-2">All Creditors</h1>
  
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
        <div class="col-6"> 
             <button class="btn btn-outline-secondary" data-toggle="modal" data-target="#remind<?= $post->t_id;?>">
                 <i class="fa fa-bell"></i> Reminder
             </button>
        </div>
       <div class="col-6">
         <a href="<?= URLROOT;?>/posts/preview/<?php echo $post->t_id;?>" class="btn btn-sm btn-success">
            <i class="fa fa-eye"></i> Preview transaction</a>
      </div>   
    </div>
  </div>

  <!--Reminder  Modal -->
  <div class="modal fade" id="remind<?= $post->t_id;?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-warning" id="mediumModalLabel">How Would You Like To Send Reminder</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="border-bottom py-2"><a href="<?php echo URLROOT;?>/posts/remind/whatsapp?t_id=<?= $post->t_id;?>" class="text-muted "><i class="fab fa-whatsapp"></i> &nbsp;Send whatsapp message</a></p>
                <p class="border-bottom py-2"><a href="<?php echo URLROOT;?>/posts/remind/sms?t_id=<?= $post->t_id;?>" class="text-muted "><i class="fa fa-comment"></i>&nbsp; Send sms</a></p>
                <p class="pt-2"><a href="tel:<?php echo $customer_info->phone; ?>" class="text-muted "><i class="fa fa-phone"></i> &nbsp;Put a call across</a></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
  <?php endforeach;?>
    
    <div class="fs-6 fs-italics text-center mb-2">
      <i class="fa fa-spinner fa-spin"> </i> No more creditors...
    </div>
  <?php else:?>
    <div class="lead">
      <p>Your creditors will appear here.</p>
    </div>
  <?php endif;?>

</div>

<?php require APPROOT . '/views/inc/footer2.php'; ?>

