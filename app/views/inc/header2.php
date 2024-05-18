<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="invoicing software">
    <meta name="author" content="Nneli Victor">
    <meta name="keywords" content="invoicing, business, customers, clients, stock keeping, inventory">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Title Page-->
    <title><?php echo (!empty($_SESSION['user_name'])) ? $_SESSION['user_name'].' '.'Sales Invoice': 'Invoice Online'; ?></title>

    <!-- Fontfaces CSS-->
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/font-awesome.css" />
    <link href="<?php echo URLROOT; ?>/css/font-face.css" rel="stylesheet" media="all">
    <link href="<?php echo URLROOT; ?>/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="<?php echo URLROOT; ?>/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="<?php echo URLROOT; ?>/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="<?php echo URLROOT; ?>/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="<?php echo URLROOT; ?>/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="<?php echo URLROOT; ?>/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="<?php echo URLROOT; ?>/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="<?php echo URLROOT; ?>/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="<?php echo URLROOT; ?>/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="<?php echo URLROOT; ?>/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="<?php echo URLROOT; ?>/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
    <link href="<?php echo URLROOT; ?>/vendor/vector-map/jqvmap.min.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="<?php echo URLROOT; ?>/css/theme.css" rel="stylesheet" media="all">


    <style type="text/css">
      #loader {
        min-height: 100%;
        z-index: 99999;
      }

      .flash-msg1{
        position: fixed;
        top: 77px;
        right: 0;
        width: auto;
        z-index: 500;
        background: rgba(250, 250, 250, 0.9);
      }
      .flash-msg{
        position: fixed;
        top: 11vh;
        right: 0;
        width: auto;
        z-index: 500;
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
