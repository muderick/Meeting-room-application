<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
    $email= $_POST['email'];
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($email) && !empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//save to database
			$user_id = random_num(20);
			$query = "insert into users (user_id,email,user_name,password) values ('$user_id','$email','$user_name','$password')";

			mysqli_query($con, $query);

			header("Location: signin.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets\onboarding.css" />
    <title>Sign up</title>
  </head>
  <body id="signup">
    <section class="signup-section">
      <div class="container">
        <h1 class="signup-title">Sign up</h1>
        <form class="signup-form" action="signup.php" method="post" >

          <div class="email">
            <label class="email-label">Email</label> 
            <input
              type="email"
              name="email"
              placeholder="k9@domain.com"
              required
            />
            <label class="email-info-label">*Email is required</label> 
          </div>
          
          <div class="username">
            <label>Username</label> 
            <input type="text" name="user_name" placeholder="kpl99999" /> 
            <!-- <label class="username-info-label">*Username exists</label> -->
          </div>
          <div class="password">
            <label>Password</label> 
            <input type="password" name="password" placeholder="xxxxxxxx" />
            <!-- <label class="password-info-label">*Email is required</label>  -->
            
          </div>
          <!-- <div class="retype">
            <label>Retype Password</label> 
            <input type="password" name="password" placeholder="xxxxxxxx" />
            <label class="retype-info-label">Password match</label> 
            
          </div> -->
          <div class="signup-submit">
            <button class="btn-submit" type="submit">Sign up</button>
          </div>
        </form>
          <div class="redirect-signin">
            <span>Have an account?</span> 
            <a href="signin.php">Sign in  </a> 
          </div>
        </div>
      </div>
    </section>
  </body>
</html>
