<?php
	$errorMSG = "";

	// FIRSTNAME
	if (empty($_POST["name"])) {
		$errorMSG = "Full Name is required. ";
	} else {
		$name = $_POST["name"];
	}

	// EMAIL
	if (empty($_POST["email"])) {
		$errorMSG .= "Email is required. ";
	} else {
		$email = $_POST["email"];
	}
	
	//PHONE
	if(empty($_POST['phone'])) {
		$errorMSG .= "Phone is required. ";
	}else{
		$phone = $_POST['phone'];
	}
	
	// MESSAGE
	if (empty($_POST["msg"])) {
		$errorMSG .= "Message is required. ";
	} else {
		$message = $_POST["msg"];
	}

	$subject = 'Contact Inquiry from Digon Website';
    
	$EmailTo = "career@digon.com"; // Your domain email

	$headers = "From: noreply@wpthemeverse.com\r\n"; // Use domain email
	$headers .= "Reply-To: " . $email . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

	$Body = "<strong>Name:</strong> " . $name . "<br>";
	$Body .= "<strong>Email:</strong> " . $email . "<br>";
	$Body .= "<strong>Phone:</strong> ". $phone . "</br>";
	$Body .= "<strong>Message:</strong> " . nl2br($message) . "<br>";

	$success = mail($EmailTo, $subject, $Body, $headers);

	//redirect to success page
	if ($success == 1 && $errorMSG == ""){
	   echo "success";
	}else{
		if($errorMSG == ""){
			echo "Something went wrong :(";
		} else {
			echo $errorMSG;
		}
	}

?>