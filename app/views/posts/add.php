<?php require APPROOT . '/views/inc/header.php'; ?>
  <div class="row mb-5">
    <div class="col-md-6 py-2 rounded-2">
      <?= flash('msg');?>
      <h2 class="m-0">
        <?php echo $_SESSION['user_name']; ?><br>
        <span class="fs-6 text-muted"><?php echo $_SESSION['user_dsc']; ?></span><br>
      </h2>
      <p class="fs-6 text-muted"><?php echo $_SESSION['address']; ?></p>
    </div>
    <div class="col-md-6 border shadow-sm py-2 rounded-2">
      <p class="text-primary lead">Cash|Credit Sales Invoice</p>
      <label class="fs-6">Hotline: &nbsp; &nbsp;
          <span class="border-bottom fw-semibold"><?php echo $_SESSION['user_phone']; ?></span>
      </label>
    </div>
    
  </div>
  <div id="msg"></div>
  <div class="mb-5">
<?php if($data['entry_rows'] == 3):?>
  <form action="" method="post" id="add_form">
    <div class="row mb-2" style="font-size: 14px;">
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
    <div class="card">
      <div class="table-responsive">
      <table class="table table-striped border w-100">
        <thead>
          <tr class="border text-center text-muted">
            <th>Qty</th>
            <th>Description</th>
            <th>Rate</th>
            <th>Amount</th>
          </tr>
        </thead>
        <tbody>
          <?php for ($i=1; $i < 4; $i++) { 
            ?>
            <tr>
              <td>
                <input min="0" name="qty[]" class="form-input" data-parsley-trigger="keyup" data-parsley-pattern="^[0-9.]+$" value="" style="width: 60px;">
              </td>
              <td>
                <input name="dsc[]" class="form-input" data-parsley-trigger="keyup" type="text" value="" style="width: 55vw;">
              </td>
              <td>
                <input name="rate[]" min="0" data-parsley-pattern="^[0-9.]+$" data-parsley-trigger="keyup" class="form-input" value="" style="width: 22vw;">
              </td>
              <td data-bs-toggle="tooltip" data-bs-title="automatically calculated">
              </td>
            </tr>
            <?php
          }?>
        </tbody>
      </table>
      </div>
    </div>
    <label style="font-size: 12px;">(leave this box empty if no amount was paid)</label>
    <input type="number" name="paid" class="form-control" value="" placeholder="Cash paid">
    <div class="d-grid gap-2">
      <input type="submit" id="submit" class="btn btn-success mt-3" value="Save Transaction">
      <a href="<?= URLROOT;?>/posts" class="btn"><i class="fa fa-backward"></i> Back</a>
    </div>
  </form>
  <?php elseif($data['entry_rows'] == 7):?>
    <form action="" method="post" id="add_form">
    <div class="row mb-2" style="font-size: 14px;">
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
    <div class="card">
      <div class="table-responsive">
      <table class="table table-striped border w-100">
        <thead>
          <tr class="border text-center text-muted">
            <th>Qty</th>
            <th>Description</th>
            <th>Rate</th>
            <th>Amount</th>
          </tr>
        </thead>
        <tbody>
          <?php for ($i=1; $i < 8; $i++) { 
            ?>
            <tr>
              <td>
                <input min="0" name="qty[]" class="form-input" data-parsley-trigger="keyup" data-parsley-pattern="^[0-9.]+$" value="" style="width: 60px;">
              </td>
              <td>
                <input name="dsc[]" class="form-input" data-parsley-trigger="keyup" type="text" value="" style="width: 55vw;">
              </td>
              <td>
                <input type="number" name="rate[]" min="0" data-parsley-pattern="^[0-9.]+$" data-parsley-trigger="keyup" class="form-input" value="" style="width: 22vw;">
              </td>
              <td data-bs-toggle="tooltip" data-bs-title="automatically calculated">
              </td>
            </tr>
            <?php
          }?>
        </tbody>
      </table>
      </div>
    </div>
    <label style="font-size: 12px;">(leave this box empty if no amount was paid)</label>
    <input type="number" name="paid" class="form-control" value="" placeholder="Cash paid">
    <div class="d-grid gap-2">
      <input type="submit" id="submit" class="btn btn-success mt-3" value="Save Transaction">
      <a href="<?= URLROOT;?>/posts" class="btn"><i class="fa fa-backward"></i> Back</a>
    </div>
  </form>
  <?php elseif($data['entry_rows'] == 12):?>
    <form action="" method="post" id="add_form">
    <div class="row mb-2" style="font-size: 14px;">
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
    <div class="card">
      <div class="table-responsive">
      <table class="table table-striped border w-100">
        <thead>
          <tr class="border text-center text-muted">
            <th>Qty</th>
            <th>Description</th>
            <th>Rate</th>
            <th>Amount</th>
          </tr>
        </thead>
        <tbody>
          <?php for ($i=1; $i < 13; $i++) { 
            ?>
            <tr>
              <td>
                <input min="0" name="qty[]" class="form-input" data-parsley-trigger="keyup" data-parsley-pattern="^[0-9.]+$" value="" style="width: 60px;">
              </td>
              <td>
                <input name="dsc[]" class="form-input" data-parsley-trigger="keyup" type="text" value="" style="width: 55vw;">
              </td>
              <td>
                <input type="number" name="rate[]" min="0" data-parsley-pattern="^[0-9.]+$" data-parsley-trigger="keyup" class="form-input" value="" style="width: 22vw;">
              </td>
              <td data-bs-toggle="tooltip" data-bs-title="automatically calculated">
              </td>
            </tr>
            <?php
          }?>
        </tbody>
      </table>
      </div>
    </div>
    <label style="font-size: 12px;">(leave this box empty if no amount was paid)</label>
    <input type="number" name="paid" class="form-control" value="" placeholder="Cash paid">
    <div class="d-grid gap-2">
      <input type="submit" id="submit" class="btn btn-success mt-3" value="Save Transaction">
      <a href="<?= URLROOT;?>/posts" class="btn"><i class="fa fa-backward"></i> Back</a>
    </div>
  </form>
  <?php elseif($data['entry_rows'] == 18):?>
    <form action="" method="post" id="add_form">
    <div class="row mb-2" style="font-size: 14px;">
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
    <div class="card">
      <div class="table-responsive">
      <table class="table table-striped border w-100">
        <thead>
          <tr class="border text-center text-muted">
            <th>Qty</th>
            <th>Description</th>
            <th>Rate</th>
            <th>Amount</th>
          </tr>
        </thead>
        <tbody>
          <?php for ($i=1; $i < 19; $i++) { 
            ?>
            <tr>
              <td>
                <input min="0" name="qty[]" class="form-input" data-parsley-trigger="keyup" data-parsley-pattern="^[0-9.]+$" value="" style="width: 60px;">
              </td>
              <td>
                <input name="dsc[]" class="form-input" data-parsley-trigger="keyup" type="text" value="" style="width: 55vw;">
              </td>
              <td>
                <input type="number" name="rate[]" min="0" data-parsley-pattern="^[0-9.]+$" data-parsley-trigger="keyup" class="form-input" value="" style="width: 22vw;">
              </td>
              <td data-bs-toggle="tooltip" data-bs-title="automatically calculated">
              </td>
            </tr>
            <?php
          }?>
        </tbody>
      </table>
      </div>
    </div>
    <label style="font-size: 12px;">(leave this box empty if no amount was paid)</label>
    <input type="number" name="paid" class="form-control" value="" placeholder="Cash paid">
    <div class="d-grid gap-2">
      <input type="submit" id="submit" class="btn btn-success mt-3" value="Save Transaction">
      <a href="<?= URLROOT;?>/posts" class="btn"><i class="fa fa-backward"></i> Back</a>
    </div>
  </form>
  <?php else:?>
    <p class="h2 text-muted">Please choose invoice size
    </p><hr>
    <div class="row">
      <div class="col-md-6 mb-4">
        <div class="d-flex gap-3">
          <div class="number">
            <span class="bg-primary py-2 px-4 fs-3 rounded-circle">
              1
            </span>
          </div>
          <div>
            <h3 class="fs-4"> About three entry rows..</h3>
            <p>For customers that purchased about one or two products or services.</p>
            <p>
              <a href="<?php echo URLROOT;?>/posts/add/3" class="btn btn-outline-success">Size 3</a>
            </p>
          </div>
        </div>
      </div>
      <div class="col-md-6 mb-4">
        <div class="d-flex gap-3">
          <div class="number">
            <span class="bg-primary py-2 px-4 fs-3 rounded-circle">
              2
            </span>
          </div>
          <div>
            <h3 class="fs-4">About seven entry rows..</h3>
            <p>For customers that purchased about four or five products or services.</p>
            <p>
              <a href="<?php echo URLROOT;?>/posts/add/7" class="btn btn-outline-success" >Size 7</a>
            </p>
          </div>
        </div>
      </div>
      <div class="col-md-6 mb-4">
        <div class="d-flex gap-3">
          <div class="number">
            <span class="bg-primary py-2 px-4 fs-3 rounded-circle">
              3
            </span>
          </div>
          <div>
            <h3 class="fs-4">About twelve entry rows..</h3>
            <p>For customers that purchased about nine or ten products or services.</p>
            <p>
              <a href="<?php echo URLROOT;?>/posts/add/12" class="btn btn-outline-success">Size 12</a>
            </p>
          </div>
        </div>
      </div>
      <!-- <div class="col-md-6 mb-4">
        <div class="d-flex gap-3">
          <div class="number">
            <span class="bg-primary py-2 px-4 fs-3 rounded-circle">
              4
            </span>
          </div>
          <div>
            <h3 class="fs-4">About eighteen entry rows..</h3>
            <p>
              <a href="<?php echo URLROOT;?>/posts/add/18" class="btn btn-outline-success">Size 18</a>
            </p>
          </div>
        </div>
      </div> -->
    </div>
  <?php endif;?>
</div>
  
  <?php require APPROOT . '/views/inc/footer.php'; ?>
  <script>
    $('#add_form').parsley();
    $('#add_form').on('submit', function(event){
        event.preventDefault();

        if($('#add_form').parsley().isValid()){
            let formData = $(this).serialize();
            $.ajax({
                url: "<?php echo URLROOT; ?>/posts/add/<?= $data['entry_rows'] ;?>",
                method: "POST",
                data: formData,
    
                beforeSend: function () {
                    $('#submit').attr('disabled', 'disabled');
                    $('#submit').val('Processing, pls wait ...');

                },
                success:function (response) {
                    $('#add_form').parsley().reset();
                    $('#submit').attr('disabled', false);
                    $('#submit').val('Transaction saved successfully');
                    $('#msg').html(response);
                }
            });
        }

    });
</script>