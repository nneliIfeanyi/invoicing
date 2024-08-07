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
  
<h4 class="text-muted text-center p-3">Invoice Online<br>
<span class="lead">Powered by <a href="<?php echo URLROOT;?>/pages">Stanvic Concepts</a></span>
</h4>
<div class="card card-body">
  <div class="row mb-2">
    <h6 class="fw-semibold h4 text-primary">Billed By</h6>
    <div class="col-md-6 shadow-sm ">
        <label class="fs-6">
          <span class="fw-bold"><?php echo $data['user']->bizname; ?></span><br>
          <span class="text-muted" style="font-size: 14px;"><?php echo $data['user']->biz_dsc; ?></span><br>
          <span class=""><i class="fa fa-phone"></i>&nbsp; &nbsp;<?php echo $data['user']->bizphone; ?></span><br>
          <span class=""><i class="fa fa-map-marker"></i>&nbsp; &nbsp;<?php echo $data['user']->bizaddress; ?></span>
        </label>
      </div>
  </div>
</div>
<div class="card card-body">
  <div class="row mb-2">
    <h6 class="fw-semibold h4 text-primary">Billed To</h6>
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
      <label class="fs-6">Customer Address: &nbsp;
        <span class="border-bottom fw-semibold"><?= $data['customer_info']->address;?></span>
      </label>
    </div>
    <div class="col-md-6 shadow-sm p-2">
      <label class="fs-6">Transaction Date: &nbsp;
        <span class="border-bottom fw-semibold"><?= $data['customer_info']->t_date.' '.$data['customer_info']->t_month.' '.$data['customer_info']->t_year ?></span>
      </label>
    </div>
    <div class="col-md-6 shadow-sm p-1">
        <label class="fs-6">Transaction ID: &nbsp;
          <span class=""><?php echo $data['t_id']; ?></span>
        </label>
      </div>
  </div>
</div>
<div class="card">
<div class="table-responsive mb-2">
<?php if($data['user']->category == 'trading' || $data['user']->category == 'production'):?>
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
</div>

<div class="d-flex justify-content-around my-4">  
  <a href="<?=URLROOT.'/'.'pages'.'/'.'download_reciept'.'/'.$data['t_id'];?>" class="btn btn-success">
    <i class="fa fa-download"></i> Download
  </a>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
