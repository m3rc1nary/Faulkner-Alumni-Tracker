<?php
/* 
 * Choose a department name to edit or delete.
 * 
 * @author: Robert Vines
 */

    session_start();
    $session = $_SESSION[role];
    
    switch($session)
    {
        case 'Admin':
            include('UserSession_Admin.php');
            break;
        case 'Dean':
            include('UserSession_Dean.php');
            break;
        default :
            header('location:Login.php');
    }    
    include('Config.php'); 
?>

<html>
    <head>
        <title>Edit Department</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="AlumniTracker.css" type="text/css"/>
    </head>
    <body>
        <?php 
            session_start();

            switch($session)
                {
                    case 'Admin':
                        include('Headers/AdminHeader.php');
                        break;
                    case 'Dean':
                        include('Headers/DeanHeader.php');
                        break;
                }              
         ?>
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
                <tr id="tableHead">
                    <td>Department Name</td>
                    <td> </td>
                    <td> </td>
                </tr>
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
                <tr id="tablebody">
                    <td><?php echo $deptName; ?></td>
                    <td><a href="EditDepartmentForm.php?edit_id=<?php echo $deptId ?>"><input type="submit" value="Edit"></a></td>
                    <td><a href="EditDepartment.php?delete_id=<?php echo $deptId ?>" onclick="return confirm('Are you sure you want to delete this department?');"><input type="submit" value="Delete"></a></td>
                    <?php
                        endwhile;
                    ?>
                </tr>
            </table>
        </div>
    </body>
</html>