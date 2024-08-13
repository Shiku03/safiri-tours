<?php
include("../constants/db-connect.php");
include("../partials/menu.php");
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
                $from= $rows['from'];
                $to=$rows['to'];
                $startDate=$rows['start_date'];
                $endDate=$rows['end_date'];
                $bookingDate=$rows['booking_date'];
?>
                <tr>
                <td><?php echo $num++ ;?></td>
                <td><?php echo $fullname ;?></td>
                <td>From: <?php echo $from ;?> <br> <br>To: <?php echo $to ;?></td>
                <td>Start Date: <?php echo $startDate ;?> <br> <br><?php echo $endDate ;?></td>
                <td><?php echo $bookingDate ;?></td>
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