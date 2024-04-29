<?php require APPROOT . '/views/inc/header.php'; ?>
<?= flash('msg');?>
<div class="row">
  <div class="col-md-10 mx-auto">
    <h1 class="h3 text-muted">My Customers<br>
      <span class="lead">Click customer's phone number to send whatsApp message.</span>
    </h1>
    <div class="card bg-light mt-3">
      <div class="table-responsive">
        <table id="example" class="table" style="width:100%;">
          <thead class="bg-primary">
            <tr class="border">
              <th>#</th>
              <th>Customer Name</th>
              <th>Customer Phone</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <style type="text/css">
              a{
                text-decoration: none;
              }
            </style>
            <?php $count =1; foreach($data['customers'] as $user):
              $address = $this->userModel->get_customersAddress($user->customer_phone);
              $name = $this->userModel->get_customersName($user->customer_phone);
            ?>
            <tr>
              <td><?= $count;?></td>
              <td><?= $name->customer_name ;?></td>
              <td>
                <?php 
                  $phone = ltrim($user->customer_phone, '\0');
                ?>
                <?php if(!$_SESSION['user_status'] == 'expired'):?>
                <a href="https://wa.me/234<?= $phone ;?>">
                  <i class="fab fa-whatsapp"></i> <span class="text-muted text-dark"><?= $user->customer_phone;?></span>
                </a>
                <?php else:?>
                  <a href="javascript:void();">Your subscription has expired</a>
                <?php endif;?>
              </td>
              
              <td>
                <a href="<?php echo URLROOT;?>/pages/customer_history/<?= $user->customer_phone;?>">
                  <i class="fa fa-eye"></i> <span class="text-muted text-dark">view</span>
                </a>
              </td>
            </tr>
            <?php $count++; endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
