<?php require APPROOT . '/views/inc/header2.php';
      require APPROOT . '/views/inc/sidebar.php'; 
 
flash('msg');?>
<!-- BREADCRUMB-->
<section class="au-breadcrumb m-t-75">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="au-breadcrumb-content">
                        <div class="au-breadcrumb-left">
                            <span class="au-breadcrumb-span">You are here:</span>
                            <ul class="list-unstyled list-inline au-breadcrumb__list">
                                <li class="list-inline-item active">
                                    <a href="<?php echo URLROOT?>/admin">Home</a>
                                </li>
                                <li class="list-inline-item seprate">
                                    <span>/</span>
                                </li>
                                <li class="list-inline-item">
                                    Wallet Funding
                                </li>
                            </ul>
                        </div>
                        <a href="<?php echo URLROOT;?>/users/wallet_history" class="au-btn au-btn-icon au-btn--green">
                            Wallet History</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END BREADCRUMB-->
    <div class="container-fluid">
	  <div class="row">
	    <div class="col-md-6">
	    	<h2 class="fw-bold py-4" id="fund">Wallet Funding</h2>
	    	<!-- <hr class="hr-heading" /> -->
	    	<div class="card">
	    	  <div class=""><img src="<?php echo URLROOT?>/logo/paystack0.png" alt="invoiceOnline-paystack" class="card-img-top">
	    	  </div>
	    	</div>
	    	<p class="lead">
	    	  Due to our commitment in keeping our services affordable and user friendly we have decided to keep our pricing to the minimum. Find below the breakdown of our pricing list.
	    	</p>
	    	<div class="table-responsive">
	    	  <table class="table table-striped text-center">
	    	    <thead>
	    	      <th>Price</th>
	    	      <th>Value</th>
	    	      <th>Action</th>
	    	    </thead>
	    	    <tbody>
	    	      <tr>
	    	        <td>N200</td>
	    	        <td>P25</td>
	    	        <td>
	    	        	<a href="https://paystack.com/pay/9yf8tx0me-" class="btn btn-success">
	    	        		Pay Now
	    	        	</a>
	    	        </td>
	    	      </tr>
	    	      <tr>
	    	        <td>N500</td>
	    	        <td>P100</td>
	    	        <td>
	    	        	<a href="https://paystack.com/pay/q--8r0fuv-" class="btn btn-success">
	    	        		Pay Now
	    	        	</a>
	    	        </td>
	    	      </tr>
	    	      <tr>
	    	        <td>N1000</td>
	    	        <td>P210</td>
	    	       <td><a href="https://paystack.com/pay/2l11chh-wa" class="btn btn-success">
	    	        		Pay Now</a></td>
	    	      </tr>
	    	      <tr>
	    	        <td>N2500</td>
	    	        <td>P525</td>
	    	        <td>
	    	        	<a href="https://paystack.com/pay/j7z5elp7ew" class="btn btn-success">
	    	        		Pay Now
	    	        	</a>
	    	        </td>
	    	      </tr>
	    	      
	    	      <tr>
	    	        <td>N5000</td>
	    	        <td>P1050</td>
	    	        <td>
	    	        	<a href="https://paystack.com/pay/q--8r0fuv-" class="btn btn-success">
	    	        		Pay Now
	    	        	</a>
	    	        </td>
	    	      </tr>
	    	    </tbody>
	    	  </table>
	    	</div>
	    </div>
	  </div><hr/>
    <div class="container-fluid">
    	 <div class="mt-5 py-3">
    	 	<h2 class="fw-bold" id="fund">Trusted Agents</h2>
		  <p class="lead">
		    Alternatively, you can buy <span class="text-warning">POINTS</span> fom our verified agents who form part of the invoice<span class="text-warning">Online </span>team.
		  </p>
    	 </div>
    </div>	
	    		  
 	<div class="row">
      <div class="col-md-4 mb-4">
        <div class="card">
          <div class="m-4"><img src="<?php echo URLROOT?>/logo/agent1.jpg" height="286" alt="invoiceOnline Agent" class="card-img-top rounded-circle">
          </div>
            <hr>
            <div class="card-body">
              <p>
                <strong class="text-muted">Name:</strong> <span class="text-warning">ATUSE MARTINS</span><br>
                <strong class="text-muted">Position:</strong> <span class="text-muted"> Vendor</span><br>
                <strong class="text-muted">Response Rate:</strong> <span class="fw-semibold"> 87% <span style="font-size:11px;">less than 7minutes</span> <br>
              </p>
              <a class="btn btn-success" href="https://wa.me/2347055441207?text=I%20need%20points_on_my_invoiceOnline_wallet"><i class="fab fa-whatsapp" aria-hidden="true"></i> Buy now</a>
            </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card">
          <div class="m-4"><img src="<?php echo URLROOT?>/logo/agent2.jpg" height="286" alt="invoiceOnline Agent" class="card-img-top rounded-circle">
          </div>
            <hr>
            <div class="card-body">
              <p>
                <strong class="text-muted">Name:</strong> <span class="text-warning"> NNELI VICTOR</span><br>
                <strong class="text-muted">Position:</strong> <span class="text-muted"> Vendor</span><br>
                <strong class="text-muted">Response Rate:</strong> <span class="fw-semibold"> 90% <span style="font-size:11px;">less than 5minutes</span> </span><br>
              </p>
              <a class="btn btn-success" href="https://wa.me/2349168655298?text=I%20need%20points_on_my_invoiceOnline_wallet"><i class="fab fa-whatsapp" aria-hidden="true"></i> Buy now</a>
            </div>
        </div>
      </div>
    </div>
   <div class="my-5"></div>
	      
<?php require APPROOT . '/views/inc/footer2.php'; ?>