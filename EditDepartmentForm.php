<?php
/* 
 * Create a department name for dropbox
 * 
 * @author: Robert Vines
 */

    include('Headers/Header.php');   

    $deptID = $_GET['edit_id'];
    
    $sql="SELECT * FROM department WHERE DepartmentID=".$deptID;
    $result = $pdo->query($sql);
    $val=$result->fetch();
    
    $departmentId = $val['DepartmentID'];
    $departmentName = $val['DeptName'];
?>
<div id='page'>
        <div id="body">
            <h2>Edit Department</h2>
            <form method='post' action='EditDepartmentFormController.php?edit_dept=<?php echo $deptID ?>'>
                <table id="formTable">
                    <tr>
                        <td>Department Name:</td><td><input type="text" name="DeptName" value="<?php echo $departmentName;?>" /></td>
                    </tr>
                </table>
                <br>
                <input type="submit" value="Save Department" />
            </form>
        </div>
</div>
    </body>
</html>