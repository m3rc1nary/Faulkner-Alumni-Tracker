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
        <style>
            #t tr td{
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
            <h2>Edit Alumni</h2>
            <form method='post' action="CreateAlumniController.php">
                <table id="t">
                   <tr>
                        <td>First Name:</td> <td><input type="text" name="FirstName"></td>
                        <td>Middle Name:</td> <td><input type="text" name="MiddleName"></td>
                        <td>Last Name:</td> <td><input type="text" name="LastName"></td>
                   </tr>
                   <tr>
                        <td>Cell Number:</td> <td><input type="text" name="CellNum"></td>
                        <td>Home Number:</td> <td><input type="text" name="HomeNum"></td>
                        <td>Work Number:</td> <td><input type="text" name="WorkNum"></td>
                   </tr>
                   <tr>
                        <td style=>Primary Email:</td> <td><input type="email" name="FirstEmail"></td>
                        <td>Secondary Email:</td> <td><input type="email" name="SecondEmail"></td>
                        <td>Tracked:</td>   
                        <td><select name="Tracked">
                                <option>Yes</option>
                                <option>No</option>
                            </select></td>
                   </tr>
                   <tr>
                        <td>Street:</td> <td><input type="text" name="Street"></td>
                        <td>City:</td> <td><input type="text" name="City"></td>
                        <td>State:</td> <td><input type="text" name="State"></td>
                   </tr>
                   <tr>
                        <td>Country:</td> <td><input type="text" name="Country"></td>
                        <td>Zip:</td> <td><input type="text" name="Zip"></td>
                        <td></td><td></td>
                   </tr>
                   <tr>
                       <td>Major Type:</td>
                       <td><select name="MajorType">
                                <?php 
                                        $sql = "SELECT DISTINCT Type FROM degree ORDER BY Type";
                                        $result = $pdo->query($sql);
                                        while ($val = $result->fetch()):
                                        $degreeType = $val['Type'];
                                        
                                        {
                                            echo "<option>" . $degreeType . "</option>";
                                        }endwhile;
                                    ?>
                            </select></td>
                        <td>Major:</td>
                        <td><select name="Major">
                                <?php 
                                        $sql = "SELECT Major FROM degree ORDER BY Major";
                                        $result = $pdo->query($sql);
                                        while ($val = $result->fetch()):
                                        $degreeName = $val['Major'];
                                        
                                        {
                                            echo "<option>" . $degreeName  . "</option>";
                                        }endwhile;
                                    ?>
                            </select></td>
                            <td></td><td></td>
                   </tr>
                   <tr>
                       <td>Minor Type:</td>
                       <td><select name="MinorType">
                               <option> </option>
                                <?php 
                                        $sql = "SELECT DISTINCT Type FROM degree ORDER BY Type";
                                        $result = $pdo->query($sql);
                                        while ($val = $result->fetch()):
                                        $degreeType = $val['Type'];
                                        
                                        {
                                            echo "<option>" . $degreeType . "</option>";
                                        }endwhile;
                                    ?>
                            </select></td>
                        <td>Minor:</td>
                        <td><select name="Minor">
                                <option> </option>
                                <?php 
                                        $sql = "SELECT Major FROM degree ORDER BY Major";
                                        $result = $pdo->query($sql);
                                        while ($val = $result->fetch()):
                                        $degreeType = $val['Type'];
                                        $degreeName = $val['Major'];
                                        
                                        {
                                            echo "<option>" . $degreeName  . "</option>";
                                        }endwhile;
                                    ?>
                            </select></td>
                            <td></td><td style="border:white"></td>
                   </tr>
                   <tr>
                        <td>Month Graduated:</td>
                        <td><select name="MonthGrad">
                                <option>January</option><option>February</option>
                                <option>March</option><option>April</option>
                                <option>May</option><option>June</option>
                                <option>July</option><option>August</option>
                                <option>September</option><option>October</option>
                                <option>November</option><option>December</option>
                            </select></td>
                        <td>Year Graduated:</td> <td><input type="text" name="YearGrad"></td>
                        <td></td>
                        <td></td>
                   </tr>
                </table>
                <div class="tabs">
                    <div class="tab">
                        <input type="radio" id="tab-1" name="tab-group-1" checked>
                            <label for="tab-1"><b>Employment</b></label>
                                <div class="content">
                                    <table>
                                        <thead>
                                            <tr>
                                                <td>Job Title</td>
                                                <td>In Field</td>
                                                <td>Employer Name</td>
                                                <td>Employer Company</td>
                                                <td>Employer Email</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr id="tablebody">
                                                <td></td>
                                                <td><select>
                                                        <option>Yes</option>
                                                        <option>No</option>
                                                    </select></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
<!--                                    <table id="tablebody" id="alumniTable">
                                        <tr>
                                            <th>Current Job:</th> <th><input type="text" name="CurrentJob"></th>
                                            <th>In Field:</th>
                                            <th><select name="Field">
                                                <option>Yes</option>
                                                <option>No</option>
                                            </select></th>
                                        </tr>
                                        <tr>
                                            <th>Employer Name:</th> <th><input type="text" name="EmployerName"></th>
                                            <th>Employer Number:</th> <th><input type="text" name="EmployerNum"></th>
                                        </tr>
                                        <tr>
                                            <th>Employer Company:</th> <th><input type="text" name="EmployerComp"></th>
                                        </tr>
                                    </table>-->
                                </div> 
                    </div> 
                    <div class="tab">
                        <input type="radio" id="tab-2" name="tab-group-1">
                            <label for="tab-2"><b>Grad School</b></label> 
                                <div class="content">
                                    <table>
                                        <thead>
                                            <tr>
                                                <td>Applied</td>
                                                <td>Accepted</td>
                                                <td>Status</td>
                                                <td>School Name</td>
                                                <td>Degree</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
<!--                                    <table id="tablebody" id="alumniTable">
                                        <tr>
                                            <th>Applied:</th>
                                            <th><select name="Applied">
                                                    <option>Yes</option>
                                                    <option>No</option>
                                                </select></th>
                                                <th>Accepted:</th>
                                            <th><select name="Accepted">
                                                <option>In Process</option>
                                                <option>Yes</option>
                                                <option>No</option>
                                                </select></th>
                                        </tr>
                                        <tr>
                                            <th>Status:</th> <th><input type="text" name="Status"></th>
                                            <th>School Name:</th> <th><input type="text" name="SchoolName"></th>
                                        </tr>
                                    </table>-->
                                </div> 
                    </div>
                </div>
                <input type="submit" value="Save Alumni">
            </form>
        </div>
    </body>
</html>