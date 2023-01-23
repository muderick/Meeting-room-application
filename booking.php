<?php include 'conndb.php'; ?>

<?php
session_start();

require_once('conndb.php');
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
  <link rel="stylesheet" href="assets\booking.css" />
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
                  <i class="fa-regular fa-bookmark "></i>
                  <!-- <object data="assets\icons\home.svg" class="icon" type=""></object> -->
                  <div class="ml-12 nav--home">Book a meeting</div>
                </button>
              </a>
            </li>
            <li class="nav-menu">
              <a href="calendar.php">
                <button class="btn flex">
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


    <div class="top-bar" style="width: 960px;height: 90px;">
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
      <div class="book_hr" style="margin-top:0;"></div>
    </div>


    </div>

    <div class="book_room" style="padding:0;">



      <div class="header">
        <div class="vertical_hr_booking"></div>
        <h2>Book a room</h2>
      </div>
      <div>
        <form action="booking_validation.php" method="post" class="general_booking-form">
          <?php
          $roomid = $_GET['roomid'];
          $sql = "SELECT * from room_details WHERE id = $roomid";
          $res = mysqli_query($conn, $sql);
          while ($row = mysqli_fetch_array($res)) { ?>
            <div class="input--container flex">
              <div class="form1">
                <div class="rmName">
                  <label for="rmName">Room Name</label>
                  <input class="rname" type="text" name="rmName" value="<?php echo $row['room_name']; ?>" style="width: 239px" readonly style="font-family:'Gotham pro';" />
                </div>
                <div class="floor">
                  <label for="floor">Floor</label>
                  <input type="text" name="floor" id="" value="<?php echo $row['floor']; ?>" style="width: 239px" readonly />
                </div>
                <div class="phase">
                  <label for="phase">Phase</label>
                  <input type="text" name="phase" value="<?php echo $row['phase']; ?>" readonly />
                </div>
                <div class="dept">
                  <label for="dept">Department</label>
                  <input type="text" name="dept" value="<?php echo $row['dept']; ?>" readonly />
                </div>
              </div>

              <div class="form2">
                <div class="cal">
                  <label for="select_date">Select Date:</label>
                  <input type="date" name="select_date" style="width: 239px" required />
                </div>
                <div class="start_time">
                  <label for="start_time">Starting Time:</label>
                  <input type="time" name="start_time" id="" required />
                </div>
                <div class="end_time">
                  <label for="end_time">Ending Time</label>
                  <input type="time" name="end_time" required />
                </div>
              </div>
            </div>
            <div class="submit">
              <button class="submit_btn" type="submit">
                <div>
                  <object data="assets\icons\bookmark.svg" type=""></object>
                </div>
                <div class="">Book Now</div>
              </button>
            </div>
          <?php }
          ?>
        </form>

        <?php
        $room_id = $_GET['roomid'];
        $meeting_date = $_REQUEST['select_date'];
        $start_time = $_REQUEST['start_time'];
        $end_time = $_REQUEST['end_time'];
        $book_date = date('mm/dd/YY');
        $user_name = $user_data['user_name'];


        $sql = "INSERT INTO room_reservation(room_id, meeting_date, start_time, end_time, book_date, user_name) VALUES ('$room_id, $meeting_date',
      '$start_time','$end_time','$book_date','$user_name')";

        if (mysqli_query($con, $sql)) {
          echo 'Booked Successfully';
        } else {
          echo "ERROR: Sorry $sql. "
            . mysqli_error($conn);
        }
        ?>
      </div>
    </div>
  </section>
  <script src="calendar.js"></script>
</body>

</html>