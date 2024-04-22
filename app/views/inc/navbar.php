
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3 border-bottom border-primary">
  <div class="container">
    <a class="navbar-brand" href="<?= URLROOT;?>/pages"><?php echo SITENAME; ?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo URLROOT; ?>"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT; ?>/posts/add"><i class="fa fa-plus" aria-hidden="true"></i> Add Transaction</a>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto">
      <?php if(isset($_SESSION['user_id'])) : ?>
        <li class="nav-item">
          <a class="nav-link" href="https://wa.me/2349168655298"><i class="fab fa-whatsapp" aria-hidden="true"></i> Whatapp</a>
        </li>
          <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT; ?>/users/logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
        </li>
      <?php else : ?>
        <!-- <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT; ?>/users/register">Register</a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT; ?>/users/login">Login</a>
        </li>
      <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>