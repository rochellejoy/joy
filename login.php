<html>
<head>
<title>Login</title>
<link rel="stylesheet" href="rochelle.css">
	</head>
</head>
<body>
	<form action="" method="POST">
		<div class="joy">
			<h1>LOG IN</h1>
		<input type="email" name=email placeholder="****@ygmail.com"><br><br>
		<input type="password" name="password" placeholder="*********"><br><br>
		<button type="submit" name="submit">Log-in</button>

</form>
</div>
</html>
</body>
<div class=php1>
<div class=php>
	<h1>WARNING</h1>
<?php
		$db=mysqli_connect('localhost','root','','registerform');
		$error=array();

		if(isset($_POST['submit'])){
			$email=mysqli_real_escape_string($db,$_POST['email']);
			$password=mysqli_real_escape_string($db,$_POST['password']);
			if(empty($email)){
				array_push($error,'<br>*Please Fill Up the E-mail');
			}
			if(empty($password)){
				array_push($error,'<br>*Please Fill Up the Password');
			}
		if(count($error)>0){
			foreach ($error as $errors) {
				echo $errors;
			
			}
		}
		if(count($error)==0){


		

		$check_user="SELECT * FROM Infos WHERE email='$email' AND password='$password' LIMIT 1";
		$result = mysqli_query($db,$check_user);
		$user= mysqli_fetch_assoc($result);

if($user){

	echo 'You are now log in';
}
else
{
	echo 'You havent registered yet';
}
}
}
?>
</div>
</div>