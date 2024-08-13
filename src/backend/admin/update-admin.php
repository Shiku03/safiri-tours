<?php
include("../constants/db-connect.php");
include("../partials/menu.php");
?>

<?php
//GETS ADMIN DETAILS AND DISPLAYS THEM IN THE FORM
$id=$_GET['id'];
$sql= "SELECT * FROM admin_tbl WHERE id='$id';";
$result = $conn->query($sql);
if($result){
//echo "Query successful";
if($result->num_rows==1){
    //echo "Record found";
    $rows= $result->fetch_assoc();
    $fullname= $rows['fullname'];
    $position = $rows['position'];
} else {
    echo "Admin does not exist";
}
} else {
    echo "Query unsuccessful";
}
?>

<form action="" method="post" class="form">

<div>
    <label for="fullname">Fullname: </label>
    <input type="text" name="fullname" id="fullname" value="<?php echo $fullname; ?>" required>
</div>

<div>
    <label for="position">Position: </label>
    <input type="text" name="position" id="position" value= "<?php echo $position; ?>" required>
</div>


<div>
    <input  type="submit" name="submit" value="Update admin" class="update-submit submit" required>
</div>

</form>

<?php
include("../partials/footer.php");
?>
<?php
//UPDATES ADMIN DETAILS
$siteurl="http://localhost:3000/src/backend/admin/admin.php";
if(isset($_POST['submit'])){
   $fullname=$_POST['fullname'];
   $position=$_POST['position'];

   $sql="UPDATE admin_tbl SET fullname='$fullname', position='$position' WHERE id=$id;";

   $result= $conn->query($sql);
   if($result){
    header("location:" .$siteurl);
    $_SESSION['update']= "Updated admin successfully";
   } else {
    header("location:" .$siteurl);
    $_SESSION['update']= "Failed to update admin ";
   }
}


?>
