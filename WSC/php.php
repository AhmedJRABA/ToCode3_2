<form method="POST">
<font color="red"><i><h1>&nbsp;&nbsp; *** The Amount *** </h1></i></font>
<h2>Country : <input type="text" name="getDestination">
Nombre de personne: <input type="text" name="getNB">
<input type="submit" value="Send">
</h2>
</form>
<?php
require_once('lib/nusoap.php');
$error  = '';
$result = array();
$wsdl = "http://localhost/Mes-Projets/ToCode3-2/WS1/WS1.php?wsdl";
	if(!$error){
			//create client object
			$client = new nusoap_client($wsdl, true);
			$err = $client->getError();
			if ($err) {
				echo '<h2>Constructor error</h2>' . $err;
				// At this point, you know the call that follows will fail
			    exit();
			}
			 try {
				 // Call the SOAP method
                  
				    $result = $client->call('reserverBillet', array('name'=>$_POST['getDestination'],'nb_pers'=>$_POST['getNB']));
                   
			  }
			  catch (Exception $e) {
			    echo 'Caught exception: ',  $e->getMessage(), "\n";
			 }
		}
?>
        
<?php
require_once('lib/nusoap.php');
$error  = '';
$resultFinal = array();
$wsdl = "http://webservices.gama-system.com/exchangerates.asmx?WSDL";
	if(!$error){
			//create client object
			$client = new nusoap_client($wsdl, true);
			$err = $client->getError();
			if ($err) {
				echo '<h2>Constructor error</h2>' . $err;
				// At this point, you know the call that follows will fail
			    exit();
			}
			 try {
				 // Call the SOAP method
                  
				    $resultFinal = $client->call('ConvertToEUR', array('dcmEUR'=>$result));
                   
			  }
			  catch (Exception $e) {
			    echo 'Caught exception: ',  $e->getMessage(), "\n";
			 }
		}
?>

