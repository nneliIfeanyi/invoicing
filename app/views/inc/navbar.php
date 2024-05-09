
<nav class="navbar navbar-expand-lg p-2 navbar-dark bg-dark mb-3 sticky-top border-bottom border-primary">
  <div class="container">
    <a class="navbar-brand" href="<?= URLROOT;?>/pages/index">Invoice<span class="text-primary">Online</span></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <?php if(isset($_SESSION['user_id'])) : ?>
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo URLROOT;?>/pages/index">Home</a>
        </li>
        <li class="nav-item active">
          <span class="nav-link"><span class="text-primary">P</span><?= $_SESSION['user_points']; ?></span>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT; ?>/posts/add/1">Add Transaction</a>
        </li>
         <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT; ?>/users/profile">Profile</a>
        </li><!-- 
        <li class="nav-item">
          <a class="nav-link" href="https://wa.me/2349168655298"><i class="fab fa-whatsapp" aria-hidden="true"></i> Whatapp</a>
        </li> -->
          <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT; ?>/users/logout">Logout</a>
        </li>
      </ul>
      <?php else : ?>
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo URLROOT;?>/pages/index">Home</a>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/users/login">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/users/register">Register</a>
          </li>
       </ul>
      <?php endif; ?>
     
    </div>
  </div>
</nav>