<?php
include("../constants/db-connect.php");
include("../partials/menu.php");
?>
<?php
$id=$_GET['id'];
$sql="SELECT * FROM admin_tbl WHERE id='$id';";
$result=$conn->query($sql);
if($result){
    if($result->num_rows==1){
        $rows= $result->fetch_assoc();
        $fullname=$rows['fullname'];
        $position=$rows['position'];
       // echo "Admin can be deleted";
    }
} else {
    echo "Admin does not exist";
}
?>
<form action="" class="delete-form" method="post">
    <p>Are you sure you want to delete <?php echo "<b>$fullname</b>"; ?> as admin?</p>
    <input type="submit" name="cancel" value="NO" class="cancel">
    <input type="submit" name="delete" value="YES" class="delete">
</form>

<?php
include("../partials/footer.php");
?>

<?php
$siteurl="http://localhost:3000/src/backend/admin/admin.php";
if(isset($_POST['cancel'])){
    header("location:" .$siteurl);
    $_SESSION['delete']="Cancelled deleting admin";
}
if(isset($_POST['delete'])){
    $sql= "DELETE FROM admin_tbl WHERE id='$id';";
    $result=$conn->query($sql);
    if($result){
        header("location:" .$siteurl);
        $_SESSION['delete']="Admin deleted successfully";
    }

}

?>