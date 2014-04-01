<?php
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone_number'];
$job = $_POST['job_requested'];
$con = mysql_connect("localhost","dreamcpu_wayko","RANMA621");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
 $today = date("F j, Y, g:i a"); 
mysql_select_db("dreamcpu_contact_info", $con);

$sql="INSERT INTO contact_us (name, email,phone_number,job_request,DateRequested)
VALUES
('$_POST[name]','$_POST[email]','$_POST[phone_number]','$_POST[job_requested]','$today')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error(). "Actual query: " . $sql);
  }

$to = "anastasios@ag-architecture.net";
$subject = "A job have been requested";
$message = "On " . $today . " a job request for " . $job . " from " . $name . " was placed. Please email them at " . $email . " or call them at " . $phone;
$headers = "From:" . $email;
mail($to, $subject, $message,$headers);
mysql_close($con);
?>