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
                                    Current Stock
                                </li>
                            </ul>
                        </div>
                        <a href="<?php echo URLROOT;?>/inventory/add_goods" class="au-btn au-btn-icon au-btn--green">
                            <i class="zmdi zmdi-plus"></i>Add goods</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END BREADCRUMB-->
  
    <div class="container-fluid">
        <div class="text-center text-warning py-2 font-weight-bold"><span style="font-size: 17px"><?= date('M-Y') ;?></span></div>
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
            <form action="<?php echo URLROOT;?>/submissions/close_stock" method="POST">
              <div class="table-responsive table-responsive-data2">
                  <table class="table table-data2">
                      <thead>
                          <tr>
                            <th>SN</th>
                            <th>inStock</th>
                            <th>Description of goods</th>
                            <th>Unit price</th>
                            <th>Amount</th>
                            <th></th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php $count =1; foreach($data['goods'] as $goods):?>
                          <tr class="tr-shadow">
                              <td><?= $count;?></td>
                              
                              <td>
                                    <input type="hidden" name="qty[]" value="<?= $goods->qty;?>">
                                  <span class="block-email"><?= $goods->qty;?></span>
                              </td>
                              <td>
                                <?= $goods->name;?>
                                  <input type="hidden" name="name[]" value="<?= $goods->name;?>">  
                                </td>
                              <td>
                                <?= $goods->rate;?>
                                <input type="hidden" name="rate[]" value="<?= $goods->rate;?>">
                                </td>
                              <td>
                                    <input type="hidden" name="amount[]" value="<?= $goods->amount;?>">
                                  <span class="status--process"><?= $goods->amount;?></span>
                              </td>
                                <input type="hidden" name="i_month[]" value="<?= date('M');?>">
                                <input type="hidden" name="i_year[]" value="<?= date('Y');?>">
                              <td>
                                  <div class="table-data-feature">
                                    <a href="<?php echo URLROOT;?>/inventory/edit/<?= $goods->id;?>" class="btn btn-sm btn-success" >
                                        <i class="zmdi zmdi-edit"></i>Edit
                                    </a>
                                  </div>
                              </td>
                            
                          </tr>
                          <tr class="spacer"></tr>
                        <?php $count++; endforeach; ?>  
                      </tbody>
                  </table>
                  <div class="my-3 text-center"><input type="submit" name="submit" class="btn btn-outline-secondary btn-lg px-4" value="Close this stock"></div>
              </div>
            </form>
              <!-- END DATA TABLE -->
          </div>
      </div>
    </div>

<?php require APPROOT . '/views/inc/footer2.php'; ?>

