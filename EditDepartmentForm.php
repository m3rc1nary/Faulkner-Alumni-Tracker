<?php
/* 
 * Create a department name for dropbox
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

    $deptID = $_GET['edit_id'];
    
    $sql="SELECT * FROM department WHERE DepartmentID=".$deptID;
    $result = $pdo->query($sql);
    $val=$result->fetch();
    
    $departmentId = $val['DepartmentID'];
    $departmentName = $val['DeptName'];
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
                        include('AdminHeader.php');
                        break;
                    case 'Dean':
                        include('DeanHeader.php');
                        break;
                }              
         ?>
        <div id="body">
            <h2>Edit Department</h2>
            <form method='post' action='EditDepartmentController.php?edit_dept=<?php echo $deptID ?>'>
                <table id="tablebody">
                    <tr>
                        <th>Department Name:</th><th><input type="text" name="DeptName" value="<?php echo $departmentName;?>"></th>
                    </tr>
                </table>
                <br>
                <input type="submit" value="Save Department">
            </form>
        </div>
    </body>
</html>