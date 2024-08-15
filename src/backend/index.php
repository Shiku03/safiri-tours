<?php
include("constants/db-connect.php");
include("partials/menu.php");
?>
<div class="dashboard">
<?php
$sqlA="SELECT id from admin_tbl ORDER BY id DESC LIMIT 1;";


$resultA=$conn->query($sqlA);

if($resultA){
    //echo "Query successful";
    if($resultA->num_rows>0){
        //echo "Query successful";
        $row=$resultA->fetch_assoc();
        $admin=$row['id'];
        ?>
        <div class="dashboard-item">
        <h2>Admin</h2>
        <p><?php echo $admin ?></p>
    </div>
    <?php
    }
}
?>

<?php
$sqlB="SELECT id from bookings_tbl ORDER BY id DESC LIMIT 1;";
$resultB=$conn->query($sqlB);
if($resultB){
    //echo "Query successful";
    if($resultB->num_rows>0){
        //echo "Query successful";
        $row=$resultB->fetch_assoc();
        $booking=$row['id'];
    ?>
        <div class="dashboard-item">
        <h2>Bookings</h2>
        <p><?php echo $booking ?></p>
    </div>
<?php
    }
}
?>
 

</div>

<?php
include("partials/footer.php");
?>