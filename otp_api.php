<!doctype html>
<?php

    if(isset($_POST['login'])){
	// Authorisation details.
	$username = "avezsayyad1786@gmail.com";
	$hash = "9c6b4d584ce1448b19f934c70021073eec0fa3e921fd6a458c7c00e4945fa041";

	// Config variables. Consult http://api.txtlocal.com/docs for more info.
	$test = "0";
        $name =$_POST['name'];

	// Data for text message. This is the text message data.
	$sender = "MES IMCC TEAM 1 API Test"; // This is who the message appears to be from.
	$numbers = $_POST['num']; // A single number or a comma-seperated list of numbers
    $otp=mt_rand(100000,999999);
    setcookie("otp", $otp);
	$message = $name."This is your OTP".$opt. "message from the PHP API script from Avez Sayyad.";
	// 612 chars or less
	// A single number or a comma-seperated list of numbers
	$message = urlencode($message);
	$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
	$ch = curl_init('http://api.txtlocal.com/send/?');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch); // This is the result from the API
	    echo('OTP Send Successfully');
    curl_close($ch);
    }
  if(isset($_POST['ver']))
      $verotp=$_POST['otp'];
      if($verotp==$_COOKIE['otp']) {
            echo("Logined In Sucessfully ");
    }else{
          echo("otp wrong");
     }  
}   
?>
?>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<form method="post" action="phpotp.php">
<table align="center">
<tr>
<td>Name</td>
<td><input type="text" name="name" placeholder="Enter your Name"</td>
</tr>
<tr>
<td>Phone Number</td>
<td><input type="text" name="num" placeholder="Valid!with country Code"</td>
</tr>
<tr>
<td></td>
<td><input type="submit" name="login" value="sign(login)[send otp]" style="background-color: #433396; border: 0px;"</td>
</tr>
<tr>
<td>Verify OTP:</td>
<td><input type="text" name="otp" placeholder="enter received otp"</td>
</tr>
<tr>
<td></td>
<td><input type="submit" name="ver" value="verify otp" style="background-color: green; border:0px;"</td>
</tr>
</table>
</form>
</body>
</html>
