<?php require APPROOT . '/views/inc/header.php'; ?>
<?php echo flash('msg');?>
<section id="about" class="bg-light">
    <div class="text-center">
      <h4 class="text-uppercase fw-bold text-primary">Business Profile</h4>
      <hr class="w-25 mx-auto" />
    </div>
    <div class="row">
      <div class="col-lg-8 mx-auto">
        <div class="d-flex gap-2 align-items-center">
          <div class="w-25 mb-3">
            <img
              src="<?php echo URLROOT.'/'.$data['user']->logo?>"
              alt=""
              class="about-img img-fluid rounded-circle"
            />
          </div>
          <div class="">
             <h2 class="h2"><?= $_SESSION['user_name']?><br>
              <span class="fs-6"><?= $data['user']->biz_dsc;?></span>
            </h2>
          </div>
        </div>
      </div>
    </div><hr>
</section>

<div class="row h-100">
  <div class="col-md-8">
    <!-- customers list table -->
    <?php if(!empty($data['customers'])):?>
    <h1 class="h3 text-muted">My Customers<br>
      <span class="lead">Click customer's phone number to send whatsApp message.</span>
    </h1>
    <div class="card bg-light my-3">
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
                <?php if($_SESSION['user_status'] !== 'expired'):?>
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
  <?php else:?>
   <h1 class="h3 text-muted">My Customers<br>
     <span class="lead text-dark fs-6">No transactions yet</span>
   </h1> 
  <?php endif;?>
  </div>
  <div class="col-md-4">
    <!-- profile edit section -->
    <section id="about" class="bg-light">
        <div class="text-center mt-2">
          <h4 class="text-uppercase h5 text-muted">Edit Profile</h4>
          <hr class="w-25 mx-auto" />
        </div>
        <form action="<?php echo URLROOT; ?>/users/update_profile" method="post" id="update_profile">
        <div class="d-flex flex-column gap-2 align-items-center mb-5">
          <div class="form-group mb-3">
            <label>Business Description:</label>
            <input name="dsc" data-parsley-length="[0, 25]" required data-parsley-trigger="keyup" class="form-control form-control-lg" value="<?= $data['user']->biz_dsc;?>">
          </div>
          <div class="form-group mb-3">
            <label>Business Address:</label>
            <input name="address" data-parsley-length="[0, 30]" data-parsley-trigger="keyup" class="form-control form-control-lg" value="<?= $data['user']->bizaddress;?>">
          </div>
          <div class="form-group mb-3">
            <label>Business Phone 1:</label>
            <input type="number" name="phone" data-parsley-length="[10, 11]" required data-parsley-trigger="keyup" class="form-control form-control-lg <?php echo (!empty($data['phone_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['user']->bizphone;?>">
            <span class="invalid-feedback"><?php echo $data['phone_err']; ?></span>
          </div>
         <!--<div class="form-group mb-3">
            <label>Business Phone 2: <span class="text-muted fs-6">optional</span></label>
            <input type="number" name="phone" required data-parsley-trigger="keyup" class="form-control form-control-lg" value="">
          </div> -->
          <div class="form-group mb-3">
            <label>Email:</label>
            <input type="email" name="email" required data-parsley-trigger="keyup" class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['user']->email;?>">
            <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
          </div>
    
          <div class="row">
            <div class="col-md-6">
              <input type="submit" class="btn btn-success btn-block mb-3" value="Update Profile">
            </div>
          </div>
        </div>
      </form>
    </section>
  </div>
</div>

<!-- Password reset section -->
<section id="about" class="bg-light card card-body mb-5">
    <div class="row">
      <div class="col-lg-6 mx-auto">
          <h4 class="text-uppercase h5 text-muted">Change Password</h4>
          <hr class="w-25 mx-auto" />
        <div class="d-flex flex-column gap-2 align-items-start">
            <form action="<?php echo URLROOT; ?>/users/password" method="post">
            <div class="form-group mb-3">
                <label>Current Password:</label>
                <input type="password" name="old" class="form-control form-control-lg" value="" placeholder="*********">
            </div>
            <div class="form-group mb-3">
                <label>New Password:</label>
                <input type="password" name="new" class="form-control form-control-lg" value="" placeholder="*********">
            </div>
            <div class="form-group mb-3">
              <input type="submit" class="btn btn-success" value="Update Password">
            </div>
          </form>
        </div>
      </div>
      <!-- change business logo -->
      <!-- <div class="col-lg-4">
          
        <div class="d-flex flex-column gap-2 align-items-center border-top">
            <form action="<?php echo URLROOT; ?>/users/logo" method="post" enctype="multipart/form-data">
              <div class="w-25 mb-3 p-2">
                <img
                  src="<?php echo URLROOT.'/'.$data['user']->logo?>"
                  alt=""
                  class="about-img img-fluid rounded-circle"
                />
              </div>
              <div class="form-group mb-3">
                <input type="file" name="new_logo" class="form-control form-control-lg" value="">
              </div>
              <div class="form-group  mb-3">
                <input type="submit" name="new_logo" class="btn btn-success" value="Update Logo">
              </div>
          </form>
        </div>
      </div> -->
    </div>
</section>

<?php require APPROOT . '/views/inc/footer.php'; ?>
<script type="text/javascript">
    $('#update_profile').parsley();
</script>