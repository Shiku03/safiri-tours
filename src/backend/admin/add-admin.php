<?php
include("../constants/db-connect.php");
include("../partials/menu.php");
?>
<form action="" method="post" class="form">

    <div>
        <label for="fullname">Fullname: </label>
        <input type="text" name="fullname" id="fullname" required>
    </div>

    <div>
        <label for="position">Position: </label>
        <input type="text" name="position" id="position" required>
    </div>

    <div>
        <label for="password">Password: </label>
        <input type="password" name="password" id="password" required>
    </div>

    <div>
        <input  type="submit" name="submit" value="Add admin" class="add-submit submit" required>
    </div>

</form>

<?php
include("../partials/footer.php");
?>

<?php
$siteurl="http://localhost:3000/src/backend/admin/admin.php";
//FORM SUBMISSION
//check if submit button is clicked
//set variables for the data to be submitted

if(isset($_POST['submit'])){
$fullname= $_POST['fullname'];
$position= $_POST['position'];
$password= md5($_POST['password']);

//create a query to insert data into the database

$sql= "INSERT INTO admin_tbl(fullname,position,password) VALUES('$fullname', '$position', '$password');";

//execute the query
$result= $conn->query($sql);
if($result){
    //echo "Admin added successfully";
    header("location:" .$siteurl);
    $_SESSION['add']= "Admin added successfully";
} else {
    //echo "Failed to add admin";
    header("location:" .$siteurl);
    $_SESSION['add']= "Failed to add admin";

}

} 

?>