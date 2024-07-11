<?php require APPROOT . '/views/inc/admin/header.php'; ?>
<?= flash('msg');?>
<div class="row">
  <div class="col-md-10 mx-auto">
    <div class="card bg-light mt-5">
      <div class="table-responsive">
        <table id="example" class="table" style="width:100%;">
          <thead class="bg-primary">
            <tr class="border">
              <th>#</th>
              <th>BizName</th>
              <th>Choice</th>
              <th>Status</th>
              <th>Expire_date</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $count =1; foreach($data['users'] as $user):?>
            <tr>
              <!-- First Table data -->
              <td><?= $count;?></td>
              <td><?= $user->bizname;?></td>
              <td><?= $user->status;?></td>
              <?php if(date('Y-m-d h:ia') > $user->renew):?>
                <td class="text-danger">Expired</td>
              <?php else:?>
                <td>Active</td>
              <?php endif;?>
      
              <td><?= $user->renew;?></td>
              <td>
              <div class="d-flex">
               <form action="<?php echo URLROOT; ?>/admin/status_update/<?php echo $user->id; ?>" method="post">
                 <input type="submit" class="btn btn-sm btn-outline-primary" 
                  name="monthly" 
                  value="monthly">
               </form>
               <form action="<?php echo URLROOT; ?>/admin/status_update/<?php echo $user->id; ?>" method="post">
                 <input type="submit" class="btn btn-sm btn-outline-success" 
                  name="yearly" 
                  value="yearly">
               </form>
               <form action="<?php echo URLROOT; ?>/admin/status_update/<?php echo $user->id; ?>" method="post">
                 <input type="submit" class="btn btn-sm btn-outline-dark" 
                   name="free_trial" 
                   value="Expire">
               </form>

              </div>
              </td>
            </tr><!-- Second Table row ends -->
            <?php $count++; endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

  <!--Delete post Modal -->
  <div class="modal fade" id="deleteModal<?= $user->id ?>">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body">
          This Action cannot be reveresed..
          <p class="lead">Do you wish to Continue?</p>
        </div>
        <div class="modal-footer d-flex justify-content-between">
          <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i> Cancel</button>
          <form action="<?php echo URLROOT; ?>/personal/delete/<?php echo $user->id; ?>" method="post">
            <button type="submit" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash" aria-hidden="true"></i> Yes, Continue</button>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php require APPROOT . '/views/inc/admin/footer.php'; ?>
