<?php
include("../constants/db-connect.php");
include("../partials/menu.php");
?>
<?php
if(isset($_SESSION['add'])){
    echo $_SESSION['add'];
    unset ($_SESSION['add']);
}

if(isset($_SESSION['update'])){
    echo $_SESSION['update'];
    unset ($_SESSION['update']);
}

if(isset($_SESSION['delete'])){
    echo $_SESSION['delete'];
    unset ($_SESSION['delete']);
}

?>
<br>

<a href="add-admin.php">
<button class="add-btn">Add admin</button>
</a>


    <table class="admin-table">
        <tbody>
            <tr>
                <th>Id</th>
                <th>Fullname</th>
                <th>Position</th>
                <th colspan= "2">Edit admin</th>
            </tr>
            
                <?php  
                $siteurl="http://localhost:3000/src/backend/admin";
                $num= 1;
                $sql= "SELECT * FROM admin_tbl;";
                $result= $conn->query($sql);
                if($result){
                    //echo "Query successful";
                    if($result->num_rows>0){
                        while($rows=$result->fetch_assoc()){
                            $id= $rows['id'];
                            $fullname= $rows['fullname'];
                            $position= $rows['position'];

                            ?>

                            <tr>

                            <td><?php echo $num++; ?></td>
                            <td><?php echo $fullname; ?></td>
                            <td><?php echo $position; ?></td>
                           <td>
                            <a href="<?php echo $siteurl. "/update-admin.php?id=".$id;?>">
                            <button class="update-btn">Update </button>
                            </a></td>
                           <td>
                            <a href="<?php echo $siteurl. "/delete-admin.php?id=".$id;?>">
                            <button class="delete-btn">Delete </button>
                            </a>
                        </td>
                        </tr>
                        <?php

                        }
                    }
                   
                } else {
                    echo "Query unsuccessful";
                }
                ?>
               
           
            
        </tbody>
    </table>

    <?php
include("../partials/footer.php");
?>