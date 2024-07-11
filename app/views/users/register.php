<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="row">
  <div class="col-md-6 mx-auto">
    <div class="card card-body bg-light my-5">
      <div class="shadow-lg p-4 rounded-4 border text-bg-success mb-3" style="margin-top: -50px;">
        <h1 class="h4 m-0">Simple And Easy To Use Online Invoicing Software For Business Owners.</h1>
      </div>
      <p class="text-primary fw-semibold">Create An Account</p>
      <p>Please fill this form to register with us</p>
      <form action="<?php echo URLROOT; ?>/users/register" method="post" id="register_form">
        <div class="form-group mb-3">
            <label>Business Name:</label>
            <input type="text" name="name" id="business-name" data-parsley-length="[0, 30]" required data-parsley-trigger="keyup" class="form-control form-control-lg" value="<?php echo $data['name']; ?>">
        </div> 
        <div class="form-group mb-3">
            <label>Business Description:</label>
            <input type="text" name="biz_dsc" data-parsley-length="[0, 35]" required data-parsley-trigger="keyup" class="form-control form-control-lg <?php echo (!empty($data['biz_dsc_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['biz_dsc']; ?>">
            <span class="invalid-feedback"><?php echo $data['biz_dsc_err']; ?></span>
        </div> 
        <div class="form-group mb-3">
            <label>Hotline:</label>
            <input type="number" name="phone" required data-parsley-trigger="keyup" data-parsley-length="[10, 11]" class="form-control form-control-lg <?php echo (!empty($data['phone_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['phone']; ?>">
            <span class="invalid-feedback"><?php echo $data['phone_err']; ?></span>
        </div> 
        <div class="form-group mb-3">
            <label>Business Address:</label>
            <input type="text" name="address" class="form-control form-control-lg" data-parsley-length="[0, 40]" data-parsley-trigger="keyup" value="<?php echo $data['address']; ?>">
        </div>
        <div class="form-group mb-3">
            <label>Business category:</label>
            <select class="form-control" name="category" required data-parsley-trigger="keyup">
                <option value="">
                    ---
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
        <div class="form-group mb-3">
            <label>Email:</label>
            <input type="email" name="email" required data-parsley-trigger="keyup" class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
            <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
        </div>    
        <div class="form-group mb-3">
            <label>Password:</label>
            <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
            <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
        </div>
        <div class="form-group mb-3">
            <label>Confirm Password:</label>
            <input type="password" name="confirm_password" class="form-control form-control-lg <?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['confirm_password']; ?>">
            <span class="invalid-feedback"><?php echo $data['confirm_password_err']; ?></span>
        </div>

        <div class="row">
          <div class="col-md-6">
            <input type="submit" class="btn btn-success btn-block mb-3" value="Register">
          </div>
          <div class="col-md-6">
              <a href="<?php echo URLROOT;?>/users/login" class="text-dark text-muted fs-6">Have an account? Login</a>
          </div>
          <div class="col">
           <p class="text-muted pt-3" style="font-size:12px;"> <i class="fa fa-info-circle"></i> You will be redirected to the login page once your registration is completed.</p>
          </div>
        </div>
      </form>
    </div>
  </div>
  
<?php require APPROOT . '/views/inc/footer.php'; ?>
<script type="text/javascript">
    $('#register_form').parsley();
    $('#loader').fadeIn();
</script>


<!-- <script>
  $(document).ready(function(){
    $('#link1').click(function(){
      $('#loader').fadeIn();
    });
  });
</script> -->