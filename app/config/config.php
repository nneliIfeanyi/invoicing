<?php
date_default_timezone_set("Africa/Lagos");
  // DB Params
  define("DB_HOST", "localhost");
  define("DB_USER", "root");
  define("DB_PASS", "");
  define("DB_NAME", "emulate");

  // App Root
  define('APPROOT', dirname(dirname(__FILE__)));
  // URL Root
  define('URLROOT', 'http://localhost/invoice');
  // Site Name
  define('SITENAME', 'InvoiceOnline');
  define('SITENAME2', 'Stanvic Concepts | InvoiceOnline');

   if(date('H') == 00 || date('H') < 12){
   define('GREET', 'Good morning!');
   }elseif(date('H') == 12 || date('H') < 16){
   define('GREET', 'Good afternoon!');
   }elseif(date('H') == 16 || date('H') < 20){
   define('GREET', 'Good evening!');
   }elseif(date('H') == 20 || date('H') > 20){
   define('GREET', 'How was your day, today?');
   }

  