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
                                    <a href="<?php echo URLROOT?>/posts">Home</a>
                                </li>
                                <li class="list-inline-item seprate">
                                    <span>/</span>
                                </li>
                                <li class="list-inline-item">
                                   Sales Book
                                </li>
                            </ul>
                        </div>
                        <a href="<?php echo URLROOT;?>/users/customers" class="au-btn au-btn-icon au-btn--green">
                          <i class="fa fa-user"></i>Customers</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END BREADCRUMB-->
<section class="tab-section">
    <div class="default-tab">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
               
                <a class="nav-item nav-link text-muted font-weight-light" id="nav-yesterday-tab" data-toggle="tab" href="#nav-yesterday" role="tab" aria-controls="nav-profile"
                 aria-selected="false">Yesterday</a>

                <a class="nav-item nav-link text-muted font-weight-light active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home"
                 aria-selected="true">Today
                </a>

                <a class="nav-item nav-link text-muted font-weight-light" id="nav-week-tab" data-toggle="tab" href="#nav-week" role="tab" aria-controls="nav-home"
                 aria-selected="true">This Week
                </a>

                 <a class="nav-item nav-link text-muted font-weight-light" id="nav-month-tab" data-toggle="tab" href="#nav-month" role="tab" aria-controls="nav-contact"
                 aria-selected="false">This Month</a>

                 <a style="cursor: pointer;" class="nav-item nav-link text-muted font-weight-light" data-toggle="modal" data-target="#goto" role="modal" aria-selected="true"><i class="fa fa-arrow-left"></i> GoTo
                </a>

            </div>
        </nav>
        <div class="tab-content pl-3 pt-2" id="nav-tabContent">
        <!-- Today Sales -->
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
               <h3 class="py-3">Today's Sales 
                  (<span class="text-warning"><?= date('D-jS-M-Y');?></span>)
                </h3>
                <div class="row">
                  <?php if($data['tocount'] > 10):?>
                 <div class="col-md-6">
                     <div class="card">
                          <div class="card-header">
                              <strong class="card-title">Filter records</strong>
                          </div>
                          <div class="p-2">
                             <input class="form-control" placeholder="Search for services or date" oninput="w3.filterHTML('#id01', '.item', this.value)">
                          </div>
                      </div>
                  </div>
                  <?php endif;?>
                  <div class="col-md-6">
                      <div class="card">
                          <div class="card-header">
                              <strong class="card-title">Total amount sold</strong>
                          </div>
                          <div class="p-3">
                          <?php if(!empty($data['today_total'])):?>
                              <p class="card-text font-weight-bold">N<?= put_coma($data['today_total']);?>
                              </p>
                          <?php endif;?>
                          </div>
                      </div>
                  </div>
                </div>
                <div class="table-responsive table-responsive-data2">
                    <table class="table table-data2" id="id01">
                        <thead>
                            <tr>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Date</th>
                                <th>TimeStamp</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php foreach($data['today_sales'] as $sales):?>
                            <tr class="tr-shadow item">
                                <td>
                                    <span class="block-email"><?= $sales->dsc;?></span>
                                </td>
                                <td>
                                 <?= $sales->amount;?>
                                </td>
                                <td>
                                  <?= $sales->t_date.' '.$sales->t_month;?> 
                                </td>
                                <td><?= $sales->t_time;?></td>
                            </tr>
                            <tr class="spacer"></tr>
                          <?php endforeach; ?>  
                        </tbody>
                    </table>
                </div>
                <!-- END DATA TABLE -->
            </div> <!-- Today Sales End -->


            <!-- This week Sales -->
            <div class="tab-pane fade show" id="nav-week" role="tabpanel" aria-labelledby="nav-week-tab">
                <?php 

                    $week_start = date('D-jS-M', strtotime('last monday'));
                    $week_end = date('D-jS-M', strtotime('this sunday'));
                ?>
               <h3 class="py-3">From
                  (<span class="text-warning"><?= $week_start;?></span>) To (<span class="text-warning"><?= $week_end;?></span>)
                </h3>
                <div class="row">
                  <?php if($data['weekcount'] > 10):?>
                 <div class="col-md-6">
                     <div class="card">
                          <div class="card-header">
                              <strong class="card-title">Filter records</strong>
                          </div>
                          <div class="p-2">
                             <input class="form-control" placeholder="Search services or date" oninput="w3.filterHTML('#id01', '.item', this.value)">
                          </div>
                      </div>
                  </div>
                  <?php endif;?>
                  <div class="col-md-6">
                      <div class="card">
                          <div class="card-header">
                              <strong class="card-title">Total amount sold</strong>
                          </div>
                          <div class="p-3">
                          <?php if(!empty($data['week_total'])):?>
                              <p class="card-text font-weight-bold">N<?= put_coma($data['week_total']);?>
                              </p>
                          <?php endif;?>
                          </div>
                      </div>
                  </div>
                </div>
                <div class="table-responsive table-responsive-data2">
                    <table class="table table-data2" id="id01">
                        <thead>
                            <tr>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Date</th>
                                <th>TimeStamp</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php foreach($data['week_sales'] as $sales):?>
                            <tr class="tr-shadow item">
                                <td>
                                    <span class="block-email"><?= $sales->dsc;?></span>
                                </td>
                                <td>
                                 <?= $sales->amount;?>
                                </td>
                                <td>
                                  <?= $sales->t_date.' '.$sales->t_month;?> 
                                </td>
                                <td><?= $sales->t_time;?></td>
                            </tr>
                            <tr class="spacer"></tr>
                          <?php endforeach; ?>  
                        </tbody>
                    </table>
                </div>
                <!-- END DATA TABLE -->
            </div> <!-- This week Sales End -->
           

           <!-- Yesterday Sales -->
            <div class="tab-pane fade show" id="nav-yesterday" role="tabpanel" aria-labelledby="nav-yesterday-tab">
               <h3 class="py-3">Yesterday's Sales 
                  (<span class="text-warning"><?= $data['yesterday'];?></span>)
                </h3>
                <div class="row">
                  <?php if($data['yestercount'] > 10):?>
                 <div class="col-md-6">
                     <div class="card">
                          <div class="card-header">
                              <strong class="card-title">Filter records</strong>
                          </div>
                          <div class="p-2">
                             <input class="form-control" placeholder="Search for services or date" oninput="w3.filterHTML('#id01', '.item', this.value)">
                          </div>
                      </div>
                  </div>
                  <?php endif;?>
                  <div class="col-md-6">
                      <div class="card">
                          <div class="card-header">
                              <strong class="card-title">Total amount sold</strong>
                          </div>
                          <div class="p-3">
                            <?php if(!empty($data['yesterday_total'])):?>
                              <p class="card-text font-weight-bold">N<?= put_coma($data['yesterday_total']);?>
                              </p>
                          <?php endif;?>
                          </div>
                      </div>
                  </div>
                </div>
                <div class="table-responsive table-responsive-data2">
                    <table class="table table-data2" id="id01">
                        <thead>
                            <tr>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Date</th>
                                <th>TimeStamp</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php foreach($data['yesterday_sales'] as $sales):?>
                            <tr class="tr-shadow item">
                                <td>
                                    <span class="block-email"><?= $sales->dsc;?></span>
                                </td>
                                <td>
                                 <?= $sales->amount;?>
                                </td>
                                <td>
                                  <?= $sales->t_date.' '.$sales->t_month;?> 
                                </td>
                                <td><?= $sales->t_time;?></td>
                            </tr>
                            <tr class="spacer"></tr>
                          <?php endforeach; ?>  
                        </tbody>
                    </table>
                </div>
                <!-- END DATA TABLE -->
            </div> <!-- Yesterday Sales End -->

            <!-- Current Month Sales -->
            <div class="tab-pane fade" id="nav-month" role="tabpanel" aria-labelledby="nav-month-tab">
               <h3 class="py-3">Current Month Sales 
                  (<span class="text-warning"><?= date('M');?></span>)
                </h3>
                <div class="row">
                <?php if($data['monthcount'] > 10):?>
                 <div class="col-md-6">
                     <div class="card">
                          <div class="card-header">
                              <strong class="card-title">Filter records</strong>
                          </div>
                          <div class="p-2">
                             <input class="form-control" placeholder="Search for services or date" oninput="w3.filterHTML('#id01', '.item', this.value)">
                          </div>
                      </div>
                  </div>
                  <?php endif;?>
                  <div class="col-md-6">
                      <div class="card">
                          <div class="card-header">
                              <strong class="card-title">Total amount sold</strong>
                          </div>
                          <div class="p-3">
                              <?php if(!empty($data['total'])):?>
                              <p class="card-text font-weight-bold">N<?= put_coma($data['total']);?>
                              </p>
                            <?php endif;?>
                          </div>
                      </div>
                  </div>
                </div>
                <div class="table-responsive table-responsive-data2">
                    <table class="table table-data2" id="id01">
                        <thead>
                            <tr>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Date</th>
                                <th>TimeStamp</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php foreach($data['sales'] as $sales):?>
                            <tr class="tr-shadow item">
                                <td>
                                    <span class="block-email"><?= $sales->dsc;?></span>
                                </td>
                                <td>
                                 <?= $sales->amount;?>
                                </td>
                                <td>
                                  <?= $sales->t_date.' '.$sales->t_month;?> 
                                </td>
                                <td><?= $sales->t_time;?></td>
                            </tr>
                            <tr class="spacer"></tr>
                          <?php endforeach; ?>  
                        </tbody>
                    </table>
                </div>
                <!-- END DATA TABLE -->
            </div> <!-- Current Month Sales -->
        </div><!-- End Tab Content -->
    </div>
</section>

 <!--GOTO  Modal -->
  <div class="modal fade" id="goto" tabindex="-1" role="dialog" aria-labelledby="GotoModal" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3>COMING SOON...</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- <div class="modal-body">
               Coming Soon.. 
            </div> -->
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
            </div> -->
        </div>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer2.php'; ?>

