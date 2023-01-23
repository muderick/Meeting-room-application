<?php

        // servername => localhost
        // username => root
        // password => empty
        // database name => staff
        session_start();

        require_once('conndb.php');
        include('connection.php');
        include("functions.php");
        $user_data = check_login($con);
        
        // Taking all 5 values from the form data(input)
        $meeting_date = $_REQUEST['select_date'];
        $start_time = $_REQUEST['start_time'];
        $end_time = $_REQUEST['end_time'];
        $book_date = date('mm/dd/YY');
        $user_name = $user_data['user_name'];


        $sql = "INSERT INTO room_reservation(meeting_date, start_time, end_time, book_date, user_name) VALUES ('$meeting_date',
			'$start_time','$end_time','$book_date','$user_name')";

        if (mysqli_query($con, $sql)) {
            echo 'Booked Successfully';
            header( "Location: index.php" );
        } else {
            echo "ERROR: Sorry $sql. "
                . mysqli_error($conn);
        }
        ?>