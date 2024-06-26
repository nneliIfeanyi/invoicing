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
                        <h2 class="number text-warning">&#8358;<?php echo put_coma($data['t_total']);?></h2>
                        <span class="desc">Total transactions</span>
                        <div class="icon">
                            <i class="zmdi zmdi-money"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="statistic__item">
                            <h2 class="number text-warning">&#8358;<?php echo put_coma($dept);?></h2>
                        <span class="desc">Total credits</span>
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
            <?php if($_SESSION['user_phone'] == "08122321931"):?>
              <div class="col-6"> 
                <a href="my.bluetoothprint.scheme://<?php echo URLROOT; ?>/posts/print_pos/<?= $post->t_id ; ?>" 
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
              <i class="fa fa-spinner fa-spin"> </i> No more transactions...
            </div>
          <?php else:?>
            <div class="lead">
              <p>Your transactions will appear here.</p>
            </div>
          <?php endif;?>
    
    </div>
  </div>
</section>
        
    
<!-- <div style="position: fixed;bottom: 1vh;right: 1vw;">
  <p data-bs-toggle="tooltip" data-bs-title="Add Transaction">
    <a href="<?php echo URLROOT;?>/posts/add/1" style="font-size: 22px;">
      <i class="fa fa-plus-circle fa-3x" style="color: #fe6b2a;"></i>
    </a>
  </p>
</div> -->

<?php if($visits->count <= 10):?>
<script>

    setTimeout(displayMessage, 2100);

    function displayMessage() {
    const body = document.body;
    const url = "<?php echo URLROOT;?>/pages/about#points";
    const panel = document.createElement('div');
    panel.setAttribute('class','flash-msg1 card card-body');
    body.appendChild(panel);

    const msg = document.createElement('h3');
    msg.textContent = 'Introducing The Use Of Points';
    panel.appendChild(msg);
    msg.setAttribute('class','font-weight-bold  border-bottom border-warning');

    const msg1 = document.createElement('p');
    msg1.textContent = 'See how it works..';
    panel.appendChild(msg1);
    msg1.setAttribute('class','lead py-4');

    const div = document.createElement('div');
    div.setAttribute('class','d-flex justify-content-between');
    panel.appendChild(div);

    const closeBtn = document.createElement('button');
    closeBtn.textContent = 'Ignore';
    closeBtn.setAttribute('class','  mt-3 btn btn-outline-primary btn-sm');
    div.appendChild(closeBtn);

    const btn = document.createElement('button');
    btn.textContent = 'Learn more';
    btn.setAttribute('class',' mt-3 btn btn-success btn-sm');
    div.appendChild(btn);

    closeBtn.addEventListener('click', () => panel.parentNode.removeChild(panel));
    btn.addEventListener('click', () => window.location.href = url);

} 
</script>
<?php endif;?>
<?php require APPROOT . '/views/inc/footer2.php'; ?>
<script type="text/javascript">
    $('#search_form').parsley();
    $('#loader').fadeIn();
</script>
