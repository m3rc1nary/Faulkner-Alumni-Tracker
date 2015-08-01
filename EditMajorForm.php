<?php

/*
 * Form to edit a major.
 *
 * @author Robert Vines
 */

    $connString = "mysql:host=localhost;dbname=alumnitracker";
    $user ="root";
    $pass ="root";
    
    $pdo = new PDO($connString, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $degreeID = $_GET['edit_id'];
    
    $sql = "SELECT degree.DegreeID, degree.Type, degree.Major, department.DeptName"
            . " FROM degree "
            . "JOIN department "
            . "ON degree.Department_DepartmentID = department.DepartmentID WHERE DegreeID=".$degreeID;
    $result = $pdo->query($sql);
    $val=$result->fetch();
    
    $degreeType = $val['Type'];
    $degreeMajor = $val['Major'];
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
                <li><a id="user" href="EditUser.php">User</a></li>
                <li><a href="EditMajor.php"><span id="current">Major</span></a></li>
                <li><a href="EditDepartment.php">Department</a></li>
                <li><a href="EditEmployer.php">Employer</a></li>
                <li><a href="EditUniversity.php">University</a></li>
            </ul>
        </div>
        <div id="body">
            <h2>Edit Major</h2>
            <form method='post' action='EditMajorController.php?edit_major=<?php echo $degreeID ?>'>
                <p>Type: 
                    <select name="Type">
                        <option><?php echo $degreeType; ?></option>
                        <option>Associates</option>
                        <option>Bachelors</option>
                    </select></p>
                <p>Major: <input type="text" name="Major" value="<?php echo $degreeMajor; ?>"></p>
                <p>Department: 
                    <select name="Dept">
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
                    </select></p>
                <input type="submit" value="Save Major">
            </form>
        </div>
    </body>
</html>