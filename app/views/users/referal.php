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
                        <a href="<?php echo URLROOT;?>/pages/sell" class="au-btn au-btn-icon au-btn--green">
                           Sell points</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END BREADCRUMB-->
    <?php if($data['ref_id'] === 'tips'):?>
      <div class="container-fluid">
      <div class="row">
          <div class="col-md-12">
              <h3 class="py-3">Referals Tips</h3>
              <div class="alert alert-primary" role="alert">
                Ensure the Business you invited funds their wallet with at least <span class="font-weight-bold">100Points.</span> Then you get <span class="font-weight-bold">100% Points.</span> If 1000points then you get 1000points instantly.
              </div>
              <div class="alert alert-secondary" role="alert">
                You will keep earning <span class="text-warning">30% points</span> from your referals for any wallet funding transaction they did, that means more <span class="font-weight-bold">points</span> for you.
              </div>
              <div class="alert alert-warning" role="alert">
               As you grow your points this way, we buy <span class="font-weight-bold">1000Points</span> for N2000... or <span class="font-weight-bold">2000Points</span> for N4000, like so.
              </div>
              <a href="<?php echo URLROOT;?>/users/referal/<?= $_SESSION['ref_id'];?>" class="btn btn-success">Continue <i class="fas fa-arrow-right"></i></a>
          </div>
      </div>
    </div>
    <?php else:?>
      <div class="container-fluid">
      <div class="row">
          <div class="col-md-12">
              <!-- DATA TABLE -->
              <h3 class="py-3">My Referals</h3>
              
              <div class="table-responsive table-responsive-data2">
                  <table class="table table-data2">
                      <thead>
                          <tr>
                            <th>#</th>
                            <th>Biz Name</th>
                            <th>Email</th>
                            <th>joined at</th>
                            <th>status</th>
                            <th>Points earned</th>
                            <th></th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php $count =1; foreach($data['referals'] as $user):
                         $initial_funding = $this->userModel->getInitial_funding2($user->id);
                        ?>
                          <tr class="tr-shadow">
                              <td><?= $count;?></td>
                              <td><?= $user->bizname;?></td>
                              <td>
                                  <span class="block-email"><?= $user->email;?></span>
                              </td>
                              <td class="desc"><?= $user->bizcreated_at;?></td>
                            
                              <td>
                                <?php if(!empty($initial_funding->initial)):?>
                                  <span>Active</span>
                                <?php else:?>
                                  <span>Not Active</span>
                                <?php endif;?>
                              </td>


                              <td>
                                <?php if($initial_funding->initial == '210' && $user->claimed == 'false'):?>
                                  <span class="text-warning">P</span>200
                                <?php elseif($initial_funding->initial == '210' && $user->claimed == 'true'):?>
                                  <span style="text-decoration: line-through;"><span class="text-warning">P</span>200

                                <?php elseif($initial_funding->initial == '100' && $user->claimed == 'false'):?>
                                 <span class="text-warning">P</span>100
                                <?php elseif($initial_funding->initial == '100' && $user->claimed == 'true'):?>
                                  <span style="text-decoration: line-through;"><span class="text-warning">P</span>100

                                <?php elseif($initial_funding->initial == '1050' && $user->claimed == 'false'):?>
                                 <span class="text-warning">P</span>1000
                                <?php elseif($initial_funding->initial == '1050' && $user->claimed == 'true'):?>
                                  <span style="text-decoration: line-through;"><span class="text-warning">P</span>1000

                                <?php elseif($initial_funding->initial == '525' && $user->claimed == 'false'):?>
                                 <span class="text-warning">P</span>500
                                <?php elseif($initial_funding->initial == '525' && $user->claimed == 'true'):?>
                                  <span style="text-decoration: line-through;"><span class="text-warning">P</span>500
                                <?php else:?>
                                  <spa>Not Active</span>
                                <?php endif;?>
                              </td>

                              <td>
                                  <div class="table-data-feature">
                                    <?php if($user->claimed == 'false' && !empty($initial_funding->initial)):?>

                                      <form action="<?php echo URLROOT; ?>/users/points_claim" method="post">
                                        <input type="hidden" name="id" value="<?= $user->id;?>">
                                        <button type="submit" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Claim Points to your wallet">
                                            Claim
                                        </button>
                                      </form>

                                      <?php elseif($user->claimed == 'true'):?>
                                        <span class="text-danger">Claimed</span>
                                      <?php endif;?>
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
    <?php endif;?>


<?php require APPROOT . '/views/inc/footer2.php'; ?>

