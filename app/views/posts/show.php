<?php require APPROOT . '/views/inc/header.php'; ?>
<?= flash('msg');?>
<div class="row">
  <div class="col-md-6">
    <h4 class="text-muted">Invoice Preview
    </h4>
  </div>
</div>
<div class="card card-body">
  <div class="row mb-2">
    <h6 class="fw-semibold h4 text-primary">Billed By</h6>
    <div class="col-md-6 shadow-sm p-3">
      <label class="fs-6">Merchant name: &nbsp; &nbsp;
        <span class="border-bottom fw-semibold"><?php echo $_SESSION['user_name']; ?></span><br>
        <span class="text-muted" style="font-size: 14px; font-style: italic;"><?php echo $_SESSION['user_dsc']; ?></span>
      </label>
    </div>
    <div class="col-md-6 shadow-sm p-3">
      <label class="fs-6">Merchant phone: &nbsp; &nbsp;
        <span class="border-bottom fw-semibold"><?php echo $_SESSION['user_phone']; ?></span>
      </label>
    </div>
    <div class="col-md-6 shadow-sm p-3">
      <label class="fs-6">Address: &nbsp; &nbsp;
        <span class=""><?php echo $_SESSION['address']; ?></span>
      </label>
    </div>
    <div class="col-md-6 shadow-sm p-3">
      <label class="fs-6">Transaction ID: &nbsp; &nbsp;
        <span class=""><?php echo $data['t_id']; ?></span>
      </label>
    </div>
  </div>
</div>
<div class="card card-body">
  <div class="row mb-2">
    <h6 class="fw-semibold h4 text-primary">Billed To</h6>
    <div class="col-md-6 shadow-sm p-3">
      <label class="fs-6">Customer name: &nbsp; &nbsp;
        <span class="border-bottom fw-semibold"><?= $data['customer_info']->customer_name;?></span>
      </label>
    </div>
    <div class="col-md-6 shadow-sm p-3">
      <label class="fs-6">Customer phone: &nbsp; &nbsp;
        <span class="border-bottom fw-semibold"><?= $data['customer_info']->customer_phone;?></span>
      </label>
    </div>
    <div class="col-md-6 shadow-sm p-3">
      <label class="fs-6">Customer Address: &nbsp; &nbsp;
        <span class="border-bottom fw-semibold"><?= $data['customer_info']->customer_address;?></span>
      </label>
    </div>
    <div class="col-md-6 shadow-sm p-3">
      <label class="fs-6">Transaction Date: &nbsp; &nbsp;
        <span class="border-bottom fw-semibold"><?= $data['customer_info']->c_date.' '.$data['customer_info']->c_month.' '.$data['customer_info']->c_year ?></span>
      </label>
    </div>
  </div>
</div>
<div class="card">
  <!-- check for business category -->
<?php if($_SESSION['category'] == 'B&S'):?>
<div class="table-responsive mb-2">
  <h6 class="fw-semibold my-3 px-3 h4 text-primary">Items</h6>
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
        <td><?= $post->qty;?></td>
        <td>
          <?php if(empty($post->qty) AND !empty($post->rate)):?>
           <?= $post->dsc;?>
          <?php else:?>
            <?= $post->dsc;?>
          <?php endif;?>
        </td>
        <td><?= $post->rate;?></td>
        <td>
          <?php if(!empty($post->qty) AND !empty($post->rate)):?>
            <?= $total=$post->qty * $post->rate ;?>
          <?php else: $total = '0'.$post->rate;?>
            <?= $post->rate;?>
          <?php endif;?>
        </td>
      </tr>
    <?php $sum += $total; endforeach;?>
    <tr>
      <th></th>
      <th>Total:</th>
      <th></th>
      <th>&#8358;<?php echo put_coma($sum);?></th>
    </tr>
    <?php if(empty($post->paid)):?>
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
        <th>&#8358;<?php echo put_coma($post->paid);?></th>
      </tr>
      <tr>
        <th></th>
        <th>Balance</th>
        <th></th>
        <th>&#8358;<?php echo put_coma($sum - $post->paid);?></th>
      </tr>
    <?php endif;?>
    </tbody>
  </table>
</div>

<!-- Business category == services -->
<?php else:?>
  <div class="table-responsive mb-2">
  <h6 class="fw-semibold my-3 px-3 h4 text-primary">Service Rendered</h6>
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
        <td><?= $post->rate;?></td>
      </tr>
      <?php $total=(int)$post->rate ;?>
    <?php $sum += $total; endforeach;?>
    <tr>
      <th>Total:</th>
      <th>&#8358;<?php echo put_coma($sum);?></th>
    </tr>
    <?php if(empty($post->paid)):?>
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
        <th>&#8358;<?php echo put_coma($post->paid);?></th>
      </tr>
      <tr>
        <th>Balance</th>
        <th>&#8358;<?php echo put_coma($sum - $post->paid);?></th>
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

  <form action="<?php echo URLROOT; ?>/pages/download_invoice/<?= $data['customer_info']->t_id ; ?>" method="POST">
    <button id="link1" type="submit" class="btn btn-outline-success"><i class="fa fa-download"></i> Download Reciept</button>
  </form>

  
  <form action="<?php echo URLROOT; ?>/pages/share/<?= $data['customer_info']->t_id ; ?>" method="POST">
    <button id="link1" type="submit" class="btn btn-outline-success"><i class="fab fa-whatsapp"></i> Share</button>
  </form>
  
</div><hr/>
<div class="d-flex justify-content-between my-4">
  <a href="<?= URLROOT;?>/posts/Edit/<?php echo $data['customer_info']->t_id; ?>" class="btn">
    <i class="fa fa-pencil"></i> Edit
  </a>
 
  <button class="btn"  onclick="history.back()">
    <i class="fa fa-backward"></i> Go Back
  </button>
</div>

<div class="border border-5 rounded-2 border-danger text-center py-3">
  <h6 class=" m-0 fw-semibold">
    Danger Zone
  </h6>
  <p class="lead">This action can not be reversed.</p>
  <button 
    data-bs-toggle="modal" data-bs-target="#deleteModal<?= $data['t_id'];?>" 
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
          <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i> Cancel</button>
          <form action="<?php echo URLROOT; ?>/posts/delete/<?php echo $data['t_id'];?>" method="post">
            <button type="submit" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash" aria-hidden="true"></i> Yes, Continue</button>
          </form>
        </div>
      </div>
    </div>
  </div>
<div style="position: fixed;bottom: 1vh;right: 1vw;">
  <p data-bs-toggle="tooltip" data-bs-title="Add Transaction">
    <a href="<?php echo URLROOT;?>/posts/add/1" style="font-size: 22px;">
      <i class="fa fa-plus-circle fa-3x text-primary"></i>
    </a>
  </p>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
<script type="text/javascript">
   $(document).ready(function(){
    $('#link1').click(function(){
      $('#loader').fadeIn();
    });
  });
</script>
