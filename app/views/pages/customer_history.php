<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="row">
  <div class="col-md-9 mx-auto">
    <h1 class="h3">Showing <span class="text-muted"><?= $data['name']->customer_name;?>'s</span> Transactions</h1>
    <?php if(!empty($data['transactions'])):?>
      <?php foreach($data['transactions'] as $post):
        $customer_info = $this->postModel->getCustomerInfo($post->t_id);
      ?>
      <div class="card card-body mb-3" data-bs-toggle="tooltip" data-bs-title="Transaction id : <?= $post->t_id ?>">

        <h6 class="text-primary">Customer Details</h6>
        <h4 class="card-title text-muted"><i class="fa fa-user"></i>&nbsp;<?php echo $customer_info->customer_name; ?></h4>
        <p><i class="fa fa-map-marker"></i>&nbsp;<?= $customer_info->customer_address ?></p>
        <div class="bg-light p-2 mb-3">
          <i class="fa fa-calender-days"></i>
          Transaction date: <span class="text-muted fw-semibold"><?php echo $customer_info->c_date.' '.$customer_info->c_month; ?></span>
          at <?php echo $customer_info->c_time; ?>
        </div>

        <?php 
        $transactions = $this->postModel->get_per_dept($customer_info->t_id);
        $amt=0;
        foreach($transactions as $trns){
          if (empty($trns->qty)) {
            $trns->qty = 1;
          }
          $amt += (int)$trns->qty * (int)$trns->rate;
        }
        if (empty($customer_info->paid)) {
          $customer_info->paid = 0;
        }
        $to_balance = $amt - $customer_info->paid;
        ?>
        <p>To balance: <span class="text-primary h6 fw-bold">&#8358;<?php echo put_coma($to_balance); ?>.00</span></p>
       <div class="d-grid gap-2">
        <a href="<?= URLROOT;?>/posts/show/<?php echo $post->t_id;?>" class="btn btn-sm btn-success"><i class="fa fa-eye"></i> Preview transaction</a>

        <a href="javascript:void();" 
          data-bs-toggle="modal" data-bs-target="#deleteModal<?= $post->t_id ?>" 
          class="btn btn-sm btn-outline-danger">
          <i class="fa fa-trash"></i> Delete transaction
        </a>

        <!--Delete post Modal -->
        <div class="modal fade" id="deleteModal<?= $post->t_id ?>">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-body">
                This Action cannot be reveresed..
                <p class="lead">Do you wish to Continue?</p>
              </div>
              <div class="modal-footer d-flex justify-content-between">
                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i> Cancel</button>
                <form action="<?php echo URLROOT; ?>/posts/delete/<?php echo $post->t_id; ?>" method="post">
                  <button type="submit" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash" aria-hidden="true"></i> Yes, Continue</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
      <?php endforeach;?> 
      <div class="fs-6 fs-italics text-center mb-2">
        <span class="spinner-border-sm spinner-border"> </span> No more transactions...
      </div>
    <?php else:?>
      <div class="lead">
        <p>Your transactions will appear here.</p>
      </div>
    <?php endif;?>

  </div>
</div>

<div style="position: fixed;bottom: 1vh;right: 1vw;">
  <p data-bs-toggle="tooltip" data-bs-title="Add Transaction">
    <a href="<?php echo URLROOT;?>/posts/add/1" style="font-size: 22px;">
      <i class="fa fa-plus-circle fa-3x text-primary"></i>
    </a>
  </p>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
