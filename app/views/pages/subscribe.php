<?php require APPROOT . '/views/inc/header.php'; ?>
    <div class="row">
    	<div class="col-12 col-lg-9 mx-auto">
	      <h4 class="text-primary m-0">You are currently on <?= $_SESSION['user_status'];?> plan</h4>
	      <?php if($_SESSION['user_status'] == 'freeTrail'):?>
	  
      		<p class="text-muted">
      			<i class="fa fa-info-circle"></i> Valid till 
      			<span class="fw-bold"> <?= $_SESSION['renew']; ?></span>
      		</p>
	      <?php elseif($_SESSION['user_status'] == 'expired'):?>
	      	<p class="text-muted">
	      		<i class="fa fa-info-circle"></i> You would not be able to generate an invoice, but you can still record all your transactions.<br>To continue using this service, please kindly subscribe
	      	</p>
	      <?php else:?>
	      	<p class="text-muted">
	      		<i class="fa fa-info-circle"></i> Valid till 
	      		<span class="fw-bold"> <?= $_SESSION['renew']; ?></span>
	      	</p>
	      <?php endif;?>
	      <div class="row">
	      	<div class="col-md-6">
	      		<div class="card rounded-4 shadow-lg border-0 mb-5">
	      			<div class="card-body">
	      				<div class="">
	      					<h4 class="fw-bold m-0">Monthly</h4>
	      					<p class="text-success">Subscription</p>
	      				</div>
	      				<h2 class="fs-1 fw-bold mt-4 mb-5">&#8358;1,100</h2>
	      				<!-- <ul class="list-group list-group-flush fs-5 mb-5">
	      					<li class="list-group-item ">
	      						<i class="fa fa-check"></i> Unlimited invoicing
	      					</li>
	      					<li class="list-group-item ">
	      						<i class="fa fa-check"></i> Business logo upload
	      					</li>
	      				</ul> -->
	      				<div class="d-grid">
	      					<a href="https://paylink.alero.africa/v1/pl/d41a230f-2e8a-4d02-88a1-dffc23e786ec" class="btn btn-dark rounded-4 mb-4">
	      						Subscribe
	      					</a>
	      				</div>
	      			</div>
	      		</div>
	      	</div>
	      	<!-- Card 2 -->
	      	<div class="col-md-6">
	      		<div class="card rounded-4 text-bg-dark shadow-lg border-0 mb-5">
	      			<div class="card-body">
	      				<div class="">
	      					<h4 class="fw-bold m-0">Yearly</h4>
	      					<p class="text-success">Subscription</p>
	      				</div>
	      				<h2 class="fs-1 fw-bold mt-4 mb-5">&#8358;10,500</h2>
	      				<!-- <ul class="list-group list-group-flush fs-5 mb-5">
	      					<li class="list-group-item text-bg-dark">
	      						<i class="fa fa-check"></i> Unlimited invoicing
	      					</li>
	      					<li class="list-group-item text-bg-dark">
	      						<i class="fa fa-check"></i> Business logo upload
	      					</li>
	      					<li class="list-group-item text-bg-dark">
	      						<i class="fa fa-percent"></i>12 Off &nbsp;<s class="text-danger">-&#8358;1500</s>
	      					</li>
	      				</ul> -->
	      				<div class="d-grid">
	      					<a href="https://paylink.alero.africa/v1/pl/fdcb16de-0b1c-4d9c-bbe3-3d61424806c8" class="btn btn-light rounded-4 mb-4">
	      						Subscribe
	      					</a>
	      				</div>
	      			</div>
	      		</div>
	      	</div>
	      </div>
	      <div class="row">
	      	<div class="col-md-9 text-center mb-5 mx-auto">
	      		<a href="javascript:void();" onclick="history.back()" class="btn btn-outline-success">
	      			<i class="fa fa-backward"></i> Go back
	      		</a>
	      	</div>
	      	
	      </div>
	  </div>
    </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>