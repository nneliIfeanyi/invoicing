<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="row">
  <div class="col-md-6">
    <h6 class="text-muted text-primary">Click on any field to change the details of this transaction
    </h6>
    <p class="fs-6 fs-italics text-muted">Note that you cannot edit transaction date.</p>
  </div>
</div>
<div class="mb-7">
<form action="<?php echo URLROOT; ?>/posts/edit/<?= $data['info']->t_id;?>" method="post" id="add_form">
  <div class="row mb-2">
    <div class="col-6">
      <input type="text" name="customer_name" class="form-input" required data-parsley-trigger="keyup" value="<?php echo $data['info']->customer_name ; ?>" placeholder="Customer name">
    </div>
    <div class="col-6">
      <input type="number" name="customer_phone" class="form-input" required data-parsley-length="[0, 11]" data-parsley-trigger="keyup" value="<?php echo $data['info']->customer_phone ; ?>" placeholder="Customer phone">
    </div>
    <div class="col-6">
      <input type="text" name="customer_address" class="form-input" value="<?php echo $data['info']->customer_address ; ?>" placeholder="Address">
    </div>
    <div class="col-6">
      <input disabled class="form-input" value="<?= date('D').' '. date('jS').' '.date('M').' '.date('Y');?>">
    </div>
  </div>
<div class="table-responsive">
<table class="table table-striped border w-100">
  <thead>
    <tr class="border text-center text-muted">
      <th>Qty</th>
      <th>Description of Goods</th>
      <th>Rate</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($data['post'] as $post):?>
    <tr>
      <td>
        <input type="number" min="1" name="qty[]" class="form-control" value="<?= $post->qty;?>" style="width: 60px;">
      </td>
      <td>
        <input name="dsc[]" class="form-control" type="text" value="<?= $post->dsc;?>" style="width: 55vw;">
      </td>
      <td>
        <input type="number" name="rate[]"  class="form-control" value="<?= $post->rate;?>" style="width: 22vw;">
      </td>
    </tr>
    <input type="hidden" name="post_id[]" value="<?= $post->id;?>">
  <?php endforeach;?>
</tbody>
</table>
</div>
<div class="">
  <label>Cash paid: <span style="font-size: 12px;">(leave this box empty if no amount was paid)</span></label>
  <input type="number" name="paid" class="form-control" value="<?= $data['info']->paid;?>">
</div>
<div class="d-grid gap-2">
  <button type="submit" class="btn btn-success mt-2">Update Transactions</button>
  <a href="<?= URLROOT;?>/posts/show/<?= $data['info']->t_id;?>" class="btn"><i class="fa fa-backward"></i> Back</a>
</div>
</form>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
