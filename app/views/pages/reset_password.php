<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="row">
    <div class="col-md-6 mx-auto">
      <div class="card card-body bg-light my-5">
        <p class="text-primary fw-semibold">Reset Password</p>
        <form action="<?php echo URLROOT; ?>/pages/reset_password/<?= $data['url'];?>" method="post">    
          <div class="form-group mb-3">
              <label>Enter New Password:</label>
              <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>" placeholder="6 characters minimum">
              <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
          </div>
          <div class="form-group mb-3">
              <label>Comfirm New Password:</label>
              <input type="password" name="comfirm_password" class="form-control form-control-lg <?php echo (!empty($data['password_err2'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['comfirm_password']; ?>" placeholder="6 characters minimum">
              <span class="invalid-feedback"><?php echo $data['password_err2']; ?></span>
          </div>
          <div class="row">
            <div class="col-md-6">
              <input type="submit" class="btn btn-success btn-block mb-3" value="Reset Password">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
