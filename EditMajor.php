 <?php

/* 
 * Show major information to be edited or deleted
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
        case 'Department Chair':
            include('UserSession_chair.php');
            break;
        case 'Secretary':
            include('UserSession_sec.php');
            break;
        case 'Dean':
            include('UserSession_Dean.php');
            break;
        default :
            header('location:Login.php');
    }    
    include('Config.php');
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

<html>
    <head>
        <title>Edit Major</title>
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
                    case 'Department Chair':
                        include('ChairSecHeader.php');
                        break;
                    case 'Secretary':
                        include('ChairSecHeader.php');
                        break;
                    case 'Dean':
                        include('DeanHeader.php');
                        break;
                }              
         ?>
        <div id="body">
            <h2>Select Major to Edit</h2>
            <p><a href="CreateMajor.php"><button id="button">Add Major</button></a></p>
            <table>
                <tr id="tableHead">
                    <td>College</td>
                    <td>Type</td>
                    <td>Major</td>
                    <td>Department</td>
                    <td> </td>
                    <td> </td>
                </tr>
                <?php
                    $sql2 = "SELECT degree.DegreeID, degree.Type, degree.Major, degree.College, department.DeptName"
                            . " FROM degree "
                            . "JOIN department "
                            . "ON degree.Department_DepartmentID = department.DepartmentID ";
                    $result = $pdo->query($sql2);
                       
                    while($val=$result->fetch()):
                    
                    $degreeID = $val['DegreeID'];
                    $degreeCollege = $val['College'];
                    $degreeType = $val['Type'];
                    $degreeMajor = $val['Major'];
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
            </table>
        </div>
    </body>
</html>
