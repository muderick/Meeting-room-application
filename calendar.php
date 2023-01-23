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
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://kit.fontawesome.com/07ea819cb9.js" crossorigin="anonymous"></script>
  <!-- <link rel="stylesheet" href="assets\homepage.css"> -->
  <link rel="stylesheet" href="assets\calender.css" />
  <link rel="stylesheet" href="assets\homepage.css" />
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
        <div class="block">
          <ul class="nav-menu">
            <li class="nav-menu">
              <a href="index.php">
                <button class="btn flex">
                  <!-- <i class="fa-regular fa-house-blank"></i> -->
                  <i class="fa-solid fa-house"></i>
                  <!-- <object data="assets\icons\home.svg" class="icon" type=""></object> -->
                  <div class="ml-12 nav--home">Home</div>
                </button>
              </a>
            </li>
            <li class="nav-menu">
              <a href="#">
                <button class="btn flex active">
                  <i class="fa-regular fa-calendar"></i>
                  <!-- <object data="assets\icons\calender.svg" class="icon mt-auto mb-auto" type=""></object> -->
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
                  <!-- <i class="fa-regular fa-gear" ></i> -->
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
    <div class="top-bar" style="width: 960px;height: 90px; ">
      <div class="top_bar flex">
        <div class="greetings">
          <div class="flex">
            <div class="profile-image_div profile--image">
              <img src="assets/images/avatar.png" class="profile_pic" alt="">
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
      <div class="book_hr" style="margin-top:0;"></div>
    </div>


    <div class="book_room" style="padding: 0;">
      <!-- <div class="top_bar flex">
          <div class="greetings">Hello Janet,</div>
          <div class="signing flex">
            <div class="notificaton">
              <object data="assets\icons\notification.svg"></object>
            </div>
            <div class="sign_in">Sign In</div>
            <div class="sign_out">Sign Out</div>
          </div>
        </div> -->
      <div class="calender">
        <div class="calender_inner">
          <div class="header">
            <div class="vertical_hr_booking"></div>
            <h2>Calendar</h2>
          </div>
          <div class="main">
            <div class="left">
              <div class="wrapper">
                <div class="top">
                  <p class="backward"></p>
                  <p class="year-num"></p>
                  <p class="forward"></p>
                </div>
                <div class="button"></div>
              </div>
            </div>
            <div class="right"></div>
          </div>
        </div>

        <div class="timeline">
          <div class="header">
            <div class="vertical_hr_booking"></div>
            <h2>Activity</h2>
          </div>
          <div class="event">
            <?php
            $user_name = $user_data['user_name'];
            $all_meetings = "SELECT meeting_date, start_time, end_time from room_reservation";
            $completed = "SELECT meeting_date, start_time, end_time from room_reservation WHERE  meeting_date < CURRENT_DATE";
            $todays = "SELECT meeting_date, start_time, end_time from room_reservation WHERE  meeting_date = CURRENT_DATE";
            $future = "SELECT meeting_date, start_time, end_time from room_reservation WHERE  meeting_date > CURRENT_DATE";
            $res = mysqli_query($conn, $completed);
            $all = mysqli_query($conn, $all_meetings);
            $result = mysqli_query($conn, $todays);
            $future = mysqli_query($conn, $future);

            if ($row = mysqli_fetch_array($res)) { ?>
              <div class="completed">
                <div class="meeting_header">
                  <h3>Completed</h3>
                </div>
                <div class="completed_data">
                  <h5>Meeting Date: </h5> 
                  <p><?php echo $row['meeting_date']; ?></p>
                </div>
                <div class="completed_data">
                  <h5>Start Time: </h5>
                  <p><?php echo $row['start_time']; ?></p>
                </div>
                <div class="completed_data">
                  <h5>End Time: </h5>
                  <p><?php echo $row['end_time']; ?></p>
                </div>
              </div>
            <?php }
            if ($row = mysqli_fetch_array($result)) { ?>
              <div class="today">
                <div class="meeting_header">
                  <h3>Todays Meeting</h3>
                </div>
                <div class="todays_data">
                  <h5>Meeting Date: </h5>
                  <p><?php echo $row['meeting_date']; ?></p>
                </div>
                <div class="todays_data">
                  <h5>Start Time: </h5>
                  <p><?php echo $row['start_time']; ?></p>
                </div>
                <div class="todays_data">
                  <h5>End Time: </h5>
                  <p><?php echo $row['end_time']; ?></p>
                </div>
              </div>
            <?php }
            if ($row = mysqli_fetch_array($future)) { ?>
              <div class="future">
                <div class="meeting_header">
                  <h3>Future Meetings</h3>
                </div>
                <div class="future_data">
                  <h5>Meeting Date: </h5>
                  <p><?php echo $row['meeting_date']; ?></p>
                </div>
                <div class="future_data">
                  <h5>Start Time: </h5>
                  <p><?php echo $row['start_time']; ?></p>
                </div>
                <div class="future_data">
                  <h5>End Time: </h5>
                  <p><?php echo $row['end_time']; ?></p>
                </div>
              </div>
            <?php }
            ?>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script src="calendar.js"></script>
</body>

</html>