<?php
/**
* general class containing most needed methods
*/
class GeneralController {
	private $name;
	private $phone;
	private $interfaceUsed;
	private $db;

	function __construct($name, $phone, $interfaceUsed){
		//my constructor
		$this->name = $name;
		$this->name = $phone;
		$this->interfaceUsed = $interfaceUsed;
	}

	
	public function input_filter($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);

		if(empty($data)){ return "data_empty_for_input";}

		return $data;
  }


  public function errHandle($type, $msg){
  	//this function will handle errors
  	if ($type == "f") {
  		header('Content-Type: application/json');
  		echo json_encode($msg);
  	}else{
  		header('Content-Type: application/json');
  		echo json_encode($msg);
  	}
  }

public function renderView($type, $msg){
	if ($type == "a") {
  		header('Content-Type: application/json');
  		echo json_encode($msg);
  	}else{
  		require "headerContent.html";
      
  		for ($i=0; $i <count($msg) ; $i++) { 
  			print_r("
  			 <div class='panel panel-default'>
  			  <div class='panel-heading'>Name: ".$msg[$i][1]."</div>
  			  <div class='panel-body'>Phone: ".$msg[$i][0]."</div>
  			  <h4><hr>
  			<a href='edit/?' class='glyphicon glyphicon-edit'></a>
  			&nbsp;&nbsp;&nbsp;&nbsp;
  			<a href='edit/?' class='glyphicon glyphicon-trash'></a>
  			</h4>
  			</div>");
  		}

       require "footerContent.html";
  	}


} 


}