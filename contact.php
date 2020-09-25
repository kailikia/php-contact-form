<?php

if (isset($_POST['name'], $_POST['email'], $_POST['message'])){

	$name = $_POST['name'];
	$email = $_POST['email'];
	$message = $_POST['message'];
		
	//recipient - replace your email here
	$to = 'info@hamrolenterprise.co.ke';	
	//sender - from the form
	$from = 'Hamrol Enterprise' . ' <' . $email . '>';
	
	//subject and the html message
	$subject = 'Message from ' . $name;	
	$message = $message;
		      

	//send the mail
	$result = sendmail($to, $subject, $message, $from);
	

	if ( 1 == 1){
	
		$client_to = $email;
		$client_from = 'Hamrol Enterprise ' . ' <' . $to . '>';
		$client_subject = 'Hamrol Enterprise';
		$client_msg =  '<center><h4 class="title"><font color="purple">Thank you <font color="red">'.$name.'</font>! We have received your Message. We will contact you shortly. </center></h4></font>';
		
		sendmail($client_to, $client_subject, $client_msg, $client_from);
		
		
		echo $client_msg;
		
		}else{
	
		echo 'Sorry, unexpected error Occured. Your message was not sent. Please try again later';
		exit;
		}

}else{ echo 'Sorry, unexpected error. Please try again later';}
//Simple mail function with HTML header
function sendmail($to, $subject, $message, $from) {
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
	$headers .= 'From: ' . $from . "\r\n";
	
	$result = mail($to,$subject,$message,$headers);
	
	if ($result) return 1;
	else return 0;
}

?>