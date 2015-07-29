<?php

/* 
 * Send CreateAlumni information to specific tables in the database.
 * 
 * @author: Robert Vines
 */
    //database connection

    //Store form information in variables
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
    $monthGrad = $_POST['MonthGrad'];
    $yearGrad = $_POST['YearGrad'];
    $currentJob = $_POST['CurrentJob'];
    $inField = $_POST['Field'];
    $employerName = $_POST['EmployerName'];
    $employerNum = $_POST['EmployerNum'];
    $employerComp = $_POST['EmployerComp'];
    $applied = $_POST['Applied'];
    $accepted = $_POST['Accepted'];
    $status = $_POST['Status'];
    //$schoolName

    //SQL Statement
?>