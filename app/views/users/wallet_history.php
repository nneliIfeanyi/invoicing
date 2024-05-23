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
                                    Wallet History
                                </li>
                            </ul>
                        </div>
                        <a href="<?php echo URLROOT;?>/pages/subscribe" class="au-btn au-btn-icon au-btn--green">
                            Fund wallet</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END BREADCRUMB-->
<div class="container-fluid">
    <h5 class="py-5">Wallet Transactions</h5>
    <div class="row">
          <div class="col-md-12">
              <div class="table-responsive table-responsive-data2">
                  <table class="table table-data2">
                      <thead>
                          <tr>
                            <th>#</th>
                              <th>Transaction Type</th>
                              <th>Points</th>
                              <th>Description</th>
                              <th>TimeStamp</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php $count =1; foreach($data['history'] as $user):?>
                          <tr class="tr-shadow">

                              <td><?= $count;?></td>
                              <td><?= $user->type;?></td>
                              <td>
                                  <span class="block-email"><span class="text-warning">P</span><?= $user->points;?></span>
                              </td>
                            
                              <td>
                                  <span class="status--process"><?= $user->dsc;?></span>
                              </td>
                              <td><?= $user->create_time;?></td>
                              
                          </tr>
                          <tr class="spacer"></tr>
                        <?php $count++; endforeach; ?>  
                      </tbody>
                  </table>
              </div>
              <!-- END DATA TABLE -->
          </div>
      </div>
</div>

<div class="my-5"></div>
          
<?php require APPROOT . '/views/inc/footer2.php'; ?>