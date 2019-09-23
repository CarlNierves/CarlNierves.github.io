<!DOCTYPE html>
<html lang="en">
<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
<meta content="utf-8" http-equiv="encoding">

<?php
$location = "index.php";
if(!isset($_POST['submit'])){
  header("Location: $location?message=Error");
}

$name = $_POST['name'];
$veam = $_POST['email'];
$message = $_POST['body'];

if(empty($name)||empty($veam)){
  header("Location: $location?message=Error");
}

$email_from = "carlnierves@gmail.com";
$email_subject = "New Form Submission";
$email_body = "You have recieved a new message from $name.\n".
              "email address: $veam\n".
              "Here is the message:\n $message".
$to = "carlnierves@gmail.com";
$headers = "From: $email_from \r\n";

if(!mail($to, $email_subject, $email_body, $headers)){
  header("Location: $location?message=Error");
}else{
  header("Location: $location?message=Message Sent!");
}

?>
