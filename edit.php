<?php
	session_start();
	if(isset($_POST['edit'])){
		$employees = simplexml_load_file('files/employees.xml');
		foreach($employees as $employee){
			if($employee->id == $_POST['id']){
				$employee->Name = $_POST['name'];
				$employee->Salary = $_POST['salary'];
				break;
			}
		}
		file_put_contents('files/employees.xml', $employees->asXML());
		$_SESSION['message'] = 'Employee updated successfully';
		header('location: index.php');
	}
	else{
		$_SESSION['message'] = 'Select Employee to edit first';
		header('location: index.php');
	}

?>