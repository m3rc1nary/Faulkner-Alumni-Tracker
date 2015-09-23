<?php
/* 
 * Form to collect alumni information.
 * 
 * @author: Robert Vines
 */

    include('Header.php');
?>

        <div id="body">
            <h2>Edit Alumni</h2>
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
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Job Title</th>
                                                <th>In Field</th>
                                                <th>Employer Name</th>
                                                <th>Employer Company</th>
                                                <th>Employer Email</th>
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
                                </div> 
                    </div>
                </div>
                <input type="submit" value="Save Alumni">
            </form>
        </div>
    </body>
</html>