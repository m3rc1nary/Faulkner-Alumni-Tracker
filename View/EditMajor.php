 <?php

/* 
 * Show major information to be edited or deleted
 * 
 * @author: Robert Vines
 */
 
    include('Header.php');
?>

<?php
    if(isset($_GET['delete_id']))
    {               
        $degreeID = $_GET['delete_id'];
        
        $sql= "DELETE FROM degree WHERE DegreeID=".$degreeID;
        $pdo->query($sql);
 
        header("Location: EditMajor.php");
    }
?>
<div id='page'>
        <div id="body">
            <h2>Select Major to Edit</h2>
            <p><a href="CreateMajor.php"><button id="button">Add Major</button></a></p>
            <table>
                <thead>
                    <tr id="tableHead">
                        <th>College</th>
                        <th>Type</th>
                        <th>Major</th>
                        <th>Department</th>
                        <th> </th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql2 = "SELECT degree.DegreeID, degree.Type, degree.Name, degree.College, department.DeptName"
                                . " FROM degree "
                                . "JOIN department "
                                . "ON degree.Department_DepartmentID = department.DepartmentID ";
                        $result = $pdo->query($sql2);

                        while($val=$result->fetch()):

                        $degreeID = $val['DegreeID'];
                        $degreeCollege = $val['College'];
                        $degreeType = $val['Type'];
                        $degreeMajor = $val['Name'];
                        $deptName = $val['DeptName'];
                    ?>
                    <tr id="tablebody">
                        <td><?php echo $degreeCollege; ?></td>
                        <td><?php echo $degreeType; ?></td>
                        <td><?php echo $degreeMajor; ?></td>
                        <td><?php echo $deptName; ?></td>
                        <td><a href="EditMajorForm.php?edit_id=<?php echo $degreeID ?>"><button type="button">Edit</button></a></td>
                        <td><a href="EditMajor.php?delete_id=<?php echo $degreeID ?>" onclick="return confirm('Are you sure you want to delete this major?');"><input type="submit" value="Delete"></td>
                    </tr>
                    <?php
                        endwhile;
                    ?>
                </tbody>
            </table>
        </div>
</div>
    </body>
</html>
