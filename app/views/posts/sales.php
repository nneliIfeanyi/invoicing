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
                                   Sales
                                </li>
                            </ul>
                        </div>
                        <a href="<?php echo URLROOT;?>/inventory" class="au-btn au-btn-icon au-btn--green">
                            go to invetory</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END BREADCRUMB-->
    <div class="container-fluid">
      <div class="row">
          <div class="col-md-12">
              <!-- DATA TABLE -->
              <h3 class="py-3">Sales Monthly View
                (<span class="text-warning"><?= date('M');?></span>)
              </h3>
              <div class="row">
                <!-- <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Total quantity sold</strong>
                        </div>
                        <div class="card-body">
                            <p class="card-text font-weight-bold"><?= $data['all_qty'];?>
                            </p>
                        </div>
                    </div>
                </div> -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Total amount sold</strong>
                        </div>
                        <div class="card-body">
                            <p class="card-text font-weight-bold">N<?= put_coma($data['total']);?>
                            </p>
                        </div>
                    </div>
                </div>
              </div>
              <div class="table-responsive table-responsive-data2">
                  <table class="table table-data2">
                      <thead>
                          <tr>
                            <!-- <th>#</th> -->
                              <th>Qty</th>
                              <th>Goods Sold</th>
                              <th>Rate</th>
                              <th>Amount</th>
                              <th>Date</th>
                              <th>TimeStamp</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php $count =1; foreach($data['sales'] as $sales):?>
                          <tr class="tr-shadow">
                              <!-- <td><?= $count;?></td> -->
                              <td><?= $sales->qty;?></td>
                              <td>
                                  <span class="block-email"><?= $sales->dsc;?></span>
                              </td>
                              <td class="desc"><?= $sales->rate;?></td>
                           
                              <td>
                               <?= $sales->amount;?>
                              </td>
                              <td>
                                <?= $sales->t_date.' '.$sales->t_month;?> 
                              </td>
                              <td><?= $sales->t_time;?></td>
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
  </div>
</div>


<?php require APPROOT . '/views/inc/footer2.php'; ?>

