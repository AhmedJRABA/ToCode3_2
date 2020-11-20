<?php

require_once('lib/nusoap.php');
$wsdl = "http://webservices.gama-system.com/exchangerates.asmx?WSDL";


$client = new nusoap_client($wsdl, true);
$erreur = $client->getError();
if ($erreur) {
   echo '<h1>L\'Un erreur survenu :</h1>' . $erreur;
   exit();
}

$result=$client->call('ConvertToEUR', array('dcmEUR'=>$_POST['getFlag'])));

echo 'The Value Converted to EURO is :  <h2>'.($result['ConvertToEURResult']).'</h2>';

// Display the request and response (SOAP messages)
echo '<h2>Request</h2>';
echo '<pre>' . htmlspecialchars($client->request, ENT_QUOTES) . '</pre>';
echo '<h2>Response</h2>';
echo '<pre>' . htmlspecialchars($client->response, ENT_QUOTES) . '</pre>';

// Display the debug messages
echo '<h2>Debug</h2>';
echo '<pre>' . htmlspecialchars($client->debug_str, ENT_QUOTES) . '</pre>';
?>
?>
