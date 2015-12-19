<?php
/* 
 * Create a department name for dropbox
 * 
 * @author: Robert Vines
 */

    include('Header.php');   

    $deptID = $_GET['edit_id'];
    
    $sql="SELECT * FROM department WHERE DepartmentID=".$deptID;
    $result = $pdo->query($sql);
    $val=$result->fetch();
    
    $departmentId = $val['DepartmentID'];
    $departmentName = $val['DeptName'];
?>
<style>
    td {
        font-weight: bold;
    }
</style>

<div id='page'>
    <h1>Edit Department</h1>
        <div id="body"> 
            <form method='post' action='/AlumniTracker/Controller/EditDepartmentController.php?edit_dept=<?php echo $deptID ?>'>
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