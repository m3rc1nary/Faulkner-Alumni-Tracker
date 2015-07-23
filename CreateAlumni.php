<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

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
                <li><a id="user" href="CreateAlumni.php"><span id="current">Create Alumni</span></a></li>
            </ul>
        </div>
        <div id="body">
            <h2>Create Alumni</h2>
            <form method='post' action="">
                <table id="tablebody" id="alumniTable">
                    <tr>
                        <th>First Name:</th>
                        <th><input type="text" name="FirstName"></th>
                        <th>Middle Name:</th> 
                        <th><input type="text" name="MiddleName"></th>
                        <th>Last Name:</th> 
                        <th><input type="text" name="LastName"></th>
                   </tr>
                   <tr>
                        <th>Cell Number:</td> 
                        <th><input type="text" name="CellNum"></th>
                        <th>Home Number:</th>
                        <th><input type="text" name="HomeNum"></th>
                        <th>Work Number:</th>
                        <th><input type="text" name="WorkNum"></th>
                   </tr>
                   <tr>
                        <th>Primary Email:</th> 
                        <th><input type="text" name="Firstemail"></th>
                        <th>Secondary Email:</td>
                        <th><input type="text" name="SecondEmail"></th>
                        <th>Tracked:</th>
                        <th><select name="Tracked">
                                <option>Yes</option>
                                <option>No</option>
                            </select></th>
                    </tr>
                    <tr>
                        <th>Degree Type:</th>
                        <th><select name="DegreeType">
                                <option></option>
                            </select></th>
                        <th>Major:</th> 
                        <th><select name="Major">
                               <option></option>
                            </select></th>
                        <th>Month Graduated:</th>
                        <th><input type="text" name="MonthGrad"></th>
                   </tr>
                   <tr>
                        <th>Year Graduated:</th> 
                        <th><input type="text" name="YearGrad"></th>
                        <th>Street:</th> 
                        <th><input type="text" name="Street"></th>
                        <th>City:</th> 
                        <th><input type="text" name="City"></th>
                   </tr>
                   <tr>
                        <th>State:</th> 
                        <th><input type="text" name="State"></th>
                        <th>Country:</th>
                        <th><input type="text" name="Country"></th>
                        <th>Zip:</th>
                        <th><input type="text" name="Zip"></th>
                   </tr>
                </table>
                <div class="tabs">
                    <div class="tab">
                        <input type="radio" id="tab-1" name="tab-group-1" checked>
                            <label for="tab-1">Employment</label>
                                <div class="content">
                                    Current Job: <input type="text" name="Current Job">
                                    <P>In Field:
                                    <select>
                                        <option>Yes</option>
                                        <option>No</option>
                                    </select></p>
                                    <p>Employer Name: <input type="text" name="Current Job"></p>
                                </div> 
                    </div> 
                    <div class="tab">
                        <input type="radio" id="tab-2" name="tab-group-1">
                            <label for="tab-2">Grad School</label> 
                                <div class="content">
                                    Applied: 
                                    <select name="Applied">
                                        <option>Yes</option>
                                        <option>No</option>
                                    </select>
                                    <p>Accepted:
                                    <select>
                                        <option>In Process</option>
                                        <option>Yes</option>
                                        <option>No</option>
                                    </select></p>
                                    <p>Status: <input type="text" name="Status"></p>
                                    <p>School Name:</p>
                                </div> 
                    </div>
                </div>
                <input type="submit" value="Create Alumni">
            </form>
        </div>
    </body>
</html>

