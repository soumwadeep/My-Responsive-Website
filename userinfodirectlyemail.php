<?php
if(!isset($_POST['submit']))
{
	//This page should not be accessed directly. Need to submit the form.
	echo "error; you need to submit the form!";
}
$user = $_POST['user'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];
$message = $_POST['message'];

//Validate first
if(empty($user)||empty($email)) 
{
    echo "Name and email are mandatory!";
    exit;
}

if(IsInjected($email))
{
    echo "Bad email value!";
    exit;
}

$email_from = 'getallhowtosolutionsforms@gmail.com';//<== update the email address
$email_subject = "New Message From $user Via Form!";
$email_body = "You Have Received A New Message From $user.\n".
    
    "$user's Message:\n $message\n".
    "$user's Email Id: $email\n".
    "$user's Mobile Number: $mobile\n".
    
$to = "getallhowtosolutions@gmail.com";//<== update the email address
$headers = "From: $email_from \r\n";
$headers .= "Reply-To: $email \r\n";
//Send the email!
mail($to,$email_subject,$email_body,$headers);
//done. redirect to thank-you page.
header('Location: thank-you.html');


// Function to validate against any email injection attempts
function IsInjected($str)
{
  $injections = array('(\n+)',
              '(\r+)',
              '(\t+)',
              '(%0A+)',
              '(%0D+)',
              '(%08+)',
              '(%09+)'
              );
  $inject = join('|', $injections);
  $inject = "/$inject/i";
  if(preg_match($inject,$str))
    {
    return true;
  }
  else
    {
    return false;
  }
}
   
?> 