<?php require APPROOT . '/views/inc/header2.php';
      require APPROOT . '/views/inc/sidebar2.php'; 
      flash('msg');?>
<!-- BREADCRUMB-->
<section class="au-breadcrumb m-t-75">
    <div class="section__content section__content--p10">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="au-breadcrumb-content">
                        <div class="au-breadcrumb-left">
                            <span class="au-breadcrumb-span">You are here:</span>
                            <ul class="list-unstyled list-inline au-breadcrumb__list">
                                <li class="list-inline-item active">
                                    <a href="<?php echo URLROOT?>/inventory">Home</a>
                                </li>
                                <li class="list-inline-item seprate">
                                    <span>/</span>
                                </li>
                                <li class="list-inline-item">Add Transaction</li>
                            </ul>
                        </div>
                        <a href="<?php echo URLROOT;?>/inventory/today" class="au-btn au-btn-icon au-btn--green">
                            <i class="fas fa-tachometer-alt"></i>Go to today</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END BREADCRUMB-->
<section class="statistic">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6 py-2 rounded-2">
        <?= flash('msg');?>
        <h2 style="margin:0">
          <span><?php echo $_SESSION['user_name']; ?></span><br>
          <span class="lead font-weight-light text-muted"><?php echo $_SESSION['user_dsc']; ?></span>
        </h2>
        <p class="font-italic font-weight-lighter text-muted">Address: <?php echo $_SESSION['address']; ?></p>
      </div>
      <div class="col-md-6 border shadow-sm py-2 rounded-2">
        <p class="lead text-warning">Cash|Credit Sales Invoice</p>
        <label class="fs-6">Hotline: &nbsp; &nbsp;
            <span class="border-bottom fw-semibold"><?php echo $_SESSION['user_phone']; ?></span>
        </label>
      </div>   
    </div>
  </div>
</section>

    <div class="mb-5">
   <?php if($data['entry_rows'] == 3):?>
    <section class="statistic">
      <div class="container-fluid">
        <form action="<?php echo URLROOT;?>/submissions/add_transaction" method="post" id="add_form">
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-addon">
                  <i class="fa fa-user"></i>
              </div>
              <input type="text" name="customer_name" class="form-control" data-parsley-trigger="keyup"  placeholder="Customer name">
            </div>
          </div>

        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                </div>
                <input type="number" name="customer_phone" class="form-control" data-parsley-length="[0, 11]" data-parsley-trigger="keyup" placeholder="Customer phone">
            </div>
        </div>

        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-map-marker"></i>
                </div>
                <input type="text" name="customer_address" class="form-control" placeholder="Address">
            </div>
        </div>
        <div class="col-8 py-3">
          <input disabled class="form-input" value="<?= date('D').' '. date('jS').' '.date('M').' '.date('Y');?>">
        </div>
          <div class="card">
            <div class="table-responsive">
            <table class="table  border w-100">
              <thead>
                <tr class="border text-center text-muted">
                  <th>Qty</th>
                  <th>Description of goods</th>
                  <th>Rate</th>
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
                      <select name="name[]" class="form-control" style="width: 45vw;">
                      	<option value="">Please Select</option>
                      	<?php foreach($data['goods'] as $goods):?>
                      		<option value="<?= $goods->name;?>"><?= $goods->name;?></option>
                      	<?php endforeach;?>
                      </select>
                    </td>
                    <td>
                      <input name="rate[]" min="0" id="input" data-parsley-pattern="^[0-9.]+$" data-parsley-trigger="keyup" class="form-input" value="" style="width: 20vw;">
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
          <div class="row form-group my-4">
            <div class="col-8">
              <input type="submit" id="submit" class="btn btn-success" value="Save Transaction">
            </div>
            <div class="col-4">
              <a href="<?= URLROOT;?>/posts" class="btn" style="color: #fe6b2a;"><i class="fa fa-backward"></i> Back</a>
            </div>
          </div>
        </form>
      </div>
      </section>
      <?php elseif($data['entry_rows'] == 7):?>
      <section class="statistic">
        <div class="container-fluid">
          <form action="<?php echo URLROOT;?>/submissions/add_transaction" method="post" id="add_form">
          <div class="form-group">
                  <div class="input-group">
                      <div class="input-group-addon">
                          <i class="fa fa-user"></i>
                      </div>
                      <input type="text" name="customer_name" class="form-control" data-parsley-trigger="keyup"  placeholder="Customer name">
                  </div>
              </div>

              <div class="form-group">
                  <div class="input-group">
                      <div class="input-group-addon">
                          <i class="fa fa-phone"></i>
                      </div>
                      <input type="number" name="customer_phone" class="form-control" data-parsley-length="[0, 11]" data-parsley-trigger="keyup" placeholder="Customer phone">
                  </div>
              </div>

              <div class="form-group">
                  <div class="input-group">
                      <div class="input-group-addon">
                          <i class="fa fa-map-marker"></i>
                      </div>
                      <input type="text" name="customer_address" class="form-control" placeholder="Address">
                  </div>
              </div>
            <div class="py-3 col-6">
              <input disabled class="form-input" value="<?= date('D').' '. date('jS').' '.date('M').' '.date('Y');?>">
            </div>
          <div class="card">
            <div class="table-responsive">
            <table class="table table-striped border w-100">
              <thead>
                <tr class="border text-center text-muted">
                  <th>Qty</th>
                  <th>Description</th>
                  <th>Rate</th>
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
                      <select name="name[]" class="form-control" select2 style="width: 45vw;">
                        <option value="">Please Select</option>
                        <?php foreach($data['goods'] as $goods):?>
                          <option value="<?= $goods->name;?>"><?= $goods->name;?></option>
                        <?php endforeach;?>
                      </select>
                    </td>
                    <td>
                      <input name="rate[]" min="0" id="input" data-parsley-pattern="^[0-9.]+$" data-parsley-trigger="keyup" class="form-input" value="" style="width: 20vw;">
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
          <div class="row form-group my-4">
            <div class="col-8">
              <input type="submit" id="submit" class="btn btn-success" value="Save Transaction">
            </div>
            <div class="col-4">
              <a href="javascript:void()" onclick="history.back()" class="btn" style="color: #fe6b2a;"><i class="fa fa-backward"></i> Back</a>
            </div>
          </div>
        </form>
      </div>
    </section>
    <?php elseif($data['entry_rows'] == 12):?>
    <section class="statistic">
      <div class="container-fluid">
        <div id="msg"></div>
        <form action="<?php echo URLROOT;?>/submissions/add_transaction" method="post" id="add_form">
          <div class="form-group">
                  <div class="input-group">
                      <div class="input-group-addon">
                          <i class="fa fa-user"></i>
                      </div>
                      <input type="text" name="customer_name" class="form-control" data-parsley-trigger="keyup"  placeholder="Customer name">
                  </div>
              </div>

              <div class="form-group">
                  <div class="input-group">
                      <div class="input-group-addon">
                          <i class="fa fa-phone"></i>
                      </div>
                      <input type="number" name="customer_phone" class="form-control" data-parsley-length="[0, 11]" data-parsley-trigger="keyup" placeholder="Customer phone">
                  </div>
              </div>

              <div class="form-group">
                  <div class="input-group">
                      <div class="input-group-addon">
                          <i class="fa fa-map-marker"></i>
                      </div>
                      <input type="text" name="customer_address" class="form-control" placeholder="Address">
                  </div>
              </div>
            <div class="col-6 py-3">
              <input disabled class="form-input" value="<?= date('D').' '. date('jS').' '.date('M').' '.date('Y');?>">
            </div>
          <div class="card">
            <div class="table-responsive">
            <table class="table table-striped border w-100">
              <thead>
                <tr class="border text-center text-muted">
                  <th>Qty</th>
                  <th>Description</th>
                  <th>Rate</th>
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
                      <select name="name[]" class="form-control" select2 style="width: 45vw;">
                        <option value="">Please Select</option>
                        <?php foreach($data['goods'] as $goods):?>
                          <option value="<?= $goods->name;?>"><?= $goods->name;?></option>
                        <?php endforeach;?>
                      </select>
                    </td>
                    <td>
                      <input name="rate[]" min="0" id="input" data-parsley-pattern="^[0-9.]+$" data-parsley-trigger="keyup" class="form-input" value="" style="width: 20vw;">
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
          <div class="row form-group my-4">
            <div class="col-8">
              <input type="submit" id="submit" class="btn btn-success" value="Save Transaction">
            </div>
            <div class="col-4">
              <a href="javascript:void()" onclick="history.back()" class="btn text-warning"><i class="fa fa-backward"></i> Back</a>
            </div>
          </div>
        </form>
        </div>
      </section>
        <?php else:?>
        <section class="statistic">
          <div class="container-fluid">
            <p class="h2 text-muted">Please choose invoice size
            </p><hr>
            <div class="row">
              <div class="col-md-6 mb-4">
                <div class="d-flex justify-content-between">
                  <div class="number">
                    <span class="py-2 px-4 fs-3 bg-warning rounded-circle">
                      1
                    </span>
                  </div>
                  <div>
                    <h3 class="fs-4"> About three entry rows..</h3>
                    <p>For customers that purchased about one or two products.</p>
                    <p>
                      <a href="<?php echo URLROOT;?>/inventory/add/3" class="btn btn-outline-success px-5">Size 3</a>
                    </p>
                  </div>
                </div><hr>
              </div>
              <div class="col-md-6 mb-4">
                <div class="d-flex justify-content-between">
                  <div class="number">
                    <span class="py-2 px-4 fs-3 bg-warning rounded-circle">
                      2
                    </span>
                  </div>
                  <div>
                    <h3 class="fs-4">About seven entry rows..</h3>
                    <p>For customers that purchased about four or five products.</p>
                    <p>
                      <a href="<?php echo URLROOT;?>/inventory/add/7" 
                         class="btn btn-outline-success px-5" >
                         Size 7</a>
                    </p>
                  </div>
                </div><hr>
              </div>
              <div class="col-md-6 mb-4">
                <div class="d-flex justify-content-between">
                  <div class="number">
                    <span class="py-2 px-4 fs-3 bg-warning rounded-circle">
                      3
                    </span>
                  </div>
                  <div>
                    <h3 class="fs-4">About twelve entry rows..</h3>
                    <p>For customers that purchased about nine or ten products.</p>
                    <p>
                      <a href="<?php echo URLROOT;?>/inventory/add/12" class="btn btn-outline-success px-5">Size 12</a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <?php endif;?>
  

<?php require APPROOT . '/views/inc/footer2.php'; ?>

