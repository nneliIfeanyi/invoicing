<?php require APPROOT . '/views/inc/header2.php';
      require APPROOT . '/views/inc/sidebar.php'; 
// Custom flash msg
flash('msg');

// SMS API integration



?>
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
                                <li class="list-inline-item">Send Message</li>
                            </ul>
                        </div>
                        <a href="<?php echo URLROOT;?>/posts/creditors" class="au-btn au-btn-icon au-btn--green">
                            <i class="fa fa-backward"></i> back to Creditors</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END BREADCRUMB-->

<div class="container-fluid">
<?php if($data['val'] == 'whatsapp'):?>
<section class="card card-body">
    <h5>You are about to send a whatsApp message to <span class="text-warning"><?= $data['creditor']->name;?></h5>
    <hr>
    <form method="POST" action="<?php echo URLROOT?>/posts/remind/whatsapp"> 
        <input type="hidden" name="customer_phone" value="<?= $data['creditor']->phone;?>"> 
        <input type="hidden" name="t_id" value="<?= $data['creditor']->t_id;?>">     
        <div class="row form-group">
            <div class="col-md-12">
                <label for="textarea-input" class=" form-control-label">Type Whatsapp Message</label>
            </div>
            <div class="col-md-5">
                <textarea name="message" id="textarea-input" rows="2" class="form-control"></textarea>
            </div>
        </div>

        <div class="">
            <input type="submit" name="whatsapp_msg" class="btn btn-success" value="Send whatsapp message" />
        </div>
                
    </form>
</section>        
<?php elseif($data['val'] == 'sms'):?>
<section class="card card-body">
    <h5>You are about to send an SMS to <span class="text-warning"><?= $data['creditor']->name;?></h5>

    <hr>
    <form method="POST" action="<?php echo URLROOT?>/posts/remind/sms" id="remind_form">

        <input type="hidden" name="t_id" value="<?= $data['creditor']->t_id;?>">
        <div class="row form-group">
            <div class="col-md-12">
                <label for="textarea-input" class=" form-control-label">Phone Number</label>
            </div>
            <div class="col-md-5">
                <input type="number" name="customer_phone" class="form-control" value="<?= $data['creditor']->phone;?>"> 
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-12">
                <label for="textarea-input" class=" form-control-label">Type SMS</label>
            </div>
            <div class="col-md-5">
                <textarea name="message" id="textarea-input" data-parsley-trigger="keyup" data-parsley-length="[0, 160]" rows="3" class="form-control"></textarea>
            </div>
        </div>

        <div class="">
            <input type="submit" name="sms_msg" class="btn btn-success" value="Send SMS" />
        </div>
                
    </form>
</section>       
<?php endif;?>
</div>
<?php require APPROOT . '/views/inc/footer2.php'; ?>
  <script>
    $('#remind_form').parsley();
    </script>

