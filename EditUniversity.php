<?php

/* 
 * 
 * 
 * @author: Robert Vines
 */

    include('UserSession_Admin.php');    
?>

<html>
    <head>
        <title>Create University</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="AlumniTracker.css" type="text/css"/>
    </head>
    <body>
        <img src="Images/AlumniTrackerLogo.jpg" alt="Faulkner University Alumni 
             Tracker" id="logo">
        <div id="header"></div>
        <div id="nav">
            <ul>
                <li><a id="user" href="AdminHome.php">Home</a></li>
                <li><a href="EditUser.php">User</a></li>
                <li><a href="EditMajor.php">Major</a></li>
                <li><a href="EditDepartment.php">Department</a></li>
                <li><a href="EditEmployer.php">Employer</a></li>
                <li><a href="EditUniversity.php">University</a></li>
                <li><a href="EditAlumni.php">Alumni</a></li>
            </ul>
        </div>
        <div id="body">
            <?php
                if(isset($_GET['delete_id']))
                {               
                    $sql="DELETE FROM university WHERE UniversityID=".$_GET['delete_id'];
                    $pdo->query($sql);           

                    header("Location: EditUniversity.php");
                }
            ?>
            <h2>Select a University to Edit</h2>
            <p><a href="CreateUniversity.php"><button id="button">Add University</button></a></p>
            <table>
                <tr id="tableHead">
                    <td>University Id</td>
                    <td>University Name</td>
                    <td> </td>
                    <td> </td>
                </tr>
                <?php
                    //get info from application
                    
                    $sql = "SELECT * FROM university";
                    $result = $pdo->query($sql);
                    
                    while($val=$result->fetch()):
                         
                    $uniId= $val['UniversityID'];
                    $uniName= $val['UniName'];                  
                ?>
                <tr id="tablebody">
                    <td><?php echo $uniId; ?></td>
                    <td><?php echo $uniName; ?></td>
                    <td><a href="EditUniversityForm.php?edit_id=<?php echo $uniId ?>"><input type="submit" value="Edit"></a></td>
                    <td><a href="EditUniversity.php?delete_id=<?php echo $uniId ?>" onclick="return confirm('Are you sure you want to delete this university?');"><input type="submit" value="Delete"></a></td>
                    <?php
                        endwhile;
                    ?>
                </tr>
            </table>
        </div>
    </body>
</html>
