	<html>
	<head>
	<title>Registration Form</title>
	<link rel="stylesheet" href="rochelle.css">
	</head>
	
	<body>
		<form action="" method="POST" class="br">
			<div class="joy">
				<h1>SIGN UP</h1>
			<input type="text" name="firstname" placeholder="firstname" ><br><br>
			<input type="text" name="lastname" placeholder="lastname"><br><br>
			<input type="integer" name="contact" placeholder="09*********" maxlenght="11"><br><br>
			<input type="text" name="address" placeholder="City,Country"><br><br>
			<input type="email" name="email" placeholder="*****@gmail.com"><br><br>
			<input type="password" name="password" placeholder="********"><br><br>
			<input type="password" name="confirm" placeholder="Confirm Password"><br><br>
			<button type="submit" name="submit">Confirm</button>
		</form>
	</div>
	</body>
	</html>
	<div class=php1>
<div class=php>
	<h1>WARNING</h1>
	<?php
		$db=mysqli_connect('localhost','root','','registerform');
		$error=array();

		if(isset($_POST['submit'])){
			$first=mysqli_real_escape_string($db,$_POST['firstname']);
			$last=mysqli_real_escape_string($db,$_POST['lastname']);
			$contact=mysqli_real_escape_string($db,$_POST['contact']);
			$address=mysqli_real_escape_string($db,$_POST['address']);
			$email=mysqli_real_escape_string($db,$_POST['email']);
			$password=mysqli_real_escape_string($db,$_POST['password']);
			$confirm=mysqli_real_escape_string($db,$_POST['confirm']);
		if(empty($first)){
				array_push($error,'<br>*Please Fill Up the first name');
			}
			if(empty($last)){
				array_push($error,'<br>*Please Fill Up the last name');
			}
			if(empty($contact)){
				array_push($error,'<br>*Please Fill Up the contact number');
			}
			if(empty($address)){
				array_push($error,'<br>*Please Fill Up your Address');
			}
			if(empty($email)){
				array_push($error,'<br>*Please Fill Up your E-mail');
			}
			if(empty($password)){
				array_push($error,'<br>*Please Fill Up the Password');
			}
			if($password != $confirm){
				array_push($error,'<br>*Your Password dont match');
			}
			if(count($error)>0){
			foreach ($error as $errors) {
				echo $errors;
			
			}
		}
		if(count($error)==0){

		$check_user="SELECT * FROM Infos WHERE email='$email' OR contact='$contact' LIMIT 1";
		$result = mysqli_query($db,$check_user);
		$user= mysqli_fetch_assoc($result);
		if($user){
			if($user['email'] === $email){
				array_push($error,"Your e-mail already exist.");
			}
			if($user['contact'] === $contact){
				array_push($error,"Your Contact Number already exist");

			}

		}
		
			$query="INSERT INTO Infos(firstname,lastname,contact,address,email,password) VALUES ('$first','$last','$contact','$address','$email','$password')";
			mysqli_query($db,$query);
			if($query)
			{
				echo 'You are now registered';
			}

		}
		}
		




	?>
</div>
</div>