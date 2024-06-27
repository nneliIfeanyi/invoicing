<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>POS Print</title>
</head>
<body>
<pre id="pre_print">
--------------------------------
<?= $_SESSION['user_name'].'<br>'.$_SESSION['user_phone'].'<br>';?>
Reciept ID: <?= $data['t_id'].'<br>';?>
--------------------------------

ITEMS

<?php $sum=0; foreach($data['post'] as $post):?>
<?php if(!empty($post->dsc)):?>
<?= $post->dsc.'<br>';?>
                    <?= $post->qty.'*'. 'N'.$post->rate.'<br>';?>
<?php endif;?>
<?php $sum += $post->amount; endforeach;?>
********************************
            TOTAL N<?= put_coma($sum);?>.00
--------------------------------

Thanks for patronage, pls call again..

<?= date('D-jS-M-Y h:ia');?>
</pre>

<button class="btn btn-success"
    onclick="BtPrint(document.getElementById('pre_print').innerText)">Print receipt
 </button>
</body>
</html>


<script>
    function BtPrint(prn){
        var S = "#Intent;scheme=rawbt;";
        var P =  "package=ru.a402d.rawbtprinter;end;";
        var textEncoded = encodeURI(prn);
        window.location.href="intent:"+textEncoded+S+P;
    }
</script>