<?php
/* 
 * Editing a university name
 * 
 * @author: Robert Vines
 */

    include('UserSession_Admin.php');  

    $uniID = $_GET['edit_id'];
    
    $sql="SELECT * FROM university WHERE UniversityID=".$uniID;
    $result = $pdo->query($sql);
    $val=$result->fetch();
    
    $uniId = $val['UniversityID'];
    $uniName = $val['UniName'];
?>
<html>
    <head>
        <title>Edit University</title>
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
                <li><a id="user" href="EditUser.php">User</a></li>
                <li><a href="EditMajor.php">Major</a></li>
                <li><a href="EditDepartment.php">Department</a></li>
                <li><a href="EditEmployer.php">Employer</a></li>
                <li><a href="EditUniversity.php">University</a></li>
                <li><a href="EditAlumni.php">Alumni</a></li>
            </ul>
        </div>
        <div id="body">
            <h2>Edit University</h2>
            <form method='post' action='EditUniversityController.php?edit_id=<?php echo $uniId ?>'>
                <table id="tablebody">
                    <tr>
                        <th>University Name:</th>
                        <th><input type="text" name="uniName" value="<?php echo $uniName;?>"></th>
                    </tr>
                </table>
                <br>
                <input type="submit" value="Save University">
            </form>
        </div>
    </body>
</html>