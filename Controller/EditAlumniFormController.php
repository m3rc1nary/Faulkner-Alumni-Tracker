<?php

/* 
 * Update an Alumni's information from EditAlumniForm.php
 * 
 * @author: Robert Vines
 */
include('Config.php');

    //get information from EditAlumniForm.php form
    $firstName = $_POST['FirstName'];
    $middleName = $_POST['MiddleName'];
    $lastName = $_POST['LastName'];
    $cell = $_POST['CellNum'];
    $home = $_POST['HomeNum'];
    $work = $_POST['WorkNum'];
    $primEmail = $_POST['FirstEmail'];
    $secEmail = $_POST['SecondEmail'];
    $tracked = $_POST['Tracked'];
    $street = $_POST['Street'];
    $city = $_POST['City'];
    $state = $_POST['State'];
    $country = $_POST['Country'];
    $zip = $_POST['Zip'];
    $degreeType = $_POST['DegreeType'];
    $major = $_POST['Major'];
    $minor = $_POST['Minor'];
    $monthGrad = $_POST['MonthGrad'];
    $yearGrad = $_POST['YearGrad'];
    $currentJob = $_POST['CurrentJob'];
    $inField = $_POST['Field'];
    $employerName = $_POST['EmployerName'];
    $employerNum = $_POST['EmployerNum'];
    $employerComp = $_POST['EmployerComp'];
    $employerEmail = $_POST['EmployerEmail'];
    $applied = $_POST['Applied'];
    $accepted = $_POST['Accepted'];
    $status = $_POST['Status'];
    $schoolName = $_POST['SchoolName'];

    //get id associated with major type and name
    $sql = "SELECT ";
//    $result = $pdo->query($sql);
//        while ($val = $result->fetch()):
//        $degreeType = $val['Type'];
//
//        {
//            echo "<option>" . $degreeType . "</option>";
//        }endwhile;
    
    //get id associated with minor name
    $sql2 = "SELECT ";
//    $result = $pdo->query($sql);
//        while ($val = $result->fetch()):
//        $degreeType = $val['Type'];
//
//        {
//            echo "<option>" . $degreeType . "</option>";
//        }endwhile;
    
    //update person, address, gradschool, graduated, and employment tables
    $sql3 = "UPDATE person, address, gradschool, graduated, employment "
            . "SET "
            . "WHERE ";
    $pdo->query($sql3);
    
//    $sql4="Update schoolemployee, login "
//            . "SET schoolemployee.FirstName='".$firstName."', schoolemployee.LastName='".$lastName."', "
//            . "schoolemployee.Email='".$email."', schoolemployee.Role='".$role."', "
//            . "login.UserName='".$userName."', "
//            . "login.Password='".$password."' "
//            . "WHERE schoolemployee.Login_LoginID = login.LoginID AND EmployeeID='".$employeeId."';";
//    $pdo->query($sql4);

    //After sql return to EditAlumni.php with updated information
    header("Location: /AlumniTracker/View/EditAlumni.php");
?>