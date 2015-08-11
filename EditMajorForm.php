<?php

/*
 * Form to edit a major.
 *
 * @author Robert Vines
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