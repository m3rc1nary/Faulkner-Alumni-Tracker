<?php

/*
 * To create a major to be used in application
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
?>

<html>
    <head>
        <title>Create Degree</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="AlumniTracker.css" type="text/css"/>
        <style>
            table tr td{
                background-color: white;
            }
        </style>
    </head>
    <body>
        <?php 
            session_start();

            switch($session)
                {
                    case 'Admin':
                        include('Headers/AdminHeader.php');
                        break;
                    case 'Department Chair':
                        include('Headers/ChairSecHeader.php');
                        break;
                    case 'Secretary':
                        include('Headers/ChairSecHeader.php');
                        break;
                    case 'Dean':
                        include('Headers/DeanHeader.php');
                        break;
                }              
         ?>
        <div id="body">
            <h2>Create Major</h2>
            <form method='post' action="CreateMajorController.php">
                <table id="tablebody">
                    <tr>
                        <td>College:</td>
                        <td><select name="College">
                                <option>College of Arts and Sciences</option>
                                <option>College of Business</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Type:</td><td><input type="text" name="Type" placeholder="Bachelors,etc."></td>
                    </tr>
                    <tr>
                        <td>Degree:</td><td><input type="text" name="Degree" placeholder="Computer Science,etc."></td>
                    </tr>
                    <tr>
                        <td>Department:</td>
                        <td><select name="Dept">
                                <?php 
                                    $sql = "SELECT DeptName FROM department";
                                    $result = $pdo->query($sql);

                                    while ($val = $result->fetch()):

                                    $deptName = $val['DeptName'];    
                                    {
                                        echo "<option>" . $deptName . "</option>";
                                    }endwhile;
                                ?>
                                </select></td>
                    </tr>
                </table>
                <br>
            <input type="submit" value="Create Major">
            </form>
        </div>
    </body>
</html>
