<?php require APPROOT . '/views/inc/header.php'; ?>
<?php echo flash('msg');?>
<div class="row">
    <div class="col-md-6 mx-auto">
      <div class="card card-body bg-light my-5">
      <div class="shadow-lg p-4 rounded-4 border text-bg-success mb-3" style="margin-top: -50px;">
        <h1 class="h4 m-0">Simple And Easy To Use Online Invoicing Software For Business Owners.</h1>
      </div>
        <p class="text-primary fw-semibold">Login to continue</p>
        <p>Please fill in your credentials to login.</p>
        <form action="<?php echo URLROOT; ?>/users/login" method="post">
          <div class="form-group mb-3">
              <label>Phone:<sup>*</sup></label>
              <input type="text" name="phone" class="form-control form-control-lg <?php echo (!empty($data['phone_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['phone']; ?>">
              <span class="invalid-feedback"><?php echo $data['phone_err']; ?></span>
          </div>    
          <div class="form-group mb-3">
              <label>Password:<sup>*</sup></label>
              <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
              <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
          </div>
          <div class="row">
            <div class="col-md-6">
              <input type="submit" class="btn btn-success btn-block mb-3" value="Login">
            </div>
            <div class="col-md-6">
              <a href="<?php echo URLROOT;?>/users/register" class="text-dark text-muted fs-6">No account? Register</a>
            </div>
            <!-- <div class="col-md-6">
              <a href="<?php echo URLROOT;?>/users/register" class="mt-3">Forgot Password?</a>
            </div> -->
          </div>
        </form>
      </div>
    </div>
  </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
