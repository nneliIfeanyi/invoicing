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
                                <li class="list-inline-item">Edit Transaction</li>
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
<div class="row">
  <div class="col-md-6">
    <h6 class="text-warning py-2">Click on any field to change the details of this transaction
    </h6>
  </div>
</div>
<div class="mb-7">
<form action="<?php echo URLROOT; ?>/posts/edit2/<?= $data['info']->t_id;?>" method="post" id="add_form">
  <div class="row my-3 shadow-sm">
    <div class="col-6">
      <input type="text" name="customer_name" class="form-input" required data-parsley-trigger="keyup" value="<?php echo $data['info']->name ; ?>" placeholder="Customer name">
    </div>
    <div class="col-6">
      <input type="number" name="customer_phone" class="form-input" required data-parsley-length="[0, 11]" data-parsley-trigger="keyup" value="<?php echo $data['info']->phone ; ?>" placeholder="Customer phone">
    </div>
    <div class="col-6">
      <input type="text" name="customer_address" class="form-input" value="<?php echo $data['info']->address ; ?>" placeholder="Address">
    </div>
    <div class="col-6">
      <input disabled class="form-input" value="<?php echo $data['info']->t_date.' '.$data['info']->t_month ; ?>" placeholder="Address">
    </div>
    <div class="col-12">
      <div class="row py-3">
        <div class="col-6 col-md-3">
          <select class="form-input" name="day">
            <option value="">Change day</option>
            <?php foreach($data['day'] as $date):?>
            <option value="<?php echo $date->days;?>"><?php echo $date->days;?></option>
            <?php endforeach;?>
          </select>
        </div>

        <div class="col-6 col-md-3">
          <select class="form-input" name="date">
            <option value="">Change date</option>
            <?php foreach($data['date'] as $date):?>
            <option value="<?php echo $date->dates;?>"><?php echo $date->dates;?></option>
            <?php endforeach;?>
          </select>
        </div>

        <div class="col-6 col-md-3">
          <select class="form-input" name="month">
            <option value="<?php echo $data['info']->t_month ; ?>">Change month</option>
            <?php foreach($data['month'] as $date):?>
            <option value="<?php echo $date->months;?>"><?php echo $date->months;?></option>
            <?php endforeach;?>
          </select>
        </div>
      </div>
    </div>
  </div>
  <?php if($_SESSION['category'] == 'production' || $_SESSION['category'] == 'trading'):?>
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
            <input type="text" min="0" name="qty[]" class="form-control" value="<?= $post->qty;?>" style="width: 60px;">
          </td>
          <td>
            <input name="dsc[]" class="form-control" type="text" value="<?= $post->dsc;?>" style="width: 55vw;">
          </td>
          <td>
            <input type="text" name="rate[]"  class="form-control" value="<?= $post->rate;?>" style="width: 22vw;">
          </td>
        </tr>
        <input type="hidden" name="post_id[]" value="<?= $post->id;?>">
      <?php endforeach;?>
    </tbody>
    </table>
    </div>
  <?php else:?>
    <div class="table-responsive">
    <table class="table table-striped border w-100">
      <thead>
        <tr class="border text-center text-muted">
          <!-- <th>Qty</th> -->
          <th>Service Description</th>
          <th>Price</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($data['post'] as $post):?>
        <tr>
          <!-- <td>
            <input type="text" min="0" name="qty[]" class="form-control" value="<?= $post->qty;?>" style="width: 60px;">
          </td> -->
           <input type="hidden" name="qty[]" value="1">
          <td>
            <input name="dsc[]" class="form-control" type="text" value="<?= $post->dsc;?>" style="width: 55vw;">
          </td>
          <td>
            <input type="text" name="rate[]"  class="form-control" value="<?= $post->rate;?>" style="width: 22vw;">
          </td>
        </tr>
        <input type="hidden" name="post_id[]" value="<?= $post->id;?>">
      <?php endforeach;?>
    </tbody>
    </table>
    </div>
  <?php endif;?>
<div class="">
  <label>Cash paid: <span style="font-size: 12px;">(leave this box empty if no amount was paid)</span></label>
  <input type="number" name="paid" class="form-control" value="<?= $data['info']->paid;?>">
</div>
<div class="d-flex justify-content-between">
  <button type="submit" class="btn btn-success mt-2">Update Transactions</button>
  <a href="<?= URLROOT;?>/posts" class="btn text-warning"><i class="fa fa-backward"></i> Back</a>
</div>
</form>
</div>
</div>
<?php require APPROOT . '/views/inc/footer2.php'; ?>
