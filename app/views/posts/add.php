<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="row mb-3">
  <div class="col-md-6">
    <?= flash('msg');?>
    <h4 class="text-muted m-0"><?php echo $_SESSION['user_name']; ?>
    </h4>
  </div>
  <div class="col-md-6">
    <p class="text-primary lead">Sales Invoice</p>
  </div>
  <div class="col-md-6">
    <div class="shadow pt-1 ps-1 border-start border-5 border-success rounded-2">
      <h1 class="h6 m-0 text-muted">Usage tips:</h1>
      <p class="text-muted" style="font-size:12px;">
        Note that the system will automatically do the needed calculations.. <br>
        No need to punch your calculator.<br>
        The <span class="fw-bold">Amount</span> and the <span class="fw-bold">Total</span> will be auto-calculated.

      </p>
    </div>
  </div>
</div>
<div class="mb-5">
<form action="<?php echo URLROOT; ?>/posts/add" method="post" id="add_form">
  <div class="row mb-2">
    <div class="col-6">
      <input type="text" name="customer_name" class="form-input" required data-parsley-trigger="keyup" value="" placeholder="Customer name">
    </div>
    <div class="col-6">
      <input type="number" name="customer_phone" class="form-input" required data-parsley-length="[0, 11]" data-parsley-trigger="keyup" value="" placeholder="Customer phone">
    </div>
    <div class="col-6">
      <input type="text" name="customer_address" class="form-input" value="" placeholder="Address">
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
      <th>Amount</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>
        <input min="1" name="qty[]" class="form-input"  required data-parsley-trigger="keyup" data-parsley-pattern="^[0-9.]+$" value="" style="width: 60px;">
      </td>
      <td>
        <input name="dsc[]" class="form-input" required data-parsley-trigger="keyup" type="text" value="" style="width: 55vw;">
      </td>
      <td>
        <input name="rate[]" data-parsley-pattern="^[0-9.]+$" data-parsley-trigger="keyup"  required data-parsley-trigger="keyup" class="form-input" value="" style="width: 22vw;">
      </td>
      <td data-bs-toggle="tooltip" data-bs-title="automatically calculated">
      </td>
    </tr>

    <tr>
      <td>
        <input min="1" name="qty[]" class="form-input" data-parsley-trigger="keyup" data-parsley-pattern="^[0-9.]+$" value="" style="width: 60px;">
      </td>
      <td>
        <input name="dsc[]" class="form-input" data-parsley-trigger="keyup" type="text" value="" style="width: 55vw;">
      </td>
      <td>
        <input name="rate[]" data-parsley-pattern="^[0-9.]+$" data-parsley-trigger="keyup" data-parsley-trigger="keyup" class="form-input" value="" style="width: 22vw;">
      </td>
      <td data-bs-toggle="tooltip" data-bs-title="automatically calculated">
      </td>
    </tr>

    <tr>
      <td>
        <input min="1" name="qty[]" class="form-input" data-parsley-trigger="keyup" data-parsley-pattern="^[0-9.]+$" value="" style="width: 60px;">
      </td>
      <td>
        <input name="dsc[]" class="form-input" data-parsley-trigger="keyup" type="text" value="" style="width: 55vw;">
      </td>
      <td>
        <input name="rate[]" data-parsley-pattern="^[0-9.]+$" data-parsley-trigger="keyup" data-parsley-trigger="keyup" class="form-input" value="" style="width: 22vw;">
      </td>
      <td data-bs-toggle="tooltip" data-bs-title="automatically calculated">
      </td>
    </tr>
   
  </tbody>
</table>
</div>

<label style="font-size: 12px;">(leave this box empty if no amount was paid)</label>
<input type="number" name="paid" class="form-control" value="" placeholder="Cash paid">
<div class="d-grid gap-2">
  <button type="submit" class="btn btn-success mt-3">Save Transactions</button>
  <a href="<?= URLROOT;?>/posts" class="btn"><i class="fa fa-backward"></i> Back</a>
</div>

</form>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>

<script>
  $('#add_form').parsley();
</script>
