<?php
/* 
 * Choose an employer to edit or delete.
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

<html>
    <head>
        <title>Edit Employer</title>
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
            <?php
                if(isset($_GET['delete_id']))
                {               
                    $sql="DELETE FROM employer WHERE EmployerID=".$_GET['delete_id'];
                    $result = $pdo->query($sql);           

                    header("Location: EditEmployer.php");
                }
            ?>
            <h2>Select Employer to Edit</h2>
            <p><a href="CreateEmployer.php"><button id="button">Add Employer</button></a></p>
            <table>
                <thead>
                    <tr id="tableHead">
                        <th>Employer Name</th>
                        <th>Employer Number</th>
                        <th>Employer Company</th>
                        <th>Employer Email</th>
                        <th> </th>
                        <th> </th>
                    </tr>
                </theah>
                <tbody>
                    <?php
                        //get info from application
                        $pdo = new PDO($connString, $user, $pass);
                        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        $sql = "SELECT * FROM employer ORDER BY EmployerName";
                        $result = $pdo->query($sql);

                        while($val=$result->fetch()):

                        $empID = $val['EmployerID'];
                        $empName = $val['EmployerName'];    
                        $empNum = $val['EmployerNum'];
                        $empComp = $val['EmployerComp'];
                        $employerEmail = $val['EmployerEmail'];
                    ?>
                    <tr id="tablebody">
                        <td><?php echo $empName; ?></td>
                        <td><?php echo $empNum; ?></td>
                        <td><?php echo $empComp; ?></td>
                        <td><?php echo $employerEmail; ?></td>
                        <td><a href="EditEmployerForm.php?edit_id=<?php echo $empID ?>"><input type="submit" value="Edit"></a></td>
                        <td><a href="EditEmployer.php?delete_id=<?php echo $empID ?>" onclick="return confirm('Are you sure you want to delete this employer?');"><input type="submit" value="Delete"></a></td>
                        <?php
                            endwhile;
                        ?>
                    </tr>
                </tbody>
            </table>
        </div>
    </body>
</html>
