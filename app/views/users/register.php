<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="row">
  <div class="col-md-6 mx-auto">
    <div class="card card-body bg-light my-5">
      <p class="text-primary fw-semibold">Simple And Easy To Use Online Invoicing Software For Business Owners.</p>
      <h2>Create An Account</h2>
      <p>Please fill this form to register with us</p>
      <form action="<?php echo URLROOT; ?>/users/register" method="post">
        <div class="form-group mb-3">
            <label>Business Name:<sup>*</label>
            <input type="text" name="name" class="form-control form-control-lg <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['name']; ?>">
            <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
        </div> 
        <div class="form-group mb-3">
            <label>Business Description:<sup>*</label>
            <input type="text" name="biz_dsc" class="form-control form-control-lg <?php echo (!empty($data['biz_dsc_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['biz_dsc']; ?>">
            <span class="invalid-feedback"><?php echo $data['biz_dsc_err']; ?></span>
        </div> 
        <div class="form-group mb-3">
            <label>Hotline:<sup>*</sup></label>
            <input type="number" name="phone" class="form-control form-control-lg <?php echo (!empty($data['phone_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['phone']; ?>">
            <span class="invalid-feedback"><?php echo $data['phone_err']; ?></span>
        </div> 
        <div class="form-group mb-3">
            <label>Business Address:<sup>*</sup></label>
            <input type="text" name="address" class="form-control form-control-lg" value="<?php echo $data['address']; ?>">
        </div>    
        <div class="form-group mb-3">
            <label>Password:<sup>*</sup></label>
            <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
            <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
        </div>
        <div class="form-group mb-3">
            <label>Confirm Password:<sup>*</sup></label>
            <input type="password" name="confirm_password" class="form-control form-control-lg <?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['confirm_password']; ?>">
            <span class="invalid-feedback"><?php echo $data['confirm_password_err']; ?></span>
        </div>

        <div class="form-row">
          <div class="col">
            <input type="submit" class="btn btn-success btn-block" value="Register">
          </div>
          <div class="col">
            <a href="<?php echo URLROOT; ?>/users/login" class="btn btn-light btn-block">Have an account? Login</a>
          </div>
        </div>
      </form>
    </div>
  </div>
  
<?php require APPROOT . '/views/inc/footer.php'; ?>