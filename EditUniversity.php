<?php

/* 
 * Display user information to update and delete.
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
        <title>Create University</title>
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
