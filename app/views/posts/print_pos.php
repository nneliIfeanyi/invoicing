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
<?= $_SESSION['user_name'].'<br>';?>
--------------------------------
Items 1
                      3 x $20.00
Items 2
                      1 x $40.00
********************************
                   TOTAL $100.00
--------------------------------
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