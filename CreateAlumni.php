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
            <h2>Create Alumni</h2>
            <form method='post' action="CreateAlumniController.php">
                <table>
                   <tr>
                        <td style="border:white">First Name:</td> <td style="border:white"><input type="text" name="FirstName"></td>
                        <td style="border:white">Middle Name:</td> <td style="border:white"><input type="text" name="MiddleName"></td>
                        <td style="border:white">Last Name:</td> <td style="border:white"><input type="text" name="LastName"></td>
                   </tr>
                   <tr style="background-color : white">
                        <td style="border:white">Cell Number:</td> <td style="border:white"><input type="text" name="CellNum"></td>
                        <td style="border:white">Home Number:</td> <td style="border:white"><input type="text" name="HomeNum"></td>
                        <td style="border:white">Work Number:</td> <td style="border:white"><input type="text" name="WorkNum"></td>
                   </tr>
                   <tr>
                        <td style="border:white">Primary Email:</td> <td style="border:white"><input type="email" name="FirstEmail"></td>
                        <td style="border:white">Secondary Email:</td> <td style="border:white"><input type="email" name="SecondEmail"></td>
                        <td style="border:white">Tracked:</td>   
                        <td style="border:white"><select name="Tracked">
                                <option>Yes</option>
                                <option>No</option>
                            </select></td>
                   </tr>
                   <tr style="background-color : white">
                        <td style="border:white">Street:</td> <td style="border:white"><input type="text" name="Street"></td>
                        <td style="border:white">City:</td> <td style="border:white"><input type="text" name="City"></td>
                        <td style="border:white">State:</td> <td style="border:white"><input type="text" name="State"></td>
                   </tr>
                   <tr>
                        <td style="border:white">Country:</td> <td style="border:white"><input type="text" name="Country"></td>
                        <td style="border:white">Zip:</td> <td style="border:white"><input type="text" name="Zip"></td>
                        <td style="border:white"></td><td style="border:white"></td>
                   </tr>
                   <tr style="background-color : white">
                       <td style="border:white">Major Type:</td>
                       <td style="border:white"><select name="MajorType">
                                <?php 
                                        $sql = "SELECT DISTINCT Type FROM degree";
                                        $result = $pdo->query($sql);
                                        while ($val = $result->fetch()):
                                        $degreeType = $val['Type'];
                                        
                                        {
                                            echo "<option>" . $degreeType . "</option>";
                                        }endwhile;
                                    ?>
                            </select></td>
                        <td style="border:white">Major:</td>
                        <td style="border:white"><select name="Major">
                                <?php 
                                        $sql = "SELECT * FROM degree";
                                        $result = $pdo->query($sql);
                                        while ($val = $result->fetch()):
                                        $degreeName = $val['Major'];
                                        
                                        {
                                            echo "<option>" . $degreeName  . "</option>";
                                        }endwhile;
                                    ?>
                            </select></td>
                            <td style="border:white"></td><td style="border:white"></td>
                   </tr>
                   <tr>
                       <td style="border:white">Minor Type:</td>
                       <td style="border:white"><select name="MinorType">
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
                            </select></td>
                        <td style="border:white">Minor:</td>
                        <td style="border:white"><select name="Minor">
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
                            </select></td>
                            <td style="border:white"></td><td style="border:white"></td>
                   </tr>
                   <tr style="background-color : white">
                        <td style="border-color:white">Month Graduated:</td>
                        <td style="border-color:white"><select name="MonthGrad">
                                <option>January</option><option>February</option>
                                <option>March</option><option>April</option>
                                <option>May</option><option>June</option>
                                <option>July</option><option>August</option>
                                <option>September</option><option>October</option>
                                <option>November</option><option>December</option>
                            </select></td>
                        <td style="border-color:white">Year Graduated:</td> <td style="border-color:white"><input type="text" name="YearGrad"></td>
                        <td style="border-color:white"></td>
                        <td style="border-color:white"></td>
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
                                                <th>Job Title</th>
                                                <th>In Field</th>
                                                <th>Employer Name</th>
                                                <th>Employer Company</th>
                                                <th>Employer Number</th>
                                                <th>Employer Email</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td></td>
                                                <td><select name="InField">
                                                        <option>Yes</option>
                                                        <option>No</option>
                                                    </select></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div> 
                    </div> 
                    <div class="tab">
                        <input type="radio" id="tab-2" name="tab-group-1">
                            <label for="tab-2"><b>Grad School</b></label> 
                                <div class="content">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Applied</th>
                                                <th>Accepted</th>
                                                <th>Status</th>
                                                <th>School Name</th>
                                                <th>Degree</th>
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
                                </div> 
                    </div>
                </div>
                <input type="submit" value="Create Alumni">
            </form>
        </div>
    </body>
</html>