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
                                    Referals
                                </li>
                            </ul>
                        </div>
                        <a href="<?php echo URLROOT;?>/users/account" class="au-btn au-btn-icon au-btn--green">
                            Accounting</a>
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
              <h3 class="title-5 m-b-35">My Referals</h3>
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
                            <th>Biz Name</th>
                            <th>Email</th>
                            <th>joined at</th>
                            <th>status</th>
                            <th>commission</th>
                            <th></th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php $count =1; foreach($data['referals'] as $user):?>
                          <tr class="tr-shadow">
                              <td><?= $count;?></td>
                              <td><?= $user->bizname;?></td>
                              <td>
                                  <span class="block-email"><?= $user->email;?></span>
                              </td>
                              <td class="desc"><?= $user->bizcreated_at;?></td>
                            
                              <td>
                                <?php if($user->points > 25):?>
                                  <span>Active</span>
                                <?php else:?>
                                  <span>Not Active</span>
                                <?php endif;?>
                              </td>
                              <td>
                                <?php if($user->points > 25):?>
                                  <span class="text-warning">P</span>25
                                <?php else:?>
                                  <span>Not Active</span>
                                <?php endif;?>
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

