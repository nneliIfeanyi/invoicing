<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="row">
  <div class="col-md-6">
    <h2 class="text-muted"><?php echo $_SESSION['user_name']; ?><br>
      <span class="fw-bold fs-4">Sales Invoice</span>
    </h2>
  </div>
</div>
<div class="mb-7">
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
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>
        <input type="number" min="1" name="qty[]" class="form-control"  required data-parsley-trigger="keyup" value="" style="width: 60px;">
      </td>
      <td>
        <input name="dsc[]" class="form-control" required data-parsley-trigger="keyup" type="text" value="" style="width: 55vw;">
      </td>
      <td>
        <input type="number" name="rate[]"  required data-parsley-trigger="keyup" class="form-control" value="" style="width: 22vw;">
      </td>
    </tr>

    <tr>
      <td>
        <input type="number" min="1" name="qty[]" class="form-control"  value="" style="width: 60px;">
      </td>
      <td>
        <input name="dsc[]" class="form-control" type="text" value="" style="width: 55vw;">
      </td>
      <td>
        <input type="number" name="rate[]"  class="form-control" value="" style="width: 22vw;">
      </td>
    </tr>

    <tr>
      <td>
        <input type="number" min="1" name="qty[]" class="form-control"  value="" style="width: 60px;">
      </td>
      <td>
        <input name="dsc[]" class="form-control" type="text" value="" style="width: 55vw;">
      </td>
      <td>
        <input type="number" name="rate[]"  class="form-control" value="" style="width: 22vw;">
      </td>
    </tr>

    <tr>
      <td>
        <input type="number" min="1" name="qty[]" class="form-control" style="width: 60px;">
      </td>
      <td>
        <input name="dsc[]" class="form-control" type="text" value="" style="width: 55vw;">
      </td>
      <td>
        <input type="number" name="rate[]" class="form-control" value="" style="width: 22vw;">
      </td>
    </tr>

    <tr>
      <td>
        <input type="number" min="1" name="qty[]" class="form-control" style="width: 60px;">
      </td>
      <td>
        <input name="dsc[]" class="form-control" type="text" value="" style="width: 55vw;">
      </td>
      <td>
        <input type="number" name="rate[]" class="form-control" value="" style="width: 22vw;">
      </td>
    </tr>
      <tr>
        <td>
          <input type="number" min="1" name="qty[]" class="form-control" value="" style="width: 60px;">
        </td>
        <td>
          <input name="dsc[]" class="form-control" type="text" value="" style="width: 55vw;">
        </td>
        <td>
          <input type="number" name="rate[]" class="form-control" value="" style="width: 22vw;">
        </td>
      </tr>

      <tr>
        <td>
          <input type="number" min="1" name="qty[]" class="form-control" value="" style="width: 60px;">
        </td>
        <td>
          <input name="dsc[]" class="form-control" type="text" value="" style="width: 55vw;">
        </td>
        <td>
          <input type="number" name="rate[]"  class="form-control" value="" style="width: 22vw;">
        </td>
      </tr>

      <tr>
        <td>
          <input type="number" min="1" name="qty[]" class="form-control"  value="" style="width: 60px;">
        </td>
        <td>
          <input name="dsc[]" class="form-control" type="text" value="" style="width: 55vw;">
        </td>
        <td>
          <input type="number" name="rate[]"  class="form-control" value="" style="width: 22vw;">
        </td>
      </tr>

      <tr>
        <td>
          <input type="number" min="1" name="qty[]" class="form-control"  value="" style="width: 60px;">
        </td>
        <td>
          <input name="dsc[]" class="form-control" type="text" value="" style="width: 55vw;">
        </td>
        <td>
          <input type="number" name="rate[]"  class="form-control" value="" style="width: 22vw;">
        </td>
      </tr>

      <tr>
        <td>
          <input type="number" min="1" name="qty[]" class="form-control"  value="" style="width: 60px;">
        </td>
        <td>
          <input name="dsc[]" class="form-control" type="text" value="" style="width: 55vw;">
        </td>
        <td>
          <input type="number" name="rate[]"  class="form-control" value="" style="width: 22vw;">
        </td>
      </tr>

      <tr>
        <td>
          <input type="number" min="1" name="qty[]" class="form-control" value="" style="width: 60px;">
        </td>
        <td>
          <input name="dsc[]" class="form-control" type="text" value="" style="width: 55vw;">
        </td>
        <td>
          <input type="number" name="rate[]"  class="form-control" value="" style="width: 22vw;">
        </td>
      </tr>

      <tr>
        <td>
          <input type="number" min value="" style="width: 60px;">
        </td>
        <td>
          <input name="dsc[]" class="form-control" type="text" value="" style="width: 55vw;">
        </td>
        <td>
          <input type="number" name="rate[]" class="form-control" value="" style="width: 22vw;">
        </td>
      </tr>
   
  </tbody>
</table>
</div>

<label>Cash paid: <span style="font-size: 12px;">(leave this box empty if no amount was paid)</span></label>
<input type="number" name="paid" class="form-control" value="">
 
<button type="submit" class="btn btn-success mt-2">Save Transactions</button>

</form>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>

<script>
  $('#add_form').parsley();
</script>
