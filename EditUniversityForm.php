<?php
/* 
 * Editing a university name
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