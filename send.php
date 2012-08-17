<?php
if($_POST) {
	// Collect POST data from form
	$name = stripslashes($_POST['name']);
	$email = stripslashes($_POST['email']);
	$contact = stripslashes($_POST['contact']);
	$company = stripslashes($_POST['company']);
	$address = stripslashes($_POST['address']);
	$comment = stripslashes($_POST['message']);

	//Prefedined Variables
	$to = "contact@inlite.biz";
	$bcc = "webmaster@inlite.biz";
	$subject = "[Website - Contact] from ".$name." (".$email.")";
	
	//Define email variables
	
	$message = "Name : ".$name."\r\n <br/>";
	$message .= "Email : ".$email."\r\n <br/>";
	$message .= "Contact : ".$contact."\r\n <br/>";
	$message .= "Company : ".$company."\r\n <br/>";
	$message .= "Address : ".$address."\r\n <br/>";
	$message .= "Message : ".$comment."\r\n <br/><br/>";
	$message .= "Sent on ".date('d/m/Y')."\r\n <br/>";
	
	// To send HTML mail, the Content-type header must be set
	$headers  = 'MIME-Version: 1.0'."\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";

	// Additional headers
	$headers .= "To: InLite Contact <".$to.">" . "\r\n";
	$headers .= "Bcc: Inlite Webmaster <".$bcc.">" . "\r\n";
	$headers .= "From: ".$name." <".$email.">" . "\r\n";
	$headers .= "Reply-To: ".$name." <".$email.">" . "\r\n";
	$headers .= "Return-Path: ".$name." <".$email.">" . "\r\n";
	$headers .= "X-Mailer: PHP-".phpversion();
	
	//Validate
	$header_injections = preg_match("(\r|\n)(to:|from:|cc:|bcc:)", $comment);
	
	if( !empty($name) && !empty($email) && !empty($contact) && !empty($comment) && !$header_injections ) {
		if( mail($to, $subject, $message, $headers) ) {
			return true;
		}
		else {
			return false;
		}
	}
	else {
		return false;
	}
}
?>