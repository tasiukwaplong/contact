<?php
include "../GeneralController.php";
if (isset($_GET['cphone']) &&  isset($_GET['t']) && !empty($_GET['cphone']) && !empty($_GET['t'])) {
 $contactPhone =$_GET['cphone'];
 $usedInterface = $_GET['t']; 
}else{
$contactPhone ='';
 $usedInterface = '';
}
// $contactName = $_GET['cname'];
  

 $deleteContact = new GeneralController('', $contactPhone, $usedInterface);

// $contactName = $deleteContact->input_filter($_GET['cname']);
 $contactPhone = $deleteContact->input_filter($contactPhone);
 $usedInterface = $deleteContact->input_filter($usedInterface); 

 if($contactPhone == "data_empty_for_input" || $usedInterface == "data_empty_for_input"){
  //when either of the inputs is wrong
  $retVal = ($usedInterface == 'f') ? 'error' : array('message' => 'error', 'info' => 'parameters not passed accurately', 'hint'=> 'possible input error or api request not correct');
  $deleteContact->errHandle($usedInterface, $retVal);
 }else{
  del();
 }

function del(){
  ///this function gets data to db
  global $contactPhone, $usedInterface, $deleteContact;
  include "../connection/connection.php";
  $query_delete = "DELETE FROM `contacts_tbl` WHERE `contacts_tbl`.`phone` = '$contactPhone'";

  $result_delete = $db->query($query_delete);
  
  if ($result_delete) {
    //if it gets deleteed successfully
    $db->close();
      $retVal = ($usedInterface == 'f') ? 'success' : array('message' => 'success', 'info' => 'contact deleted successfully');
  $deleteContact->errHandle($usedInterface, $retVal);
  
  }else{
  $retVal = ($usedInterface == 'f') ? 'error&delete' : array('message' => 'error', 'info' => 'unable to delte contact', 'hint' => 'pass the http url as such ?cphone=phone_num&t=a');
  $deleteContact->errHandle($usedInterface, $retVal);
 }

}