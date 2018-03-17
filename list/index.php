<?php
include "../GeneralController.php";
// $contactName = $_GET['cname'];

if (isset($_GET['cinfo']) && isset($_GET['t']) && !empty($_GET['cinfo']) && !empty($_GET['t'])) {
  $contactInfo =$_GET['cinfo'];
  $usedInterface = $_GET['t'];  
}else{
  $contactInfo = '';
  $usedInterface = 'a';
}

  $searchContact = new GeneralController('', $contactInfo, $usedInterface);

 //$contactName = $searchContact->input_filter($_GET['cname']);
 $contactInfo = $searchContact->input_filter($contactInfo);
 $usedInterface = $searchContact->input_filter($usedInterface); 


  ///this function gets data to db
  global $contactInfo, $usedInterface, $searchContact;
  include "../connection/connection.php";

  $query_search = (isset($_GET['showall'])) ?  "SELECT * FROM contacts_tbl" :  "SELECT * FROM contacts_tbl WHERE name = '$contactInfo' OR phone = '$contactInfo'" ;

  $result_search = $db->query($query_search);
  $numSearched = $result_search->num_rows;

  if ($numSearched > 0) {
    //if it gets searched successfully
    $retInfo  = [];
    for($j=0; $j<$numSearched; $j++){
      $searched_details = $result_search->fetch_assoc();
      
      array_push($retInfo, array($searched_details['phone'], $searched_details['name'])) ;
    }
    
    $retVal = ($usedInterface == 'f') ?   $searchContact->renderView($usedInterface, $retInfo) : $searchContact->renderView($usedInterface, array('message' => 'success', 'info' => $retInfo));
   
  }else{
    $retVal = ($usedInterface == 'f') ? array('message' => 'error', 'info' => 'Contact not found', 'hint' => 'Try searching using either a name or number') : array('message' => 'error', 'info' => 'Contact not found', 'hint' => 'Try searching using either a name or number');
    $searchContact->errHandle($usedInterface, $retVal);
 }

?>