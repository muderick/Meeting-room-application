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
    <title>Homepage</title>
</head>

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
                            <a href="#">
                                <button class="btn flex active  ">
                                    <!-- <i class="fa-regular fa-house-blank"></i> -->
                                    <i class="fa-solid fa-house"></i>
                                    <!-- <object data="assets\icons\home.svg" class="icon" type=""></object> -->
                                    <div class="ml-12 nav--home ">Home</div>
                                </button>
                            </a>
                        </li>
                        <!-- <li class="nav-menu">
                            <a href="booking.php">
                                <button class="btn flex">
                                    <i class="fa-regular fa-bookmark "></i>
                                    <object data="assets\icons\home.svg" class="icon" type=""></object>
                                    <div class="ml-12 nav--home">Book a meeting</div>
                                </button>
                            </a>
                        </li> -->
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
                            <a href="settings.php">
                                <button class="btn flex">
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
                            <a href="settings.php"><img src="<?php echo $user_data['profile_pic'] ?>" class="profile_pic" alt=""></a>
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

                    <h2 class="all--rooms">All rooms</h2>
                </div>
                <div class="room-container no-scroll">


                    <div class="room-card">
                        <?php
                        $sql = "SELECT * FROM room_details WHERE room_name='Big Room 1'";
                        $res = $conn->query($sql);
                        if ($res->num_rows > 0) {
                            while ($row = $res->fetch_assoc()) { ?>
                                <div class="room-tag">Available</div>
                                <div class="room-image">

                                    <img src="<?php echo $row['picture'] ?>" ;" class="room-thumb" alt="Image">
                                </div>
                                <div class="room-info">
                                    <h2 class="room-name">
                                        <?php echo $row['room_name']; ?>
                                    </h2>
                                    <div class="room-card_hr"></div>
                                    <ul class="room-details">
                                        <li>
                                            <?php echo $row['floor']; ?>
                                        </li>
                                        <li>
                                            <?php echo $row['phase']; ?>
                                        </li>
                                        <li>
                                            <?php echo $row['dept']; ?>
                                        </li>
                                        <li>
                                            <?php echo $row['number_person']; ?>
                                        </li>
                                    </ul>
                                    <div class="room-card_hr"></div>

                                    <button type="submit" class="book-btn">
                                        <?php echo "<a style='text-decoration:none; color:white;' href='booking.php?roomid={$row['id']}'> 
                                        Book Now</a>"; ?>
                                    </button>
                                </div>

                        <?php }
                        }
                        ?>
                    </div>

                    <div class="room-card">
                        <?php
                        $sql = "SELECT * FROM room_details WHERE room_name='Medium Room 1'";
                        $res = $conn->query($sql);
                        if ($res->num_rows > 0) {
                            while ($row = $res->fetch_assoc()) { ?>
                                <div class="room-tag">Available</div>
                                <div class="room-image">

                                    <img src="<?php echo $row['picture'] ?>" ;" class="room-thumb" alt="Image">
                                </div>
                                <div class="room-info">
                                    <h2 class="room-name">
                                        <?php echo $row['room_name']; ?>
                                    </h2>
                                    <div class="room-card_hr"></div>
                                    <ul class="room-details">
                                        <li>
                                            <?php echo $row['floor']; ?>
                                        </li>
                                        <li>
                                            <?php echo $row['phase']; ?>
                                        </li>
                                        <li>
                                            <?php echo $row['dept']; ?>
                                        </li>
                                        <li>
                                            <?php echo $row['number_person']; ?>
                                        </li>
                                    </ul>
                                    <div class="room-card_hr"></div>
                                    <button type="submit" class="book-btn">
                                        <?php echo "<a style='text-decoration:none; color:white;' href='booking.php?roomid={$row['id']}'> 
                                        Book Now</a>"; ?>
                                    </button>
                                </div>

                        <?php }
                        }
                        ?>
                    </div>

                    <div class="room-card">
                        <?php
                        $sql = "SELECT * FROM room_details WHERE room_name='Medium Room 2'";
                        $res = $conn->query($sql);
                        if ($res->num_rows > 0) {
                            while ($row = $res->fetch_assoc()) { ?>
                                <div class="room-tag">Available</div>
                                <div class="room-image">

                                    <img src="<?php echo $row['picture'] ?>" ;" class="room-thumb" alt="Image">
                                </div>
                                <div class="room-info">
                                    <h2 class="room-name">
                                        <?php echo $row['room_name']; ?>
                                    </h2>
                                    <div class="room-card_hr"></div>
                                    <ul class="room-details">
                                        <li>
                                            <?php echo $row['floor']; ?>
                                        </li>
                                        <li>
                                            <?php echo $row['phase']; ?>
                                        </li>
                                        <li>
                                            <?php echo $row['dept']; ?>
                                        </li>
                                        <li>
                                            <?php echo $row['number_person']; ?>
                                        </li>
                                    </ul>
                                    <div class="room-card_hr"></div>
                                    <button type="submit" class="book-btn">
                                        <?php echo "<a style='text-decoration:none; color:white;' href='booking.php?roomid={$row['id']}'> 
                                        Book Now</a>"; ?>
                                    </button>
                                </div>

                        <?php }
                        }
                        ?>
                    </div>

                    <div class="room-card">
                        <?php
                        $currentDate = date("m/d/Y");
                        date_default_timezone_set("Africa/Nairobi");
                        $currentTime = date("h:i:sa");
                        $meeting_time = "SELECT * FROM room_reservation WHERE meeting_time BETWEEN CAST(start_time + meeting_date AS datetime) 
                        AND CAST(end_time + meeting_date AS datetime)";
                        $sql = "SELECT * FROM room_details WHERE room_name='Small Room 1'";
                        $res = $conn->query($sql);
                        if ($res->num_rows > 0) {
                            while ($row = $res->fetch_assoc()) { ?>
                                <div class="room-tag"><?php 
                                if($currentTime !== $meeting_time) {
                                    echo "Available";
                                } else {
                                    echo "Unavailable";
                                }
                                ?></div>
                                <div class="room-image">

                                    <img src="<?php echo $row['picture'] ?>" ;" class="room-thumb" alt="Image">
                                </div>
                                <div class="room-info">
                                    <h2 class="room-name">
                                        <?php echo $row['room_name']; ?>
                                    </h2>
                                    <div class="room-card_hr"></div>
                                    <ul class="room-details">
                                        <li>
                                            <?php echo $row['floor']; ?>
                                        </li>
                                        <li>
                                            <?php echo $row['phase']; ?>
                                        </li>
                                        <li>
                                            <?php echo $row['dept']; ?>
                                        </li>
                                        <li>
                                            <?php echo $row['number_person']; ?>
                                        </li>
                                    </ul>
                                    <div class="room-card_hr"></div>
                                    <button type="submit" class="book-btn">
                                        <?php echo "<a style='text-decoration:none; color:white;' href='booking.php?roomid={$row['id']}'> 
                                        Book Now</a>"; ?>
                                    </button>
                                </div>

                        <?php }
                        }
                        ?>
                    </div>

                    <div class="room-card">
                        <?php
                        $sql = "SELECT * FROM room_details WHERE room_name='Small Room 2'";
                        $res = $conn->query($sql);
                        if ($res->num_rows > 0) {
                            while ($row = $res->fetch_assoc()) { ?>
                                <div class="room-tag">Available</div>
                                <div class="room-image">

                                    <img src="<?php echo $row['picture'] ?>" ;" class="room-thumb" alt="Image">
                                </div>
                                <div class="room-info">
                                    <h2 class="room-name">
                                        <?php echo $row['room_name']; ?>
                                    </h2>
                                    <div class="room-card_hr"></div>
                                    <ul class="room-details">
                                        <li>
                                            <?php echo $row['floor']; ?>
                                        </li>
                                        <li>
                                            <?php echo $row['phase']; ?>
                                        </li>
                                        <li>
                                            <?php echo $row['dept']; ?>
                                        </li>
                                        <li>
                                            <?php echo $row['number_person']; ?>
                                        </li>
                                    </ul>
                                    <div class="room-card_hr"></div>
                                    <button type="submit" class="book-btn">
                                        <?php echo "<a style='text-decoration:none; color:white;' href='booking.php?roomid={$row['id']}'> 
                                        Book Now</a>"; ?>
                                    </button>
                                </div>

                        <?php }
                        }
                        ?>
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

</html>