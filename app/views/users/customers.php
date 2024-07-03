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
                                    <a href="<?php echo URLROOT?>/users">Home</a>
                                </li>
                                <li class="list-inline-item seprate">
                                    <span>/</span>
                                </li>
                                <li class="list-inline-item">
                                   Customers
                                </li>
                            </ul>
                        </div>
                        <a href="<?php echo URLROOT;?>/posts/sales" class="au-btn au-btn-icon au-btn--green">
                          <i class="fa fa-book"></i>Sales book</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END BREADCRUMB-->
<!-- Today Sales -->
            <div class="">
               <h3 class="py-3">My Customers</h3>
                <div class="row">
                  <?php if($data['customers_count'] > 10):?>
                 <div class="col-md-6">
                     <div class="card">
                          <div class="card-header">
                              <strong class="card-title">Filter records</strong>
                          </div>
                          <div class="p-2">
                             <input class="form-control" placeholder="Search for name or phone" oninput="w3.filterHTML('#id01', '.item', this.value)">
                          </div>
                      </div>
                  </div>
                  <?php endif;?>
                  <!-- <div class="col-md-6">
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
                  </div> -->
                </div>
                <div class="table-responsive table-responsive-data2">
                    <table class="table table-data2" id="id01">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Dept</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php foreach($data['customers'] as $sales):
                          $dept = $sales->t_total - $sales->paid;?>
                            <tr class="tr-shadow item">
                                <td><?= $sales->name;?></td>
                                <td style="cursor: pointer;" data-toggle="modal" data-target="#remind<?= $sales->t_id;?>">
                                    <span class="block-email"><?= $sales->phone;?></span>
                                </td>
                                <td class="desc"><?= $sales->address;?></td>
                             
                                <td>
                                    <?php if($dept > 0):?>
                                        <span class="text-danger">
                                            &#8358;<?= put_coma($dept);?>
                                        </span>
                                    <?php else:?>
                                        <span class="">
                                            &#8358;<?= put_coma($dept);?>
                                        </span>
                                    <?php endif;?>
                                </td>
                            
                                <td>
                                  <div class="table-data-feature">
                                      <a href="<?php echo URLROOT;?>/posts/preview/<?php echo $sales->t_id;?>" class="item">
                                          <i class="zmdi zmdi-mail-send"></i>
                                      </a>
                                  </div>  
                                </td>
                            </tr>
                            <tr class="spacer"></tr>
                            <!--Reminder  Modal -->
                              <div class="modal fade" id="remind<?= $sales->t_id;?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-warning" id="mediumModalLabel">Contact <?= $sales->name;?></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="border-bottom py-2"><a href="<?php echo URLROOT;?>/posts/remind/whatsapp?t_id=<?= $sales->t_id;?>" class="text-muted "><i class="fab fa-whatsapp"></i> &nbsp;Send whatsapp message</a></p>
                                            <p class="border-bottom py-2"><a href="<?php echo URLROOT;?>/posts/remind/sms?t_id=<?= $sales->t_id;?>" class="text-muted "><i class="fa fa-comment"></i>&nbsp; Send sms</a></p>
                                            <p class="pt-2"><a href="tel:<?php echo $sales->phone; ?>" class="text-muted "><i class="fa fa-phone"></i> &nbsp;Put a call across</a></p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                          <?php endforeach; ?>  
                        </tbody>
                    </table>
                </div>
                <!-- END DATA TABLE -->
            </div>



<?php require APPROOT . '/views/inc/footer2.php'; ?>