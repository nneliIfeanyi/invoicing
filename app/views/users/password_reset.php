<?php require APPROOT . '/views/inc/header.php'; ?>
<?php echo flash('msg');?>
<div class="row">
    <div class="col-md-6 mx-auto">
      <div class="card card-body bg-light my-5">
        <p class="text-primary fw-semibold">Reset Password</p>
        <p>Please provide the following information</p>
        <form action="<?php echo URLROOT; ?>/users/password_reset" method="post">
          <div class="form-group mb-3">
              <label>Your Email:</label>
              <input type="email" name="email" class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
              <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
          </div>    
          <div class="form-group mb-3">
              <label>Your Business Hotline:</label>
              <input type="number" name="phone" class="form-control form-control-lg <?php echo (!empty($data['phone_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['phone']; ?>">
              <span class="invalid-feedback"><?php echo $data['phone_err']; ?></span>
          </div>
          <div class="row">
            <div class="col-md-6">
              <input type="submit" class="btn btn-success btn-block mb-3" value="Submit">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
