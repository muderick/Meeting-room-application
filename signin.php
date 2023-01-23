<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//read from database
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.php");
						die;
					}
				}
			}
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
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
  <title>Sign in</title>
</head>

<body id="signup">
  <section class="signup-section">
    <div class="container">
      <h1 class="signup-title">Sign in</h1>
      <form class="signup-form" method="post">

        <!-- <div class="email">
          <label class="email-label">Email</label>
          <input type="email" name="email" placeholder="k9@domain.com" required />
          <label class="email-info-label">*Email is required</label>
        </div> -->

        <div class="username">
          <label>Username</label>
          <input type="text" name="user_name" placeholder="name" required/>
          <!-- <label class="username-info-label">*Username exists</label> -->
        </div>
        <div class="password">
          <label>Password</label>
          <input type="password" name="password" required/>
          <!-- <label class="password-info-label">*Incorrect password</label> -->

        </div>

        <div class="signup-submit">
          <button class="btn-submit" type="submit">Sign in</button>
        </div>
      </form>
      <div class="redirect-signin">
        <span>Don't have an account?</span>
        <a href="signup.php">Sign up </a>
      </div>
    </div>
    </div>
  </section>
</body>

</html>