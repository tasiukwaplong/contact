<?php
include "../GeneralController.php";
// $contactName = $_GET['cname'];

if (isset($_GET['cphone']) && isset($_GET['type']) && isset($_GET['par2']) && !empty($_GET['cphone']) && !empty($_GET['type']) && !empty($_GET['par2'])) {
  $cphone =$_GET['cphone'];
  $usedInterface = $_GET['t']; 
  $par2 = $_GET['par2'];
  $type = $_GET['type'];  
}else{
  $cphone = '';
  $usedInterface = 'a';
  $par2 = '';
  $type = '';
}

  $editContact = new GeneralController('', $cphone, $usedInterface);
  $cphone = $editContact->input_filter($cphone);
  $usedInterface = $editContact->input_filter($usedInterface); 
  $par2 = $editContact->input_filter($par2);
  $type = $editContact->input_filter($type); 



  ///this function gets data to db
  global $cphone, $usedInterface, $editContact;
  include "../connection/connection.php";

  if($type == 'name'){
    $query_search = "SELECT * FROM `contacts_tbl` WHERE `name` = '$par2' AND `phone` = '$cphone'";
    $query_edit = "UPDATE `contacts_tbl` SET `name` = '$par2' WHERE `contacts_tbl`.`phone` = '$cphone'";
  }else if($type == 'phone'){
    $query_search = "SELECT 'name', 'phone' FROM contacts_tbl WHERE phone = '$cphone' LIMIT 1";
    $query_edit =  "UPDATE `contacts_tbl` SET `phone` = '$par2' WHERE `contacts_tbl`.`phone` = $cphone LIMIT 1";
  }else{
    $retVal = array('message' => 'error', 'info' => 'Query not entered accurately', 'hint' => 'pass the http url as such ?par1=old_nam&par2=new_name&t=a&type=phone_or_name');
    $editContact->errHandle($usedInterface, $retVal);
    return;
  }

    $result_search = $db->query($query_search);
       $result_edit = $db->query($query_edit);
   
//    echo $query_search;
  if ($result_edit) {
      //$result_edit = $db->query($query_edit);
      $db->close();
   //   echo $query_search;
  $retVal =  array('message' => 'succcess', 'info' => "Contact $type updated successsfully phone no: $cphone ==> new $type : $par2");
    $editContact->errHandle($usedInterface, $retVal);
  }else{
     $retVal = array('message' => 'error', 'info' => 'Contact update unsuccessful', 'hint' => 'pass the http url as such ?par1=old_nam&par2=new_name&t=a&type=phone_or_name');
    $editContact->errHandle($usedInterface, $retVal);
 }

?>