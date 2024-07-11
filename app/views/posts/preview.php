<?php require APPROOT . '/views/inc/header2.php';
      require APPROOT . '/views/inc/sidebar.php';
      flash('msg');?>
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
                                <li class="list-inline-item">Preview Transaction</li>
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
<div class="container-fluid">
  <div class="card card-body">
    <h6 class="text-warning card-title">Billed By</h6>
    <div class="row">
      <div class="col-md-6">
        <label class="fs-6">
          <span class="font-weight-bold"><?php echo $_SESSION['user_name']; ?></span><br>
          <span class="text-muted" style="font-size: 14px;"><?php echo $_SESSION['user_dsc']; ?></span><br>
          <span class=""><i class="fa fa-phone"></i>&nbsp; &nbsp;<?php echo $_SESSION['user_phone']; ?></span><br>
          <span class=""><i class="fa fa-map-marker"></i>&nbsp; &nbsp;<?php echo $_SESSION['address']; ?></span>
        </label>
      </div>
    </div>
<hr>
    <h6 class="card-title text-warning mt-2">Billed To</h6>
    <div class="row">
      <div class="col-md-6 shadow-sm p-2">
        <label class="fs-6">Customer name: &nbsp;
          <span class="border-bottom fw-semibold"><?= $data['customer_info']->name;?></span>
        </label>
      </div>
      <div class="col-md-6 shadow-sm p-2">
        <label class="fs-6">Customer phone: &nbsp;
          <span class="border-bottom fw-semibold"><?= $data['customer_info']->phone;?></span>
        </label>
      </div>
      <div class="col-md-6 shadow-sm p-2">
        <label class="fs-6">Address: &nbsp;
          <span class="border-bottom fw-semibold"><?= $data['customer_info']->address;?></span>
        </label>
      </div>
      <div class="col-md-6 shadow-sm p-2">
        <label class="fs-6">Transaction Date: &nbsp;
          <span class="border-bottom fw-semibold"><?= $data['customer_info']->t_date.' '.$data['customer_info']->t_month.' '.$data['customer_info']->t_year ?></span>
        </label>
      </div>
      <div class="col-md-6 p-1">
        <label class="fs-6">Transaction ID: &nbsp;
          <span class=""><?php echo $data['t_id']; ?></span>
        </label>
      </div>
    </div>
</div>
<div class="card">
  <!-- check for business category -->
<?php if($_SESSION['category'] == 'trading' || $_SESSION['category'] == 'production'):?>
<div class="table-responsive mb-2">
  <h6 class="my-3 px-3 text-warning">Items</h6>
  <table class="table table-striped border">
    <thead class="text-bg-dark">
      <th>Qty</th>
      <th>Description</th>
      <th>Rate</th>
      <th>Amount</th>
    </thead>
    <tbody>
      <?php $sum = 0; foreach($data['post'] as $post):
      ;?>
      <tr>
        <td>
          <?php if($post->qty != 0):?>
            <?= $post->qty;?>
          <?php endif;?>
        </td>
        <td>
           <?= $post->dsc;?>
        </td>
        <td>
           <?php if($post->rate != 0):?>
            <?= $post->rate;?>
          <?php endif;?>
        </td>
        <td>
          <?php if(!empty($post->qty) && !empty($post->rate)):?>
            <?= $post->amount = $post->qty * $post->rate;?>
          <?php endif;?>
        </td>
      </tr>
    <?php $sum += $post->amount; endforeach;?>
    <tr>
      <th></th>
      <th>Total:</th>
      <th></th>
      <th>&#8358;<?php echo put_coma($sum);?></th>
    </tr>
    <?php if(empty($data['customer_info']->paid)):?>
      <tr>
        <th></th>
        <th>Paid:</th>
        <th></th>
        <th>&#8358;0.00</th>
      </tr>
      <tr>
        <th></th>
        <th>Balance:</th>
        <th></th>
        <th class="text-danger">&#8358;<?php echo put_coma($sum);?></th>
      </tr>
    <?php else:?>
      <tr>
        <th></th>
        <th>Paid</th>
        <th></th>
        <th>&#8358;<?php echo put_coma($data['customer_info']->paid);?></th>
      </tr>
      <tr>
        <th></th>
        <th>Balance</th>
        <th></th>
        <th>&#8358;<?php echo put_coma($sum - $data['customer_info']->paid);?></th>
      </tr>
    <?php endif;?>
    </tbody>
  </table>
</div>

<!-- Business category == services -->
<?php else:?>
<div class="table-responsive mb-2">
  <h6 class="my-3 px-3 text-warning">Service Rendered</h6>
  <table class="table table-striped border">
    <thead class="text-bg-dark">
      <th>Description</th>
      <th>Price</th>
    </thead>
    <tbody>
      <?php $sum = 0; foreach($data['post'] as $post):
      ;?>
      <tr>
        <td> <?= $post->dsc;?></td>
        <td>
           <?php if($post->rate != 0):?>
            <?= $post->rate;?>
          <?php endif;?>
        </td>
      </tr>
      <?php $total=(int)$post->rate ;?>
    <?php $sum += $total; endforeach;?>
    <tr>
      <th>Total:</th>
      <th>&#8358;<?php echo put_coma($sum);?></th>
    </tr>
    <?php if(empty($data['customer_info']->paid)):?>
      <tr>
        <th>Paid:</th>
        <th>&#8358;0.00</th>
      </tr>
      <tr>
        <th>Balance:</th>
        <th class="text-danger">&#8358;<?php echo put_coma($sum);?></th>
      </tr>
    <?php else:?>
      <tr>
        <th>Paid</th>
        <th>&#8358;<?php echo put_coma($data['customer_info']->paid);?></th>
      </tr>
      <tr>
        <th>Balance</th>
        <th>&#8358;<?php echo put_coma($sum - $data['customer_info']->paid);?></th>
      </tr>
    <?php endif;?>
    </tbody>
  </table>
</div>
<?php endif;?>
</div>

<div class="d-flex justify-content-around my-4">  
  <!-- <form action="<?php echo URLROOT; ?>/pages/invoice" method="POST">
    <input type="hidden" name="t_id" value="<?php echo $data['customer_info']->t_id ; ?>">
    <input class="btn btn-outline-success" name="generate-invoice" type="submit" value="Download">
  </form> -->

  <form action="<?php echo URLROOT; ?>/pages/download_reciept/<?= $data['customer_info']->t_id ; ?>" method="POST">
    <button id="link1" type="submit" class="btn btn-outline-dark"><i class="fa fa-download"></i> Download Reciept</button>
  </form>

  
  <form action="<?php echo URLROOT; ?>/pages/share_reciept/<?= $data['customer_info']->t_id ; ?>" method="POST">
    <button id="link1" type="submit" class="btn btn-success"><i class="fab fa-whatsapp"></i> Share</button>
  </form>
  
</div><hr/>
<div class="d-flex justify-content-between my-4">
  <a href="<?= URLROOT;?>/posts/edit2/<?php echo $data['customer_info']->t_id; ?>" class="btn text-warning">
    <i class="zmdi zmdi-edit"></i> Edit
  </a>
 
  <button class="btn"  onclick="history.go(-1)">
    <i class="fa fa-backward"></i> Go Back
  </button>
</div>
</div>
<div class="border shadow border-danger text-center py-3">
  <h6 class=" m-0 fw-semibold">
    Danger Zone
  </h6>
  <p class="lead">This action can not be reversed.</p>
  <button 
    data-toggle="modal" data-target="#deleteModal<?= $data['t_id'];?>" 
    class="btn btn-sm btn-outline-danger">
    <i class="fa fa-trash"></i> Delete transaction
  </button>
</div>
 <!--Delete post Modal -->
  <div class="modal fade" id="deleteModal<?= $data['t_id'];?>">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body">
          This Action cannot be reveresed..
          <p class="lead">Do you wish to Continue?</p>
        </div>
        <div class="modal-footer d-flex justify-content-between">
          <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Cancel</button>
          <form action="<?php echo URLROOT; ?>/posts/delete2/<?php echo $data['t_id'];?>" method="post">
            <button type="submit" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash" aria-hidden="true"></i> Yes, Continue</button>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php require APPROOT . '/views/inc/footer2.php'; ?>
<script type="text/javascript">
   $(document).ready(function(){
    $('#link1').click(function(){
      $('#loader').fadeIn();
    });
  });
</script>
