<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="row">
    <div class="col-md-6 mx-auto">
      <div class="card card-body bg-light my-5">
       <h1 class="h2 m-0">Simple And Easy To Use Online Invoicing Software For Business Owners.</h1>
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
          <div class="form-row">
            <div class="col">
              <input type="submit" class="btn btn-success btn-block" value="Login">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
