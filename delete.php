<?php
	session_start();
	$id = $_GET['id'];

	$employees = simplexml_load_file('files/employees.xml');

	$index = 0;
	$i = 0;

	foreach($employees as $employee){
		if($employee->id == $id){
			$index = $i;
			break;
		}
		$i++;
	}
	unset($employees->Employee[$index]);
	file_put_contents('files/employees.xml', $employees->asXML());

	$_SESSION['message'] = 'Employee deleted successfully';
	header('location: index.php');

?>