<?php
	session_start();
	if(isset($_POST['add'])){
		$users = simplexml_load_file('files/employees.xml');
		$user = $users->addChild('Employee');
		$user->addChild('id', $_POST['id']);
		$user->addChild('Name', $_POST['name']);
		$user->addChild('Salary', $_POST['salary']);
		$dom = new DomDocument();
		$dom->preserveWhiteSpace = false;
		$dom->formatOutput = true;
		$dom->loadXML($users->asXML());
		$dom->save('files/employees.xml');

		$_SESSION['message'] = 'Employee added successfully';
		header('location: index.php');
	}
	else{
		$_SESSION['message'] = 'Fill up add form first';
		header('location: index.php');
	}

?>