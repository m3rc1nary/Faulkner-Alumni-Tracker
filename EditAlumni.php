<?php
/*
 * Display Users to edit and delete them.
 *
 * @author Robert Vines
 */

    include ('Headers/Header.php');
?>
<?php
//    if(isset($_GET['delete_id']))
//    {               
//        $employeeId = $_GET['delete_id'];
//        
//        $sql="DELETE schoolemployee.*, login.* FROM schoolemployee "
//                . "JOIN login "
//                . "ON schoolemployee.Login_LoginID=login.LoginID WHERE EmployeeID=".$employeeId;
//        $pdo->query($sql);
//        
//        header("Location: EditUser.php");
//    }
?>
<div id='page'>
        <div id="body">
            <h2>Select Alumni to Edit</h2>
            <p><a href="CreateAlumni.php"><button id="button" type="submit">Add Alumni</button></a></p>
            <table style="float: left;">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Primary Email</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        //get info from form
                        $sql2 = "SELECT person.PersonID, person.FirstName, Person.LastName, person.PrimaryEmail"
                                . " FROM person "
                                . " ORDER BY FirstName";

                        $result = $pdo->query($sql2);
                           
                        while($val=$result->fetch()):
                        
                        $personId = $val['PersonID'];
                        $firstName = $val['FirstName'];
                        $lastName = $val['LastName'];
                        $primEmail = $val['PrimaryEmail'];
                    ?>
                    <tr>
                        <td><?php echo $firstName; ?></td>
                        <td><?php echo $lastName; ?></td>
                        <td><?php echo $primEmail; ?></td>
                        <td><a href="EditAlumni.php?view=<?php echo $personId ?>"><button type="button">View</button></a></td>
                    </tr>
                    <?php
                        endwhile;
                    ?>
                </tbody>
            </table>
            <?php 
            if(isset($_GET['view']))
            {               
                $personId = $_GET['view'];

                $sql3="SELECT person.FirstName, person.MiddleName, person.LastName, person.PrimaryEmail, person.SecondEmail, "
                        . "person.Tracked, address.StreetAddress, address.City, address.State, address.ZipCode, address.Country, "
                        . "address.CellNum, address.WorkNum, address.HomeNum, gradschool.Applied, gradschool.Accepted, "
                        . "gradschool.Status, gradschool.University_UniversityID, graduated.MonthGraduated, graduated.YearGraduated, "
                        . "graduated.Degree_MajorID, graduated.Degree_MinorID, employment.CurrentJob, employment.InField, employment.Employer_EmployerID "
                        . "FROM person "
                        . "JOIN address "
                        . "ON address.Person_PersonID = person.PersonID "
                        . "JOIN gradschool "
                        . "ON gradschool.Person_PersonID = person.PersonID "
                        . "JOIN graduated "
                        . "ON graduated.Person_PersonID = person.PersonID "
                        . "JOIN employment "
                        . "ON employment.Person_PersonID = person.PersonID "
                        . "WHERE PersonID='".$personId."' ";

                $result = $pdo->query($sql3);

                while($val=$result->fetch()):
                    
                    $firstName = $val['FirstName'];
                    $middleName = $val['MiddleName'];
                    $lastName = $val['LastName'];               
                    $primEmail = $val['PrimaryEmail'];
                    $secEmail = $val['SecondEmail'];
                    $tracked = $val['Tracked'];
                    $streetAdd = $val['StreetAddress'];
                    $city = $val['City'];
                    $state = $val['State'];
                    $zip = $val['ZipCode'];
                    $country = $val['Country'];
                    $cell = $val['CellNum'];
                    $work = $val['WorkNum'];
                    $home = $val['HomeNum'];
                    $applied = $val['Applied'];
                    $accepted = $val['Accepted'];
                    $status = $val['Status'];
                    $schoolId = $val['University_UniversityID'];
                    $monthGrad = $val['MonthGraduated'];
                    $yearGrad = $val['YearGraduated'];
                    $majorId = $val['Degree_MajorID'];
                    $minorId = $val['Degree_MinorID'];
                    $currentJob = $val['CurrentJob'];
                    $inField = $val['InField'];
                    $empID = $val['Employer_EmployerID'];

                    endwhile;
                    ?>
                    <table style="float:right; position: relative;">
                        
                        <tr>
                            <th colspan="2">Personal Info</td>
                        </tr>
                        <tr>
                            <td>First Name: </td>
                            <td><?php echo $firstName; ?></td>
                        </tr>
                        <tr>
                            <td>Middle Name: </td>
                            <td><?php echo $middleName; ?></td>
                        </tr>
                        <tr>
                            <td>Last Name: </td>
                            <td><?php echo $lastName; ?></td>
                        </tr>
                        <tr>
                            <td>Primary Email: </td>
                            <td><?php echo $primEmail; ?></td>
                        </tr>
                        <tr>
                            <td>Second Email: </td>
                            <td><?php echo $secEmail; ?></td>
                        </tr>
                        <tr>
                            <td>Tracked:</td>
                            <td>
                                <?php 
                                if ($tracked == 0)
                                {
                                    echo 'Yes'; 
                                }
                                else 
                                {
                                    echo 'No';
                                } ?>
                            </td>
                        </tr>
                        <tr>
                            <th colspan="2">Address</th>
                        </tr>
                        <tr>
                            <td>Street:</td>
                            <td><?php echo $streetAdd; ?></td>
                        </tr>
                        <tr>
                            <td>City:</td>
                            <td><?php echo $city; ?></td>
                        </tr>
                        <tr>
                            <td>State:</td>
                            <td><?php echo $state; ?></td>
                        </tr>
                        <tr>
                            <td>Country</td>
                            <td><?php echo $country; ?></td>
                        </tr>
                        <tr>
                            <td>Zip Code:</td>
                            <td><?php echo $zip; ?></td>
                        </tr>
                        <tr>
                            <th colspan="2">Phone Numbers</th>
                        </tr>
                        <tr>
                            <td>Cell:</td>
                            <td><?php echo $cell; ?></td>
                        </tr>
                        <tr>
                            <td>Work Number:</td>
                            <td><?php echo $work; ?></td>
                        </tr>
                        <tr>
                            <td>Home Number:</td>
                            <td><?php echo $home; ?></td>
                        </tr>
                        <tr>
                            <th colspan="2">Degrees</th>
                        </tr>
                        <tr>
                            <td>Major Type:</td>
                            <td>
                                <?php
                                    $sql4 = "SELECT Type FROM degree WHERE DegreeID= ".$majorId;
                                    $result = $pdo->query($sql4);
                                    
                                    while($val=$result->fetch()):
                                        
                                    $type = $val['Type'];
                                    
                                    endwhile;
                                        
                                    echo $type;
                                ?></td>
                        </tr>
                        <tr>
                            <td>Major Name:</td>
                            <td>
                                <?php
                                    $sql5 = "SELECT Name FROM degree WHERE DegreeID= ".$majorId;
                                    $result = $pdo->query($sql5);
                                    
                                    while($val=$result->fetch()):
                                        
                                    $major = $val['Name'];
                                    
                                    endwhile;
                                        
                                    echo $major;
                                ?></td>
                        </tr>
                        <tr>
                            <td>Minor:</td>
                            <td>
                                <?php
                                    $sql6 = "SELECT Name FROM degree WHERE DegreeID= ".$minorId;
                                    $result = $pdo->query($sql6);
                                    
                                    while($val=$result->fetch()):
                                        
                                    $minor = $val['Name'];
                                    
                                    endwhile;
                                        
                                    echo $minor;
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Month Graduated:</td>
                            <td><?php echo $monthGrad; ?></td>
                        </tr>
                        <tr>
                            <td>Year graduated:</td>
                            <td><?php echo $yearGrad; ?></td>
                        </tr>
                        <tr>
                            <th colspan="2">Graduate School</th>
                        </tr>
                        <tr>
                            <td>Applied:</td>
                            <td><?php 
                                if ($applied == 0)
                                {
                                    echo 'Yes'; 
                                }
                                else 
                                {
                                    echo 'No';
                                } ?></td>
                        </tr>
                        <tr>
                            <td>Accepted:</td>
                            <td><?php echo $accepted; ?></td>
                        </tr>
                        <tr>
                            <td>Status:</td>
                            <td rowspan="3"><?php echo $status; ?></td>
                        </tr>
                        <tr><td></td></tr>
                        <tr><td></td></tr>
                        
                        <tr>
                            <td>School:</td>
                            <td>
                                <?php
                                    $sql7 = "SELECT UniName FROM university WHERE UniversityID= ".$schoolId;
                                    $result = $pdo->query($sql7);
                                    
                                    while($val=$result->fetch()):
                                        
                                    $uniName = $val['UniName'];
                                    
                                    endwhile;
                                        
                                    echo $uniName;
                                ?></td>
                        </tr>
                        <tr>
                            <th colspan="2">Employment</th>
                        </tr>
                        <tr>
                            <td>Job Title:</td>
                            <td><?php echo $currentJob; ?></td>
                        </tr>
                        <tr>
                            <td>In Field</td>
                            <td><?php 
                                if ($inField == 0)
                                {
                                    echo 'Yes'; 
                                }
                                else 
                                {
                                    echo 'No';
                                }
                                ?></td>
                        </tr>
                        <tr>
                            <td>Employer Name:</td>
                            <td><?php
                                    $sql8 = "SELECT EmployerName FROM employer WHERE EmployerID= ".$empID;
                                    $result = $pdo->query($sql8);
                                    
                                    while($val=$result->fetch()):
                                        
                                    $empName = $val['EmployerName'];
                                    
                                    endwhile;
                                        
                                    echo $empName;
                                ?></td>
                        </tr>
                        <tr>
                            <td>Company:</td>
                            <td>
                                <?php
                                    $sql8 = "SELECT EmployerComp FROM employer WHERE EmployerID= ".$empID;
                                    $result = $pdo->query($sql8);
                                    
                                    while($val=$result->fetch()):
                                        
                                    $empComp = $val['EmployerComp'];
                                    
                                    endwhile;
                                        
                                    echo $empComp;
                                ?></td>
                        </tr>
                        <tr>
                            <td>Number:</td>
                            <td>
                                <?php
                                    $sql9 = "SELECT EmployerNum FROM employer WHERE EmployerID= ".$empID;
                                    $result = $pdo->query($sql9);
                                    
                                    while($val=$result->fetch()):
                                        
                                    $empNum = $val['EmployerNum'];
                                    
                                    endwhile;
                                        
                                    echo $empNum;
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td>
                                <?php
                                    $sql9 = "SELECT EmployerEmail FROM employer WHERE EmployerID= ".$empID;
                                    $result = $pdo->query($sql9);
                                    
                                    while($val=$result->fetch()):
                                        
                                    $empEmail = $val['EmployerEmail'];
                                    
                                    endwhile;
                                        
                                    echo $empEmail;
                                ?>
                            </td>
                        </tr>
                        <tr><td><a href="EditAlumniForm.php?edit_id=<?php echo $personId ?>"><button type="button">Edit</button></a></td>
                            <td><a href="EditAlumni.php?delete_id=<?php echo $personId ?>" onclick="return confirm('Are you sure you want to delete this Alumni?');"><button type="button">Delete</button></a></td></tr>
                    </table>          

                    <?php  
            }//end if(isset($_GET['view']))
            ?>
        </div>
</div>
    </body>
</html>