<?php 
$errors = '';
if(empty($_POST['name'])  || 
   empty($_POST['email']) || 
   empty($_POST['message']))
{
    $errors .= "\n Error: all fields are required";
}

$name = $_POST['name']; 
$email_address = $_POST['email']; 
$msg = $_POST['message']; 

if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", $email_address))
{
    $errors .= "\n Error: Invalid email address";
}

if(empty($errors))
{
	$to = 'jordanparr114@gmail.com'; 
	$subject = "Bug form submission from $name";
	$message = "You have received a new message.";
	$message .= "\n Here are the details:";
	$message .= "\n Name: $name";
	$message .= "\n Email: $email_address";
	$message .= "\n Message: \n $msg \n"; 
	
	$message = wordwrap($message, 70);

	$headers = "From: $email_address\n"; 
	$headers .= "Reply-To: $email_address";
	
	mail($to, $subject, $message, $headers);
	//redirect to the 'thank you' page
	//Use absolute path in order to redirect to id
	header('Location: http://esof423.cs.montana.edu/group3/thanks.php#thanks');
}else{ 
	header("Location: http://esof423.cs.montana.edu/group3/bugForm.php#".json_encode($errors));
}
?>