<?php

/*
 * Form to edit a major.
 *
 * @author Robert Vines
 */

    if($_SESSION[role]=='Admin')
    {
        include('UserSession_Admin.php');
    }
    if($_SESSION[role]=='Department Chair')
    {
        include('UserSession_chair.php');
    }
    if($_SESSION[role]=='Secretary')
    {   
        include('UserSession_sec.php');
    }
    if($_SESSION[role]=='Dean')
    {   
        include('UserSession_Dean.php');
    }
    
    include('Config.php');
       
    $degreeID = $_GET['edit_id'];
    
    $sql = "SELECT degree.DegreeID, degree.Type, degree.Major, degree.College, department.DeptName"
            . " FROM degree "
            . "JOIN department "
            . "ON degree.Department_DepartmentID = department.DepartmentID WHERE DegreeID=".$degreeID;
    $result = $pdo->query($sql);
    $val=$result->fetch();
    
    $degreeType = $val['Type'];
    $degreeMajor = $val['Major'];
    $degreeCollege = $val['College'];
    $deptName = $val['DeptName'];
    ?>


<html>
    <head>
        <title>Edit Major</title>
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
                <li><a id="user" href="Logout.php">Log out</a></li>
            </ul>
        </div>
        <div id="body">
            <h2>Edit Major</h2>
            <form method='post' action='EditMajorController.php?edit_major=<?php echo $degreeID ?>'>
                <table id="tablebody">
                    <tr>
                        <th>College:</th>
                        <th><select name="College">
                                <option><?php echo $degreeCollege; ?></option>
                                <option>College of Arts and Sciences</option>
                                <option>College of Business</option>
                            </select>
                        </th>
                    </tr>
                    <tr>
                        <th>Type:</th><th><input type="text" name="Type" value="<?php echo $degreeType; ?>"></th>
                    </tr>
                    <tr>
                        <th>Major:</th><th><input type="text" name="Major" value="<?php echo $degreeMajor; ?>"></th>
                    </tr>
                    <tr>
                        <th>Department:</th>
                            <th><select name="Dept">
                                <option><?php echo $deptName; ?></option>
                                <?php 
                                    $sql = "SELECT DeptName FROM department";
                                    $result = $pdo->query($sql);

                                    while ($val = $result->fetch()):

                                    $deptName = $val['DeptName'];    
                                    {
                                        echo "<option>" . $deptName . "</option>";
                                    }endwhile;
                                ?>
                            </select></th>
                    </tr>
                </table>
                <br>
                <input type="submit" value="Save Major">
            </form>
        </div>
    </body>
</html>