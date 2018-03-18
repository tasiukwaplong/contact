<?php
include "../GeneralController.php";
if (isset($_GET['cname']) && isset($_GET['cphone']) && isset($_GET['t']) && !empty($_GET['cname']) && !empty($_GET['cphone']) && !empty($_GET['t'])) {
 $contactName = $_GET['cname'];
 $contactPhone =$_GET['cphone'];
 $usedInterface = $_GET['t'];  
}else{
$contactName = '';
 $contactPhone ='';
 $usedInterface = 'a';
}

  

 $newContact = new GeneralController($contactName, $contactPhone, $usedInterface);

 $contactName = $newContact->input_filter($contactName);
 $contactPhone = $newContact->input_filter($contactPhone);
 $usedInterface = $newContact->input_filter($usedInterface); 

 if($contactPhone == "data_empty_for_input" || $contactName == "data_empty_for_input" || $usedInterface == "data_empty_for_input"){
 	//when either of the inputs is wrong
 	$retVal = array('message' => 'error', 'info' => 'unable to insert', 'hint'=> 'pass the http url as such ?cname=contact_name&cphone=phone_num&t=a');
 	$newContact->errHandle($usedInterface, $retVal);
 }else{
 	add();
 }

function add(){
	///this function gets data to db
	global $contactName, $contactPhone, $usedInterface, $newContact;
	include "../connection/connection.php";
	$query_insert = "INSERT INTO `contacts_tbl` (`id`, `name`, `phone`) VALUES (NULL, '$contactName', '$contactPhone')";

	$result_insert = $db->query($query_insert);
 
  if ($result_insert) {
    //if it gets inserted successfully
     	$retVal = ($usedInterface == 'f') ? 'success' : array('message' => 'success', 'info' => 'contact added successfully');
 	$newContact->errHandle($usedInterface, $retVal);
  
  }else{
  $retVal = ($usedInterface == 'f') ? 'error&insert' : array('message' => 'error', 'info' => 'unable to add contact', 'hint' => 'Contact already exist');
 	$newContact->errHandle($usedInterface, $retVal);
 }

}