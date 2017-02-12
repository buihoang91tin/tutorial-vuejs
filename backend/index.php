<?php 
$events = array(array('id'=>1, 'name'=> 'Event 1', 'description'=>'bla bla 1', 'date'=> '2016-10-20'),
array('id'=>2, 'name'=> 'Event 2', 'description'=>'bla bla 2', 'date'=> '2016-10-20'),
array('id'=>3, 'name'=> 'Event 3', 'description'=>'bla bla 3', 'date'=> '2016-10-20'));

switch($_SERVER['REQUEST_METHOD']){
	case 'GET' : 
		$the_request = &$_GET; 

		initData(); 
		break;
	case 'POST' : 

		$the_request = &$_POST;
		$status = 'success';
		$event = array();
		if(validPostEvent()){
			$event = $the_request['event'];
		}else{
			$status = 'failed';
		}
		echo json_encode(array('status'=> $status, 'event'=> $event));

	break;
	default: break;
}

function initData(){
	global $events;
	echo json_encode($events);
}

function validPostEvent(){
	if(!empty($_POST['event'])){
		return true;
	}else{
		return false;
	}
}

?>