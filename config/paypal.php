<?php

if(env('PAYPAL_MODE') == 'live') {
return [
   'client_id' => env('PAYPAL_CLIENT_ID_LIVE',''),
   'secret' => env('PAYPAL_SECRET_LIVE',''),
   'settings' => array(
       'mode' => 'live',
       'http.ConnectionTimeOut' => 30,
       'log.LogEnabled' => true,
       'log.FileName' => storage_path() . '/logs/paypal.log',
       'log.LogLevel' => 'DEBUG'
   ),
];
}

if(env('PAYPAL_MODE') == 'sandbox') {
    return [
       'client_id' => env('PAYPAL_CLIENT_ID_SANDBOX',''),
       'secret' => env('PAYPAL_SECRET_SANDBOX',''),
       'settings' => array(
           'mode' => 'sandbox',
           'http.ConnectionTimeOut' => 30,
           'log.LogEnabled' => true,
           'log.FileName' => storage_path() . '/logs/paypal.log',
           'log.LogLevel' => 'DEBUG'
       ),
    ];
    }