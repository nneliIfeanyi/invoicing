<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="row">
  <div class="col-md-6 mx-auto">
    <div class="card card-body bg-light mb-5">
      <h1 class="h2 m-0">Simple And Easy To Use Online Invoicing Software For Business Owners.</h1>
      <p class="text-primary fw-semibold">Create An Account</p>
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
           <p class="text-muted pt-3" style="font-size:12px;"> <i class="fa fa-info-circle"></i> You will be redirected to the login page once your registration is completed.</p>
          </div>
        </div>
      </form>
    </div>
  </div>
  
<?php require APPROOT . '/views/inc/footer.php'; ?>