<?php
/* 
 * Form to collect alumni information.
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
        <title>Create Alumni</title>
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
            <h2>Create Alumni</h2>
            <form method='post' action="CreateAlumniController.php">
                <table id="tablebody" id="alumniTable">
                    <tr>
                        <th>First Name:</th> <th><input type="text" name="FirstName"></th>
                        <th>Middle Name:</th> <th><input type="text" name="MiddleName"></th>
                        <th>Last Name:</th> <th><input type="text" name="LastName"></th>
                   </tr>
                   <tr id='other'>
                        <th>Cell Number:</td> <th><input type="text" name="CellNum"></th>
                        <th>Home Number:</th> <th><input type="text" name="HomeNum"></th>
                        <th>Work Number:</th> <th><input type="text" name="WorkNum"></th>
                   </tr>
                   <tr>
                        <th>Primary Email:</th> <th><input type="email" name="FirstEmail"></th>
                        <th>Secondary Email:</td> <th><input type="email" name="SecondEmail"></th>
                        <th>Tracked:</th>   
                        <th><select name="Tracked">
                                <option>Yes</option>
                                <option>No</option>
                            </select></th>
                   </tr>
                   <tr>
                        <th>Street:</th> <th><input type="text" name="Street"></th>
                        <th>City:</th> <th><input type="text" name="City"></th>
                        <th>State:</th> <th><input type="text" name="State"></th>
                   </tr>
                   <tr>
                        <th>Country:</th> <th><input type="text" name="Country"></th>
                        <th>Zip:</th> <th><input type="text" name="Zip"></th>
                   </tr>
                   <tr>
                       <th>Major Type:</th>
                       <th><select name="MajorType">
                                <?php 
                                        $sql = "SELECT DISTINCT Type FROM degree";
                                        $result = $pdo->query($sql);
                                        while ($val = $result->fetch()):
                                        $degreeType = $val['Type'];
                                        
                                        {
                                            echo "<option>" . $degreeType . "</option>";
                                        }endwhile;
                                    ?>
                            </select></th>
                        <th>Major:</th>
                        <th><select name="Major">
                                <?php 
                                        $sql = "SELECT * FROM degree";
                                        $result = $pdo->query($sql);
                                        while ($val = $result->fetch()):
                                        $degreeType = $val['Type'];
                                        $degreeName = $val['Major'];
                                        
                                        {
                                            echo "<option>" . $degreeName  . "</option>";
                                        }endwhile;
                                    ?>
                            </select></th>
                   </tr>
                        <tr>
                       <th>Minor Type:</th>
                       <th><select name="MinorType">
                               <option> </option>
                                <?php 
                                        $sql = "SELECT DISTINCT Type FROM degree";
                                        $result = $pdo->query($sql);
                                        while ($val = $result->fetch()):
                                        $degreeType = $val['Type'];
                                        
                                        {
                                            echo "<option>" . $degreeType . "</option>";
                                        }endwhile;
                                    ?>
                            </select></th>
                        <th>Minor:</th>
                        <th><select name="Minor">
                                <option> </option>
                                <?php 
                                        $sql = "SELECT * FROM degree";
                                        $result = $pdo->query($sql);
                                        while ($val = $result->fetch()):
                                        $degreeType = $val['Type'];
                                        $degreeName = $val['Major'];
                                        
                                        {
                                            echo "<option>" . $degreeName  . "</option>";
                                        }endwhile;
                                    ?>
                            </select></th>
                   </tr>
                   <tr>
                        <th>Month Graduated:</th>
                        <th><select name="MonthGrad">
                                <option>January</option><option>February</option>
                                <option>March</option><option>April</option>
                                <option>May</option><option>June</option>
                                <option>July</option><option>August</option>
                                <option>September</option><option>October</option>
                                <option>November</option><option>December</option>
                            </select></th>
                        <th>Year Graduated:</th> <th><input type="text" name="YearGrad"></th>
                   </tr>
                </table>
                <div class="tabs">
                    <div class="tab">
                        <input type="radio" id="tab-1" name="tab-group-1" checked>
                            <label for="tab-1"><b>Employment</b></label>
                                <div class="content">
                                    <table>
                                        <tr id="tableHead">
                                            <td>Job Title</td>
                                            <td>In Field</td>
                                            <td>Employer Name</td>
                                            <td>Employer Company</td>
                                            <td>Employer Number</td>
                                            <td>Employer Email</td>
                                        </tr>
                                        <tr id="tablebody">
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </table>
                                </div> 
                    </div> 
                    <div class="tab">
                        <input type="radio" id="tab-2" name="tab-group-1">
                            <label for="tab-2"><b>Grad School</b></label> 
                                <div class="content">
                                    <table>
                                        <tr id="tableHead">
                                            <td>Applied</td>
                                            <td>Accepted</td>
                                            <td>Status</td>
                                            <td>School Name</td>
                                            <td>Degree</td>
                                        </tr>
                                        <tr id="tablebody">
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </table>
                                </div> 
                    </div>
                </div>
                <input type="submit" value="Create Alumni">
            </form>
        </div>
    </body>
</html>