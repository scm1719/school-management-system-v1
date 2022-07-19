<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$name = $_POST['name'];
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		$group = $_POST['group'];

		if(!empty($name)&&!empty($user_name) && !empty($password) &&!empty($email)&& !is_numeric($user_name))
		{

			//save to database
			$user_id = random_num(20);
			$query = "insert into users (user_id,name,user_name,password,email,group) values ('$user_id','$name','$user_name','$password','$email',$group)";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
</head>
<body>

	<style type="text/css">
	
	.title{
	text-align: center;
	margin-top: 25px;
	}
	
	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{

		padding: 10px;
		width: 100px;
		color: white;
		background-color: lightblue;
		border: none;
	}

	#box{

		background-color: grey;
		margin: auto;
		width: 300px;
		padding: 20px;
	}

	</style>
	<div class="title">
            <h1>Sujan's College Sign Up Portal</h1>
    </div>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Signup</div>
			<input id="text" type="text" name="name" placeholder="Full Name"><br><br>
			<input id="text" type="text" name="user_name" placeholder="user ID"><br><br>
			<input id="text" type="password" name="password" placeholder="Password"><br><br>
			<input id="text" type="email" name="email" placeholder="Email"><br><br>
			<label for="">Group</label>
				<select name="group" class="form-control">
					<option value="">--Select Group--</option>
					<option value="Teacher">Teacher</option>
					<option value="Admin">Admin</option>
					<option value="Student">Student</option>
				</select>

			<input id="button" type="submit" value="Signup"><br><br>

			<a href="login.php">Click to Login</a><br><br>
		</form>
	</div>
</body>
</html>