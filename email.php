<?php
	$quit = false;
	$today = date("F j Y g:i a"); 
	
	//email unset
	if ($_POST['email']=="" || $_POST['email']==NULL){
		$data["success"] = false;
		$data["message"] = "Please enter your email";
		$quit=true;
	}
	//valid email (note this check if domain exists as well)
	else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
		$data["success"] = false;
		$data["message"] = "Please enter a valid email";
		$quit=true;
	}
		
	//form data success!
	if ($quit == false){
		
		if (is_writable("emails.csv")) {
			if (!$handle = fopen("emails.csv", "a")) {
				$data["success"] = false;
				$data["message"] = "Cannot open file - Please reload and try again";
			}
			
			$addToCsv=$_POST["email"].",".$today;
			if (fwrite($handle, $addToCsv) === FALSE) {
				$data["success"] = false;
				$data["message"] = "Cannot write to file - Please reload and try again";
			}
			
			else{
				fwrite($handle, PHP_EOL);//makes new line in each csv entry
				$dlFilename = $_POST['filename'];
				session_start();
				$_SESSION['g2dl'] = 1;
				$data["success"] = true;
				$data["message"] = '<div id="success"><h2>Thanks</h2><a href="download.php?f='.$dlFilename.'" class="btn btn-danger btn-large">Download Here</a></div>';
				fclose($handle);
			}
		}
		
		else {
			$data["success"] = false;
			$data["message"] = "The file is not writable - Please reload and try again";
		}
	}

	echo json_encode($data);
?>