<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="row">
  <div class="col-md-6">
    <?= flash('msg');?>
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
    <div class="col-md-6 offset-md-3 text-center shadow-sm p-3">
      <label class="fs-6">Address: &nbsp; &nbsp;
        <span class=""><?php echo $_SESSION['address']; ?></span>
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
</div>

<div class="d-flex justify-content-around my-4">  
  <!-- <form action="<?php echo URLROOT; ?>/pages/invoice" method="POST">
    <input type="hidden" name="t_id" value="<?php echo $data['customer_info']->t_id ; ?>">
    <input class="btn btn-outline-success" name="generate-invoice" type="submit" value="Download">
  </form> -->
  <a href="<?=URLROOT.'/'.'pages'.'/'.'download_invoice'.'/'.$data['customer_info']->t_id;?>" class="btn btn-outline-dark">
    <i class="fa fa-download"></i> Download
  </a>
  
  <?php 
    $phone = ltrim($data['customer_info']->customer_phone, '\0');
  ?>
  <a href="https://wa.me/234<?= $phone ;?>?text=invoice%20link%20<?=URLROOT.'/'.'pages'.'/'.'share'.'/'.$data['customer_info']->t_id;?>" class="btn btn-success">
    <i class="fab fa-whatsapp"></i> Share
  </a>
</div><hr/>
<div class="d-flex justify-content-between my-4">
  <a href="<?= URLROOT;?>/posts/Edit/<?php echo $data['customer_info']->t_id; ?>" class="btn">
    <i class="fa fa-pencil"></i> Edit
  </a>
  <button class="btn"  onclick="history.back()">
    <i class="fa fa-backward"></i> Go Back
  </button>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
