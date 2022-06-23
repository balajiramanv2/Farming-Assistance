<?php
    require('config.php');
       $salt='J2?H23!';
	
	  
	date_default_timezone_set('Asia/Kolkata');//date stamp
    $dat= date("F j, Y, g:i a");//date	
	$email=$_POST['email'];// EMail id 
	$fname=$_POST['full_name'];//First name
    $place=$_POST['place'];
    $state=$_POST['state'];
   	$phno=$_POST['phno'];
   	$pass=md5($_POST['pass_word'].$salt);// encrypted password
    
	 
    
    $query="INSERT INTO customer(name,ph_num,place,state,email,pass) VALUES ('$fname','$phno','$place','$email','$pass')";
//echo $query;
	$q=mysqli_query($conn,$query);
header('Location: /Farming/signin/');
	
?>
