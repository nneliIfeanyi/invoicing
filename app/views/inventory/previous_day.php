<?php require APPROOT . '/views/inc/header2.php';
      require APPROOT . '/views/inc/sidebar2.php'; 

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
                                    <a href="<?php echo URLROOT?>/inventory">Inventory</a>
                                </li>
                                <li class="list-inline-item seprate">
                                    <span>/</span>
                                </li>
                                <li class="list-inline-item">
                                    Previous Sales
                                </li>
                            </ul>
                        </div>
                         <form action="<?php echo URLROOT;?>/inventory/download_today" method="post">
                            <input type="hidden" name="date" value="<?= $_POST['day'].' '.$_POST['date'];?>">
                            <input type="hidden" name="month" value="<?= $_POST['month'];?>">
                            <input type="hidden" name="year" value="<?= $_POST['year'];?>">
                                <button type="submit" class="au-btn au-btn-icon au-btn--green">
                                    <i class="fas fa-download"></i>Download sales record</button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END BREADCRUMB-->
  
    <div class="container-fluid">
        <div class="row">
            <h5 class="py-3 col-md-6">Sales Record For 
                (<span class="text-warning"><?= $_POST['day'].' '.$_POST['date'].' '.$_POST['month'].' '.$_POST['year'];?></span>)
            </h5>
            <p class="col-md-6 py-2">
                <a href="<?php echo URLROOT;?>/inventory/today" class="pull-right btn btn-sm btn-outline-dark">
                    <i class="fas fa-arrow-left"></i> Back to today</a>
            </p>
        </div>
      <div class="row">
        <div class="col-6 shadow">
        <h3 class="py-5 text-center">Goods Sold<br>
          <span class="font-weight-bold text-warning">
            <?php if(empty($data['stock'])):?>
                0
            <?php else:?>
            <?= $data['stock'];?>
            <?php endif;?>
            </span>
          </h3>
        </div>
        <div class="col-6 shadow"><h3 class="py-5 text-center">Amount Sold<br>
          <span class="font-weight-bold text-warning">
            <?php if(!empty($data['capital'])):?>
            N<?= put_coma($data['capital']);?>
            <?php else:?>
                N0.00
            <?php endif;?>
            </span>
          </h3>
        </div>
      </div>
      <div class="row">
          <div class="col-md-12">
              <!-- DATA TABLE -->
              <div class="table-responsive table-responsive-data2">
                  <table class="table table-data2">
                      <thead>
                          <tr>
                            <th>SN</th>
                            <th>Qty</th>
                            <th>Description of goods</th>
                            <th>Rate</th>
                            <th>Amount</th>
                            <th>TimeStamp</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php $count =1; foreach($data['goods'] as $goods):?>
                          <tr class="tr-shadow">
                              <td><?= $count;?></td>
                              
                              <td>
                                  <span class="block-email"><?= $goods->qty;?></span>
                              </td>
                              <td><?= $goods->dsc;?></td>
                              <td><?= $goods->rate;?></td>
                              <td>
                                  <span class="status--process"><?= $goods->amount;?></span>
                              </td>
          
                              <td>
                                <?= $goods->t_time;?> 
                              </td>
                            
                          </tr>
                          <tr class="spacer"></tr>
                        <?php $count++; endforeach; ?>  
                      </tbody>
                  </table>
              </div>
              <!-- END DATA TABLE -->
          </div>
      </div>


      <!-- modal medium -->
      <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">Navigate to a previous sales record</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="<?php echo URLROOT;?>/submissions/previous_day">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6 col-md-3">
                                <select name="day" required class="form-control mb-3">
                                    <option value="">Select day</option>
                                    <?php foreach($data['day'] as $day):?>
                                        <option value="<?= $day->days;?>"><?= $day->days;?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="col-6 col-md-3">
                                <select name="date"  required class="form-control mb-3">
                                    <option value="">Select date</option>
                                    <?php foreach($data['date'] as $date):?>
                                        <option value="<?= $date->dates;?>"><?= $date->dates;?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class=" col-6 col-md-3">
                                <select name="month" class="form-control mb-3">
                                    <option value="<?= date('M');?>"><?= date('M');?></option>
                                    <?php foreach($data['month'] as $month):?>
                                        <option value="<?= $month->months;?>"><?= $month->months;?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class=" col-6 col-md-3">
                                <select name="year" class="form-control mb-3">
                                    <option value="<?= date('Y');?>"><?= date('Y');?></option>
                                    <?php foreach($data['year'] as $year):?>
                                        <option value="<?= $year->t_year;?>"><?= $year->t_year;?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success px-5">Navigate</button>
                    </div>
                </form>
            </div>
        </div>
      </div>
<!-- end modal medium -->

</div>

<?php require APPROOT . '/views/inc/footer2.php'; ?>

