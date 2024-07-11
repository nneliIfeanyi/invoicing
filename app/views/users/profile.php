<?php require APPROOT . '/views/inc/header2.php';
      require APPROOT . '/views/inc/sidebar.php'; 
      echo flash('msg');?>

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
                                <li class="list-inline-item">Profile</li>
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
        <div class="text-center py-3">
          <h4 class="text-uppercase text-warning">Business Profile</h4>
          <hr class="w-25 mx-auto" />
        </div>
  
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <div class="d-flex gap-2 align-items-center">
              <div class="w-25 mb-3">
                <img
                  src="<?php echo URLROOT.'/'.$data['user']->logo?>"
                  alt=""
                  class="about-img rounded-circle"
                />
              </div>
              <div class="pl-1">
                 <h2 class="h2"><?= $_SESSION['user_name']?><br>
                  <span class="lead"><?= $data['user']->biz_dsc;?></span>
                </h2>
              </div>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="py-5">
              <p class="font-weight-bold shadow-lg px-4 py-3">Wallet Balance: <span class="text-warning">P</span><?= $_SESSION['user_points']; ?></p>
            </div>
          </div>
        </div><hr>
  </div>


<div class="container-fluid">
<div class="row">
  <div class="col-md-8">
    <!-- profile edit section -->
    <section id="about" class="bg-light">
        <div class="text-center mt-2">
          <h4 class="text-uppercase h5 text-muted py-3">Edit Profile</h4>
          <hr class="w-25 mx-auto" />
        </div>
        <form action="<?php echo URLROOT; ?>/users/update_profile" method="post" id="update_profile">
        <div class="mx-3 mb-5">
          <div class="form-group mb-3">
            <label>Business Description:</label>
            <input name="dsc" data-parsley-length="[0, 40]" required data-parsley-trigger="keyup" class="form-control form-control-lg" value="<?= $data['user']->biz_dsc;?>">
          </div>
          <div class="form-group mb-3">
            <label>Business Address:</label>
            <input name="address" data-parsley-length="[0, 40]" data-parsley-trigger="keyup" class="form-control form-control-lg" value="<?= $data['user']->bizaddress;?>">
          </div>
          <div class="form-group mb-3">
            <label>Hotline:</label>
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
          <div class="form-group mb-3">
            <label>Business category:</label>
            <select class="form-control" name="category" required data-parsley-trigger="keyup">
                <option value="<?= $data['user']->category;?>">
                   <?= $data['user']->category;?>
                </option>
                <option value="production">
                    Production
                </option>
                <option value="trading">
                    Trading
                </option>
                <option value="services">
                    Service rendering
                </option>
                <option value="freelancing">
                    Freelancing
                </option>
            </select>
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
</div>

<div class="container-fluid">
<!-- Password reset section -->
<section id="about" class="bg-light card card-body mb-5">
    <div class="row">
      <div class="col-lg-6">
          <h4 class="text-uppercase font-weight-bold h5 text-muted">Change Password</h4>
        <div class="d-flex flex-column gap-2 align-items-start">
            <form action="<?php echo URLROOT; ?>/users/password" method="post">
            <div class="form-group mb-3">
                <label>Current Password:</label>
                <input type="password" name="old" class="form-control form-control-lg" value="" placeholder="*********">
            </div>
            <div class="form-group mb-3">
                <label>New Password:</label>
                <input type="password" name="new" class="form-control form-control-lg" value="">
            </div>
            <div class="form-group mb-3">
              <input type="submit" class="btn btn-success" value="Update Password">
            </div>
          </form>
        </div><hr>
      </div>
      <!-- change business logo -->
      <div class="col-lg-4">
        <h4 class="text-uppercase h6 text-muted m-0 font-weight-bold">Upload Business Logo</h4>
          <p>This will cost the sum of <span class="fw-bold">300</span> points</p>
        <div class="d-flex flex-column gap-2 align-items-center border-top">
            <form action="<?php echo URLROOT; ?>/users/logo" method="post" enctype="multipart/form-data">
              <div class="w-25 p-2">
                <img
                  src="<?php echo URLROOT.'/'.$data['user']->logo?>"
                  alt=""
                  class="rounded-circle"
                  height="120"
                />
              </div>
              <div class="form-group mb-4">
                <input type="file" name="new_logo" class="form-control form-control-lg" value="">
              </div>
              <div class="form-group  mb-3">
                <input type="submit" name="new_logo" class="btn btn-success" value="Update Logo">
              </div>
          </form>
        </div><hr>
      </div>
    </div>
</section>
</div>

<?php require APPROOT . '/views/inc/footer2.php'; ?>
<script type="text/javascript">
    $('#update_profile').parsley();
</script>