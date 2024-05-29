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
                                    Initial Stock
                                </li>
                            </ul>
                        </div>
                        <a href="<?php echo URLROOT;?>/inventory/current" class="au-btn au-btn-icon au-btn--green">
                          go to  current stock</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END BREADCRUMB-->
  
    <div class="container-fluid">
        <div class="text-center text-warning py-2 font-weight-bold"><span style="font-size: 17px">Previous Stock</span></div>
      <div class="row">
        <div class="col-6 shadow"><h3 class="py-3 text-center">Inventory Goods<br>
          <span class="font-weight-bold text-warning">
            <?php if(!empty($data['stock'])):?>
                <?= $data['stock'];?>
            <?php else:?>
                0
            <?php endif;?>
          </span>
          </h3>
        </div>
        <div class="col-6 shadow"><h3 class="py-3 text-center">Stock Capital<br>
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
                            <th>inStock</th>
                            <th>Description of goods</th>
                            <th>Unit price</th>
                            <th>Amount</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php $count =1; foreach($data['goods'] as $goods):?>
                          <tr class="tr-shadow">
                              <td><?= $count;?></td>
                              
                              <td>
                                  <span class="block-email"><?= $goods->qty;?></span>
                              </td>
                              <td><?= $goods->name;?></td>
                              <td><?= $goods->rate;?></td>
                              <td>
                                  <span class="status--process"><?= $goods->amount;?></span>
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
    </div>

<?php require APPROOT . '/views/inc/footer2.php'; ?>

