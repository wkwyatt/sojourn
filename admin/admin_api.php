<?php
	
	include '../inc/db_connect.php';

	print "<pre>";
	print $_FILES['fileToUpload'];
	$target_dir =  "uploads/";
	$target_file = $target_dir.basename($_FILES['fileToUpload']['name']);
	$image_file_type = pathinfo($target_file, PATHINFO_EXTENSION);
	$file = getimagesize($_FILES['fileToUpload']['tmp_name']);
	print $file;

	if(isset($_GET['section'])) {
		$query = "SELECT * FROM about WHERE section='".$_GET['section']."'";
		$result = mysqli_query($query);
		$row = $result->fetch_assoc();
		if($row){
			print json_encode($row);
		}else{
			print json_encode('error!');
		}
	}

	if($_GET['crud_task'] == "delete") {		
		$query = "DELETE FROM about WHERE id = ".$_GET['id'];
		$result = mysqli_query($query);
		if(mysqli_error()){
			print mysqli_error();
		} else {
			header('location: index.php?result=success');
		}
	}

	if($_POST['crud_task'] == "addNew") {		
		$query = "INSERT INTO about (section,content) VALUES ('".$_POST['section']."','".$_POST['content']."')";
		$result = mysqli_query($link, $query);
		if(mysqli_error()){
			print mysqli_error();
		} else {
			header('location: index.php?result=success');
		}
	}

	if($_POST['crud_task'] == "update") {
		// print "<pre>";
		// print_r($_POST);
		if(isset($_POST['section'])){
			$query = "UPDATE about SET content = '".$_POST['content']."' WHERE section = '".$_POST['section']."'";
			$update = mysqli_query($link, $query);
			if(mysqli_error()){
				print mysqli_error();
			} else {
				header('location: index.php?result=success');
			}
		}
	}


exit;

?>