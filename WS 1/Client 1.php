<?php
//Client 1 pour tester le premier service web
require_once('lib/nusoap.php');
$wsdl = "http://localhost/Mes-Projets/ToCode3_2/WS1/WS1.php?wsdl";


$client = new nusoap_client($wsdl, true);
$erreur = $client->getError();
if ($erreur) {
   echo '<h1>L\'Un erreur survenu :</h1>' . $erreur;
   exit();
}

//$result=$client->call('reserverBillet', array('name'=>"tunisie",'nb_pers'=>2));
$result=$client->call('reserverBillet', array('name'=>"tunisie",'nb_pers'=>3));
echo 'The Total is :  <h2>'. $result .'</h2>';

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
