<?php
/* 
 * Choose an employer to edit or delete.
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
                    $sql="DELETE FROM employer WHERE EmployerID=".$_GET['delete_id'];
                    $result = $pdo->query($sql);           

                    header("Location: EditEmployer.php");
                }
            ?>
            <h2>Select Employer to Edit</h2>
            <p><a href="CreateEmployer.php"><button id="button">Add Employer</button></a></p>
            <table>
                <thead>
                    <tr>
                        <th>Employer Name</th>
                        <th>Employer Number</th>
                        <th>Employer Company</th>
                        <th>Employer Email</th>
                        <th> </th>
                        <th> </th>
                    </tr>
                </theah>
                <tbody>
                    <?php
                        //get info from application
                        $pdo = new PDO($connString, $user, $pass);
                        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        $sql = "SELECT * FROM employer ORDER BY EmployerName";
                        $result = $pdo->query($sql);

                        while($val=$result->fetch()):

                        $empID = $val['EmployerID'];
                        $empName = $val['EmployerName'];    
                        $empNum = $val['EmployerNum'];
                        $empComp = $val['EmployerComp'];
                        $employerEmail = $val['EmployerEmail'];
                    ?>
                    <tr>
                        <td><?php echo $empName; ?></td>
                        <td><?php echo $empNum; ?></td>
                        <td><?php echo $empComp; ?></td>
                        <td><?php echo $employerEmail; ?></td>
                        <td><a href="EditEmployerForm.php?edit_id=<?php echo $empID ?>"><input type="submit" value="Edit"></a></td>
                        <td><a href="EditEmployer.php?delete_id=<?php echo $empID ?>" onclick="return confirm('Are you sure you want to delete this employer?');"><input type="submit" value="Delete"></a></td>
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
