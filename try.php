<?php

require_once(dirname(__FILE__) . '/vendor/Veritrans.php');
 
  Veritrans_Config::$serverKey = "SB-Mid-server-vEZlC-DdH703aGozKzcn9NVt";

  Veritrans_Config::$isSanitized = true;

  Veritrans_Config::$is3ds = true;

$transaction_details = array(
    'order_id' => rand(),
    'gross_amount' => 40000, 
  );

  $item1_details = array(
    'id' => 'a1',
    'price' => 20000,
    'quantity' => 2,
    'name' => "Denim shirt"
  );

  $item2_details = array(
     'id' => 'a2',
     'price' => 150000,
     'quantity' => 1,
     'name' => "Sweatshirt"
  );

  $item_details = array ($item1_details, $item2_details);

  $billing_address = array(
    'first_name'    => "Kiostr",
    'last_name'     => "",
    'address'       => "Mataram",
    'city'          => "Mataram",
    'postal_code'   => "83112",
    'phone'         => "081234567891",
    'country_code'  => 'IDN'
  );

  $shipping_address = array(
    'first_name'    => "Muhammad",
    'last_name'     => "Tanwir",
    'address'       => "Lombok Timur",
    'city'          => "Mataram",
    'postal_code'   => "83354",
    'phone'         => "081234567892",
    'country_code'  => 'IDN'
  );

  $customer_details = array(
    'first_name'    => "Kiostr",
    'last_name'     => "",
    'email'         => "kiostr@gmail.com",
    'phone'         => "081234567891",
    'billing_address'  => $billing_address,
    'shipping_address' => $shipping_address
  );

  $enable_payments = array('credit_card','cimb_clicks','mandiri_clickpay','echannel','alfamart');

  $transaction = array(
    'enabled_payments' => $enable_payments,
    'transaction_details' => $transaction_details,
    'customer_details' => $customer_details,
    'item_details' => $item_details,
  );

  $snapToken = Veritrans_Snap::getSnapToken($transaction);


?>

<!doctype html>
<html>
  <head>
    <title>AC-Learn</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <body>
    <button id="pay-button">
       klik   
    </button>
    <div id="result-json"></div><br>
    <?=$snapToken?>
    <script 
      type="text/javascript"
      src="https://app.sandbox.midtrans.com/snap/snap.js"
      data-client-key="SB-Mid-client-RaBqRWo1OxT2aukx"
    ></script>
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="Masukan_key_anda_disini"></script>
    <script type="text/javascript">
      document.getElementById('pay-button').onclick = function(){
        snap.pay('<?=$snapToken?>', {
          onSuccess: function(result){
            document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
          },
          onPending: function(result){
            document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
          },
          onError: function(result){
            document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
          }
        });
      };
    </script>
  </body>
</html>