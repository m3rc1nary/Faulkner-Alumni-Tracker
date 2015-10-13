<?php
/* 
 * Choose a department name to edit or delete.
 * 
 * @author: Robert Vines
 */

    include('Headers/Header.php'); 
?>
<div id='page'>
        <div id="body">
            <?php
                if(isset($_GET['delete_id']))
                {               
                    $sql="DELETE FROM department WHERE DepartmentID=".$_GET['delete_id'];
                    $result = $pdo->query($sql);           

                    header("Location: EditDepartment.php");
                }
            ?>
            <h2>Select Department to Edit</h2>
            <p><a href="CreateDepartment.php"><button id="button">Add Department</button></a></p>
            <table>
                <thead>
                    <tr>
                        <th>Department Name</th>
                        <th> </th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    //get info from application
                    $pdo = new PDO($connString, $user, $pass);
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    
                    $sql = "SELECT * FROM department ORDER BY DeptName";
                    $result = $pdo->query($sql);
                    
                    while($val=$result->fetch()):
                         
                    $deptId= $val['DepartmentID'];
                    $deptName= $val['DeptName'];                  
                ?>
                    <tr>
                        <td><?php echo $deptName; ?></td>
                        <td><a href="EditDepartmentForm.php?edit_id=<?php echo $deptId ?>"><input type="submit" value="Edit"></a></td>
                        <td><a href="EditDepartment.php?delete_id=<?php echo $deptId ?>" onclick="return confirm('Are you sure you want to delete this department?');"><input type="submit" value="Delete"></a></td>
                        <?php
                            endwhile;
                        ?>
                    </tr>
                </tbody>
            </table>
        </div>
</div>
    </body>
</html>