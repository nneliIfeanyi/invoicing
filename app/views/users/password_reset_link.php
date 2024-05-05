<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="row">
    <div class="col-md-6 mx-auto">
      <div class="card card-body bg-light my-5">
        <p class="text-primary fw-semibold">Reset Password</p>
        <p>A password reset link would be sent to your whatsApp</p>
        <div class="d-grid mx-3">
          <?php 
            $phone = ltrim($_SESSION['phone'], '\0');
          ?>
          <a href="https://wa.me/234<?= $phone ;?>?text=password_reset%20link%20<?=URLROOT.'/pages/reset_password'?>" 
             class="btn btn-outline-success">
             <i class="fab fa-whatsapp"></i> Continue
          </a>
        </div>
      </div>
    </div>
  </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
