<?php
  // Simple page redirect
  function redirect($page){
    header('location: '.URLROOT.'/'.$page);
  }

  function put_coma($amt){
    // $math = explode('.', $amt);
    // $amount = $math[0].$math[1];
    
    $amount = $amt;

    if (strlen($amount) == 12 ) {

      $arr = str_split($amount,3);
      $amount = $arr[0].','.$arr[1].','.$arr[2].','.$arr[3];

    }elseif (strlen($amount) == 11 ) {

      $arr = str_split($amount,2);
      $amount = $arr[0].$arr[1].','.$arr[2].$arr[3].$arr[4].','.$arr[5].$arr[6].$arr[7].','.$arr[8].$arr[9].$arr[10];

    }elseif (strlen($amount) == 10 ) {

      $arr = str_split($amount,1);
      $amount = $arr[0].','.$arr[1].$arr[2].$arr[3].','.$arr[4].$arr[5].$arr[6].','.$arr[7].$arr[8].$arr[9];

    }elseif (strlen($amount) == 9 ) {

      $arr = str_split($amount,3);
      $amount = $arr[0].','.$arr[1].','.$arr[2];

    }
    elseif (strlen($amount) == 8 )
    {

      $arr = str_split($amount,1);
      $amount = $arr[0].$arr[1].','.$arr[2].$arr[3].$arr[4].','.$arr[5].$arr[6].$arr[7];

    }
    elseif (strlen($amount) == 7 )
    {
      $arr = str_split($amount,1);
      $amount = $arr[0].','.$arr[1].$arr[2].$arr[3].','.$arr[4].$arr[4].$arr[6];
    }
    elseif (strlen($amount) == 6 ) {

      $arr = str_split($amount,3);
      $amount = $arr[0].','.$arr[1];

    }elseif (strlen($amount) == 5 ) {
      
      $arr = str_split($amount,2);
      $amount = $arr[0].','.$arr[1].$arr[2];

    }elseif (strlen($amount) == 4 ) {
      
      $arr = str_split($amount,1);
      $amount = $arr[0].','.$arr[1].$arr[2].$arr[3];
    }else{
      $amount = $amount;
    }
    return $amount;
  }