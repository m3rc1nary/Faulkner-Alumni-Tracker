<?php
/* 
 * Home page for secretary and department chair.
 * 
 * @author: Robert Vines
 */

    include('Header.php');
?>

<body>
        <div id='page'>
        <div id="body">
          <h1><?php session_start();
                    $fName = $_SESSION[fName];
                    $lName = $_SESSION[lName];
                    echo 'Hello '. $fName .' '. $lName .','; ?></h1>
          <p><a href="CreateAlumni.php"><button id="button">Add Alumni</button></a></p>
            <table>
                <thead>
                <tr>
                    <td>Last Name</td>
                    <td>First Name</td>
                    <td>Month Graduated</td>
                    <td>Year Graduated</td>
                </tr>
                </thead>
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
                <tbody>
                <tr>
                    <td>Vines</td>
                    <td>Robert</td>
                    <td>December</td>
                    <td>2015</td>
                    <?php
//                        endwhile;
                    ?>
                </tr>
                </tbody>
            </table>
        </div>
        </div>
    </body>
</html>