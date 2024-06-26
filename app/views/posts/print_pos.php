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
<?= $post->qty.' '.$post->dsc.'<br>';?>
                      <?= $post->qty.'*'. '&#8358;'.$post->rate.'<br>';?>
<?php $sum += $post->amount; endforeach;?>
********************************
                   TOTAL &#8358;<?= put_coma($sum);?>.00
--------------------------------

Thanks for patronage, pls call again..
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