<?php
class InfoStudent {

//function to be exposed must be public
public function getInfoStudent($cin) {
$info = array("CIN:".$cin , "Ahmed", "JRABA","12/09/1997"); 
return $info;
}
}
?>
