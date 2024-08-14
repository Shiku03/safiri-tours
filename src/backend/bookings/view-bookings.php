<?php
include("../constants/db-connect.php");
include("../partials/menu.php");
date_default_timezone_set('Africa/Nairobi');
?>
<table class="bookings-table">
    <tbody>

        <tr>
            <th>Id</th>
            <th>Fullname</th>
            <th>Places</th>
            <th>Duration</th>
            <th>Booking Date</th>
        </tr>

        <?php
        $num=1;
        $sql="SELECT * FROM bookings_tbl;";
        $result= $conn->query($sql);
        if($result){
            if($result->num_rows>0){
              while($rows=$result->fetch_assoc()) {
                $fullname=$rows['fullname'];
                $from= $rows['start_pt'];
                $to=$rows['destination'];
                $startDate=$rows['first_day'];
                $endDate=$rows['last_day'];
                $bookingDate=$rows['booking_date'];

                $bookingDatetime= new DateTime($bookingDate, new DateTimeZone('UTC'));
                $bookingDatetime->setTimezone(new DateTimeZone('Africa/Nairobi'));
                $bookingDateEAT = $bookingDatetime->format('Y-m-d H:i:s');
                
?>
                <tr>
                <td><?php echo $num++ ;?></td>
                <td><?php echo $fullname ;?></td>
                <td>From: <?php echo $from ;?> <br> <br>To: <?php echo $to ;?></td>
                <td>Start Date: <?php echo $startDate ;?> <br> <br><?php echo $endDate ;?></td>
                <td><?php echo $bookingDateEAT ;?></td>
            </tr>
            <?php
              }
               
            }
        }
        ?>
       
    </tbody>
</table>

<?php
include("../partials/footer.php");
?>