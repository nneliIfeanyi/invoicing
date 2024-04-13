<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="row">
  <div class="col-md-6">
    <?= flash('msg');?>
    <h2 class="text-muted">Invoice Preview
    </h2>
  </div>
</div>
<div class="row mb-2">
  <div class="col-md-6">
    <label class="fs-6">Customer name: 
      <span class="border-bottom fw-semibold"><?= $data['customer_info']->customer_name;?></span>
    </label>
  </div>
  <div class="col-md-6">
    <label class="fs-6">Customer phone: 
      <span class="border-bottom fw-semibold"><?= $data['customer_info']->customer_phone;?></span>
    </label>
  </div>
  <div class="col-md-6">
    <label class="fs-6">Address: 
      <span class="border-bottom fw-semibold"><?= $data['customer_info']->customer_address;?></span>
    </label>
  </div>
  <div class="col-md-6">
    <label class="fs-6">Date: 
      <span class="border-bottom fw-semibold"><?= $data['customer_info']->c_date.' '.$data['customer_info']->c_month.' '.$data['customer_info']->c_year ?></span>
    </label>
  </div>
</div>

<div class="table-responsive mb-2">
  <table class="table table-striped border">
    <thead class="bg-primary">
      <th>Qty</th>
      <th>Description</th>
      <th>Rate</th>
      <th>Amount</th>
    </thead>
    <tbody>
      <?php $sum = 0; foreach($data['post'] as $post):?>
      <tr>
        <td><?= $post->qty;?></td>
        <td><?= $post->dsc;?></td>
        <td><?= $post->rate;?></td>
        <td><?= $total = $post->qty * $post->rate ;?></td>
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
        <th>Nill</th>
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

<div class="d-grid gap-2 mb-5">  
  <form action="<?php echo URLROOT; ?>/pages/invoice" method="POST">
    <input type="hidden" name="t_id" value="<?php echo $data['customer_info']->t_id ; ?>">
    <input class="btn btn-primary" name="generate-invoice" type="submit" value="Generate invoice">
  </form>
  <a href="<?= URLROOT;?>/posts/Edit/<?php echo $data['customer_info']->t_id; ?>" class="btn btn-success"><i class="fa fa-pencil"></i> Edit transaction</a>
  <a href="<?= URLROOT;?>/posts" class="btn"><i class="fa fa-backward"></i> Back</a>
</div>
