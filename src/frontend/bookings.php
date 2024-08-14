<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Archivo:ital,wght@0,100..900;1,100..900&family=Tenor+Sans&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../styles.css">
    <title>Contact Us</title>
</head>

<body>

    <div class="navbar-container" id="navbar-container" onclick="closeSideNav()"> </div>

    <nav class="sidebar" id="sidebar">
        <ul>
            <li onclick="closeSideNav()"><i class="fa-solid fa-xmark"></i></li>
            <li><i class="fa-solid fa-house"></i><a href="index.html">Home</a></li>
            <li><i class="fa-solid fa-circle-info"></i><a href="about.html">About</a></li>
            <li><i class="fa-solid fa-briefcase"></i><a href="careers.html">Careers</a></li>
            <li><i class="fa-solid fa-address-book"></i><a href="contact.html">Contact</a></li>
            <li><i class="fa-solid fa-address-book"></i><a href="bookings.html">Booking</a></li>
        </ul>

        <footer>
            <p>Copyright 2024. All rights reserved</p>
        </footer>
    </nav>
   
    <div id="content" class="booking-content">

        <nav class="navbar" id="navbar">
            <span onclick="openSideNav()"><i class="fa-solid fa-bars"></i> MENU</span>
            <h1><span>Logo</span></h1>
        </nav>



        <div class="form-container">
            <form action="" class="booking-form" method="post">
                <div>
                    <label for="fullname"> Fullname:

                    </label>
                    <input type="text" name="fullname" required>
                </div>

                <div>
                    <label for="Starting point"> From:
                    </label>
                    <input type="text" name="from" id="Starting-point" required>
                </div>

                <div>
                <label for="Destination"> To:
                    </label>
                    <input type="text" name="to" id="Destination" required>
                </div>

                <div>
                    <label for="Start date"> Start date:
                    </label>
                    <input type="date" name="start" id="Finishing date" required>
                </div>

                <div>
                    <label for="Finishing date"> End date:
                    </label>
                    <input type="date" name="end" id="Finishing date" required>
                </div>

                <div>
                    <input type="submit" value="Book today" class="submit-btn" name="book">

                </div>
            </form>

            <?php
  include("../backend/constants/db-connect.php");
  
        if(isset($_POST['book'])){
            //echo "File submitted";
            $fullname=$_POST['fullname'];
            $from=$_POST['from'];
            $to=$_POST['to'];
            $startDate=$_POST['start'];
            $endDate=$_POST['end'];
            $bookingDate=date('Y-m-d H:i:s');

            $sql= "INSERT INTO bookings_tbl(fullname,start_pt,destination,first_day,last_day,booking_date) VALUES( '$fullname','$from','$to', '$startDate', '$endDate', '$bookingDate')";

            $result=$conn->query($sql);
            if($result){
                echo "Form submitted successfully";
            }
        } else {
            echo "File not submitted";
        }
        ?>
        

        </div>
    </div>

    <script src="../script.js"></script>
</body>

</html>