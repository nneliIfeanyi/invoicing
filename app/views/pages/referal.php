<?php require APPROOT . '/views/inc/header2.php';
      require APPROOT . '/views/inc/sidebar.php'; 
// $page = 'posts/index';
//  $count = 0;
//  $visits = $this->userModel->get_page_visits($page);
//  if (empty($visits)) {
//    $this->userModel->page_visit_count($page);
//  }else{
//   $count = $visits->count + 1;
//   $this->userModel->updateVisit($page,$count);
// //  echo 'page visited '.$count.' times';
//  }

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
                                <li class="list-inline-item">Refer and earn</li>
                            </ul>
                        </div>
                        <?php if($_SESSION['user_type'] != 'marketer'):?>
                            <form action="<?php echo URLROOT;?>/submissions/agenting" method="post">
                                <button type="submit" class="au-btn au-btn-icon au-btn--green">Activate Referal</button>
                            </form>
                        <?php else:?>
                            <a href="<?php echo URLROOT;?>/users/referal/<?php echo $_SESSION['ref_id'];?>" class="au-btn au-btn-icon au-btn--green">
                                <i class="zmdi zmdi-eye"></i>View Referals</a>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END BREADCRUMB-->
<div class="container-fluid">
<div class="row py-3">
<div class="col-lg-10">
    <div class="card">
        <img src="<?php echo URLROOT;?>/logo/refer.jpeg" class="card-img-top" style="width: 100%;height: 300px;">
        <div class="card-header py-3">
            <?php if(!empty($_SESSION['ref_id'])):?>
                <p class="font-weight-bold">Your unique referal link</p>
                <div class="input-group col-md-6">
                    <input type="text" id="linkinput" value="<?= URLROOT;?>/reg/<?= $_SESSION['ref_id'];?>" placeholder="<?= URLROOT;?>/reg/<?= $_SESSION['ref_id'];?>" class="form-control">
                    <div class="input-group-btn">
                        <button class="btn btn-primary" onclick="copyLink()">Copy link</button>
                    </div>
                </div>
            <?php endif;?>
        </div>
        <div class="card-body">
            <div class="card-title">
                <h3 class="">Earn <span class="text-warning">POINTS</span> by referring other businesses to use invoice<span class="text-warning">Online</h3>
            </div>
            <hr>
            <div class="row">
               <?php if(empty($_SESSION['ref_id'])):?>
                <form action="<?php echo URLROOT;?>/submissions/agenting" method="post">
                    <button type="submit" class="au-btn au-btn-icon au-btn--green">Activate Referal</button>
                </form>
               <?php endif;?> 
            </div>
        </div>
    </div>
</div>
</div>
</div>
<!-- END STATISTIC-->
<script type="text/javascript">
    function copyLink(){
        var link = document.getElementById('linkinput');
        link.select();
        link.setSelectionRange(0,99999);
        navigator.clipboard.writeText(link.value);
        displayMessage();
    }
</script>

<script>

    function displayMessage() {
    const body = document.body;
    const panel = document.createElement('div');
    panel.setAttribute('class','flash-msg card card-body');
    body.appendChild(panel);

    const msg = document.createElement('h5');
    msg.textContent = 'Link Copied..';
    panel.appendChild(msg);
    msg.setAttribute('class','font-weight-bold  border-bottom border-warning');
   

} 
</script>

<?php require APPROOT . '/views/inc/footer2.php'; ?>


















