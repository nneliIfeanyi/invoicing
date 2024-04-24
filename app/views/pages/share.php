<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/font-awesome.css" />
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/bootstrap.css" />
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/styles.css" />

  <link rel="apple-touch-icon" sizes="180x180" href="<?= URLROOT;?>/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?= URLROOT;?>/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?= URLROOT;?>/favicon-16x16.png">
  <link rel="manifest" href="<?= URLROOT;?>/site.webmanifest">
  <title>Invoice Online</title>
</head>
<body style="position: relative;">
<div class="container">
  
<h4 class="text-muted text-center p-3">Invoice Preview<br>
<span class="lead">Powered by <a href="<?php echo URLROOT;?>/pages">Stanvic Concepts</a></span>
</h4>
<div class="card card-body">
  <div class="row mb-2">
    <h6 class="fw-semibold h4 text-primary">Billed From</h6>
    <div class="col-md-6 shadow-sm p-3">
      <label class="fs-6">Merchant name: &nbsp; &nbsp;
        <span class="border-bottom fw-semibold"><?= $data['user']->bizname;?></span>
      </label>
    </div>
    <div class="col-md-6 shadow-sm p-3">
      <label class="fs-6">Merchant phone: &nbsp; &nbsp;
        <span class="border-bottom fw-semibold"><?= $data['user']->bizphone;?></span>
      </label>
    </div>
    <div class="col-md-6 shadow-sm p-3">
      <label class="fs-6">Address: &nbsp; &nbsp;
        <span class="border-bottom fw-semibold"><?= $data['user']->bizaddress;?></span>
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
  <h6 class="fw-semibold my-3 px-3 h4">Items</h6>
  <table class="table table-striped border">
    <thead class="bg-primary">
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
        <th class="text-danger">-&#8358;<?php echo put_coma($sum);?></th>
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
  <a href="<?=URLROOT.'/'.'pages'.'/'.'download_invoice'.'/'.$data['customer_info']->t_id;?>" class="btn btn-success">
    <i class="fa fa-download"></i> Download
  </a>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
