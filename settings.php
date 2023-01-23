<?php include 'conndb.php'; ?>

<?php
session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($con);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/07ea819cb9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets\homepage.css">
    <link rel="stylesheet" href="assets\settings.css">
    <title>Homepage</title>
</head>

<?php
include 'conndb.php';
$user_name = $user_data['user_name'];
$sql = "SELECT * FROM users where user_name='$user_name'";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);
?>

<body>
    <section class="sidebar--section">
        <div class="nav">
            <div class="top_nav" style="display: flex;">
                <div><object data="assets\icons\kplc_logo.svg" class="kplc_icon" type=""></object></div>
                <div class="vertical_hr"></div>
                <div class="app--title" class="mt-auto mb-auto">
                    <div>MEETING ROOM BOOKING SYSTEM</div>
                </div>
            </div>
            <div class="hr"></div>
            <div class="nav--links">
                <header class="header--menu">MENU</header>
                <div class="block" id="block">
                    <ul class="nav-menu" id="nav-menu">
                        <li class="nav-menu ">
                            <a href="index.php">
                                <button class="btn flex ">
                                    <!-- <i class="fa-regular fa-house-blank"></i> -->
                                    <i class="fa-solid fa-house"></i>
                                    <!-- <object data="assets\icons\home.svg" class="icon" type=""></object> -->
                                    <div class="ml-12 nav--home ">Home</div>
                                </button>
                            </a>
                        <li class="nav-menu">
                            <a href="calendar.php">
                                <button class="btn flex">
                                    <i class="fa-regular fa-calendar"></i>
                                    <div class="ml-12">My Meetings</div>
                                </button>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div style="margin:2rem 0 2rem 0; gap: 24px;">
                <header>MORE</header>
                <div class="block">
                    <ul class="nav-menu">

                        <li>
                            <a href="#">
                                <button class="btn flex active">
                                    <!-- <i class="fa-regular fa-gear"></i> -->
                                    <object data="assets\icons\settings.svg" class="icon mt-auto mb-auto" type=""></object>
                                    <div class="ml-12">Settings</div>
                                </button>
                            </a>
                        </li>
                        <!-- <li style="margin-top: 24px;">
                            <a href="settings.html">
                                <button class="btn flex">
                                    <object data="assets\icons\settings.svg" class="icon mt-auto mb-auto" type=""></object>
                                    <div class="ml-12">Settings</div>
                                </button>
                            </a>
                        </li> -->
                    </ul>
                </div>
            </div>
            <!-- <div class="bottom-content">
                <li class="mode">
                    <div class="sun-moon">
                        <i class='bx bx-moon icon moon'></i>
                        <i class='bx bx-sun icon sun'></i>
                    </div>
                    <span class="mode-text text">Dark mode</span>

                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li>
                
            </div> -->
            <div class="hr" style="margin: 80px 0 5px 0;"></div>
            <div class="copyright">&#169 kplc 2022. All rights reserved </div>

        </div>
    </section>
    <section class="content">
        <div class="top-bar">
            <div class="top_bar flex">
                <div class="greetings">
                    <div class="flex">
                        <div class="profile-image_div profile--image">
                            <img src="<?php echo $user_data['profile_pic'] ?>" class="profile_pic" alt="">
                        </div>
                        <p class="hello--user">Hello,
                            <?php echo $user_data['user_name']; ?>
                        </p>
                    </div>
                </div>
                <div class="signing flex">
                    <!-- <div class="notificaton">
                        <object data="assets\icons\notification.svg"></object>
                    </div> -->
                    <!-- <div class="logout">
                        <input type="button">Logout</input>
                    </div> -->
                    <div class="logout">
                        <a href="logout.php">
                            <button>
                                Logout
                            </button>
                        </a>
                    </div>
                    <!-- <div class="sign_up">Sign Up</div> -->
                </div>
            </div>
            <div class="book_hr"></div>
        </div>
        <div class="rooms">

            <div class="block no-scroll_wrapper">
                <div class="header">
                    <div class="vertical_hr_booking"></div>
                    <h2 class="all--rooms">Settings</h2>
                </div>
                <div class="settings--content">
                    <div class="settings--profile">
                        <h4 class="my--profile">My profile</h4>
                        <form action="uploads.php" method="post">
                            <div class="profile--photo">
                                <img class="photo" src="<?php echo $user_data['profile_pic'] ?>" alt="">
                                <button class="change--photo" style="display:block;width:80px; height:40px;" onclick="document.getElementById('getFile').click()">Change Photo</button>
                                <input name="profile_pic" id="getFile" class="change--photo" type="file" style="display:none">
                            </div>
                            <div class="profile--form">
                                <div class="username">
                                    <label for="username">Username</label>
                                    <input class="input--username" type="text" name="username" value="Kpl111" />
                                    <label for="c_password">Current password</label>
                                    <input class="input--cpassword" type="password" name="c_password" />
                                    <label for="new_password">New password</label>
                                    <input class="input--npassword" id="newPassword" type="password" name="new_password" />
                                    <!-- <input type="checkbox" onclick="myFunction()"> -->
                                </div>
                            </div>
                            
                            <input class="btn--savechanges" name="submit" type="submit" value="Save changes">
                        </form>

                    </div>
                </div>

            </div>
        </div>
        </div>
        </div>
            <script src="homepage.js"></script>

            <script>
                // Add active class to the current button (highlight it)
                var header = document.getElementById("nav-menu");
                var btns = header.getElementsByClassName("nav-menu");
                for (var i = 0; i < btns.length; i++) {
                    btns[i].addEventListener("click", function() {
                        var current = document.getElementsByClassName("active");
                        current[0].className = current[0].className.replace(" active", "");
                        this.className += " active";
                    });
                }
            </script>
</body>
<script type="text/javascript">
    function myFunction() {
        var x = document.getElementById("myInput");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>

</html>