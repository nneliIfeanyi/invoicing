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
                                    Points
                                </li>
                            </ul>
                        </div>
                        <a href="<?php echo URLROOT;?>/admin/usertype" class="au-btn au-btn-icon au-btn--green">
                            go to Usertype</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END BREADCRUMB-->

<div class="main-content">
  <div class="section__content section__content--p30">
    <div class="container-fluid">
      <div class="row">
          <div class="col-md-12">
              <!-- DATA TABLE -->
              <h3 class="title-5 m-b-35">Update points</h3>
              <!-- <div class="table-data__tool">
                  <div class="table-data__tool-left">
                      <div class="rs-select2--light rs-select2--md">
                          <select class="js-select2" name="property">
                              <option selected="selected">All Properties</option>
                              <option value="">Option 1</option>
                              <option value="">Option 2</option>
                          </select>
                          <div class="dropDownSelect2"></div>
                      </div>
                  </div>
              </div> -->
              <div class="table-responsive table-responsive-data2">
                  <table class="table table-data2">
                      <thead>
                          <tr>
                            <th>#</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Points</th>
                              <th>value</th>
                              <th></th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php $count =1; foreach($data['users'] as $user):?>
                          <tr class="tr-shadow">
                              <td><?= $count;?></td>
                              <td><?= $user->bizname;?></td>
                              <td>
                                  <span class="block-email"><?= $user->email;?></span>
                              </td>
                              <td class="desc">P<?= $user->points;?></td>
                            <form action="<?php echo URLROOT; ?>/admin/points_update" method="post">
                              <td>
                                <input type="hidden" name="id" value="<?= $user->id;?>">
                                <input type="hidden" name="name" value="<?= $user->bizname;?>">
                                <input type="number" name="points" style="width: 60px;">
                              </td>
                              <td>
                                  <div class="table-data-feature">
                                      <button class="item" data-toggle="modal" data-placement="top" title="Send Points">
                                          <i class="zmdi zmdi-mail-send"></i>
                                      </button>
                                      </form>
                                  </div>
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
  </div>
</div>


<?php require APPROOT . '/views/inc/footer2.php'; ?>

