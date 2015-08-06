<?php
/* 
 * Home page for secretary and department chair.
 * 
 * @author: Robert Vines
 */
    //make page secure
    include('UserSession_chair.php');
    
    //include('UserSession_sec.php');
?>

<html>
    <head>
        <title>Home Page</title>
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
                <li><a id="user" href="AdminHome.php"><span id="current">Home</span></a></li>
                <li><a href="EditMajor.php">Major</a></li>
                <li><a href="EditEmployer.php">Employer</a></li>
                <li><a href="EditUniversity.php">University</a></li>
            </ul>
        </div>
        <div id="body">
          <h2>Hello</h2>
          <p><a href="CreateAlumni.php"><button id="button">Add Alumni</button></a></p>
            <table>
                <tr id="tableHead">
                    <td>Last Name</td>
                    <td>First Name</td>
                    <td>Month Graduated</td>
                    <td>Year Graduated</td>
                </tr>
                <?php
                    //get info from application
//                    $pdo = new PDO($connString, $user, $pass);
//                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//                    
//                    $sql = "SELECT * FROM department";
//                    $result = $pdo->query($sql);
//                    
//                    while($val=$result->fetch()):
//                         
//                    $deptId= $val['DepartmentID'];
//                    $deptName= $val['DeptName'];                  
                ?>
                <tr id="tablebody">
                    <td>Vines</td>
                    <td>Robert</td>
                    <td>December</td>
                    <td>2015</td>
                    <?php
//                        endwhile;
                    ?>
                </tr>
            </table>
        </div>
    </body>
</html>