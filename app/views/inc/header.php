<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.1/css/dataTables.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/3.0.0/css/buttons.dataTables.css">

  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/font-awesome.css" />
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/bootstrap.css" />
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/styles.css" />

  <link rel="apple-touch-icon" sizes="180x180" href="<?= URLROOT;?>/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?= URLROOT;?>/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?= URLROOT;?>/favicon-16x16.png">
  <link rel="manifest" href="<?= URLROOT;?>/site.webmanifest">

  <title><?php echo (!empty($_SESSION['user_name'])) ? $_SESSION['user_name'].' '.'Sales Invoice': 'InvoiceOnline'; ?></title>
  <style type="text/css">
    .flash-msg{
      position: fixed;
      top: 12vh;
      right: 1vw;
      z-index: 5;
      width: 200px;
      animation-name: fade;
      animation-duration: 3s;
      animation-delay: 6s;
      animation-iteration-count: 1;
      animation-fill-mode: forwards;
    }

    @keyframes fade{
      from{opacity: 1;}
      to{opacity: 0;}
    }

    .form-input{
      border: none;
      background: inherit;
      border-bottom: 1px solid grey;
      margin-bottom: 5px;
      width: 96%;
    }

    input.parsley-error,
    select.parsley-error,
    textarea.parsley-error {    
    border-color:#D43F3A;
    box-shadow: none;
    }

    input.parsley-error:focus,
    select.parsley-error:focus,
    textarea.parsley-error:focus {    
        border-color:#D43F3A;
        box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 6px #FF8F8A;
    }

    input.parsley-success,
    select.parsley-success,
    textarea.parsley-success {    
        border-color:#398439;
        box-shadow: none;
    }

    input.parsley-success:focus,
    select.parsley-success:focus,
    textarea.parsley-success:focus {    
        border-color:#398439;
        box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 6px #89D489
    }

    .parsley-errors-list {
        list-style-type: none;
        padding-left: 0;
        margin-top: 5px;
        margin-bottom: 0;
    }

    .parsley-errors-list.filled {
        color: #D43F3A;
        opacity: 1;
    }
  </style>
</head>
<body style="position: relative;">
  <?php require APPROOT . '/views/inc/navbar.php'; ?>
  <div class="container">
  