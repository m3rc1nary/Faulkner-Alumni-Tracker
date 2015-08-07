<?php
/* 
 * Form to collect alumni information.
 * 
 * @author: Robert Vines
 */

    if($_SESSION[role]=='Admin')
    {
        include('UserSession_Admin.php');
    }
        if($_SESSION[role]=='Department Chair')
    {
        include('UserSession_chair.php');
    }
    if($_SESSION[role]=='Secretary')
    {   
        include('UserSession_sec.php');
    }
    if($_SESSION[role]=='Dean')
    {   
        include('UserSession_Dean.php');
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
        <img src="Images/AlumniTrackerLogo.jpg" alt="Faulkner University Alumni 
             Tracker" id="logo">
        <div id="header"></div>
        <div id="nav">
            <ul>
                <li><a id="user" href="AdminHome.php">Home</a></li>
                <li><a href="EditUser.php">User</a></li>
                <li><a href="EditMajor.php">Major</a></li>
                <li><a href="EditDepartment.php">Department</a></li>
                <li><a href="EditEmployer.php">Employer</a></li>
                <li><a href="EditUniversity.php">University</a></li>
                <li><a href="EditAlumni.php">Alumni</a></li>
                <li><a id="user" href="Logout.php">Log out</a></li>
            </ul>
        </div>
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
                   <tr id='other'>
                        <th>Street:</th> <th><input type="text" name="Street"></th>
                        <th>City:</th> <th><input type="text" name="City"></th>
                        <th>State:</th> <th><input type="text" name="State"></th>
                   </tr>
                   <tr>
                        <th>Country:</th> <th><input type="text" name="Country"></th>
                        <th>Zip:</th> <th><input type="text" name="Zip"></th>
                   </tr>
                   <tr id='other'>
                        <th>Degree Type:</th>
                        <th><select name="DegreeType">
                               <option>Associates</option>
                               <option>Bachelors</option>
                            </select></th>
                        <th>Major:</th> 
                        <th colspan="2"><select name="Major">
                                <?php 
                                    $sql = "SELECT Major FROM degree";
                                    $result = $pdo->query($sql);
                                    while ($val = $result->fetch()):
                                    $degreeName = $val['Major'];    
                                    {
                                        echo "<option>" . $degreeName . "</option>";
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
                                            <td>Employer Email</td>
                                        </tr>
                                        <tr id="tablebody">
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
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