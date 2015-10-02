<?php
/* 
 * Form to collect alumni information.
 * 
 * @author: Robert Vines
 */

    include('Header.php');
?>
        <div id="body">
            <h2>Create Alumni</h2>
            <form method='post' action="CreateAlumniController.php">
                <table id="formTable">
                   <tr>
                        <td>First Name:</td> <td><input type="text" name="FirstName" /></td>
                        <td>Middle Name:</td> <td><input type="text" name="MiddleName" /></td>
                        <td>Last Name:</td> <td><input type="text" name="LastName" /></td>
                   </tr>
                   <tr>
                        <td>Cell Number:</td> <td><input type="text" name="CellNum" /></td>
                        <td>Home Number:</td> <td><input type="text" name="HomeNum" /></td>
                        <td>Work Number:</td> <td><input type="text" name="WorkNum" /></td>
                   </tr>
                   <tr>
                        <td style=>Primary Email:</td> <td><input type="email" name="FirstEmail" /></td>
                        <td>Secondary Email:</td> <td><input type="email" name="SecondEmail" /></td>
                        <td>Tracked:</td>   
                        <td><select name="Tracked">
                                <option>Yes</option>
                                <option>No</option>
                            </select></td>
                   </tr>
                   <tr>
                        <td>Street:</td> <td><input type="text" name="Street" /></td>
                        <td>City:</td> <td><input type="text" name="City" /></td>
                        <td>State:</td> <td><input type="text" name="State" /></td>
                   </tr>
                   <tr>
                        <td>Country:</td> <td><input type="text" name="Country" /></td>
                        <td>Zip:</td> <td><input type="text" name="Zip" /></td>
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
                                        $sql2 = "SELECT Name FROM degree ORDER BY Name";
                                        $result2 = $pdo->query($sql2);
                                        while ($val = $result2->fetch()):
                                        $degreeName = $val['Name'];
                                        
                                        {
                                            echo "<option>" . $degreeName  . "</option>";
                                        }endwhile;
                                    ?>
                            </select></td>
                            <td></td><td></td>
                   </tr>
                   <tr>
                        <td>Minor:</td>
                        <td><select name="Minor">
                                <option> </option>
                                <?php 
                                        $sql4 = "SELECT Name FROM degree ORDER BY Name";
                                        $result4 = $pdo->query($sql4);
                                        while ($val = $result4->fetch()):
                                        $degreeType = $val['Type'];
                                        $degreeName = $val['Name'];
                                        
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
                        <td>Year Graduated:</td> <td><input type="text" name="YearGrad" /></td>
                        <td></td>
                        <td></td>
                   </tr>
                </table>
                <div class="tabs">
                    <div class="tab">
                        <input type="radio" id="tab-1" name="tab-group-1" checked>
                            <label for="tab-1"><b>Employment</b></label>
                                <div class="content">
                                    <button id="button" type="submit" style="float: right;" onclick="javascript:void window.open('SelectEmployer.php','1443811554743','width=700,height=500,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');return false;" >Add Employer</button>
                                    <table style="float: left;">
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
                                                <td><input type="text" name="CurrentJob" value="N/A" readonly /></td>
                                                <td><select name="Field">
                                                        <option>Yes</option>
                                                        <option>No</option>
                                                    </select></td>
                                                <td><input type="text" name="EmployerName" value="N/A" readonly /></td>
                                                <td><input type="text" name="EmployerNum" value="000-000-0000" readonly /></td>
                                                <td><input type="text" name="EmployerComp" value="N/A" readonly /></td>
                                                <td><input type="text" name="EmployerEmail" readonly value="N/A@none.com" /></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div> 
                    </div> 
                    <div class="tab">
                        <input type="radio" id="tab-2" name="tab-group-1">
                            <label for="tab-2"><b>Grad School</b></label> 
                                <div class="content">
                                    <a href="CreateAlumni.php"><button id="button" type="submit" style="float: right;">Add Grad School</button></a>
                                    <table style="float: left;">
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
                                                <td><select name="Applied">
                                                        <option>Yes</option>
                                                        <option>No</option>
                                                    </select>  
                                                </td>
                                                <td><select name="Accepted">
                                                        <option>Yes</option>
                                                        <option>No</option>
                                                        <option>In Progress</option>
                                                    </select>
                                                </td>
                                                <td><input type="text" name="Status" value="N/A" readonly /></td>
                                                <td><input type="text" name="SchoolName" value="None" readonly /></td>
                                                <td><input type="text" name="Degree" value="N/A" readonly /></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div> 
                    </div>
                </div>
                <input type="submit" value="Create Alumni" />
            </form>
        </div>
    </body>
</html>