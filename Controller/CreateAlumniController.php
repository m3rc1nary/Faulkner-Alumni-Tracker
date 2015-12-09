<?php

/* 
 * Send CreateAlumni information to specific tables in the database.
 * 
 * @author: Robert Vines
 */

/*Show all values in post array*/
//    echo "<pre>";
//    print_r($_POST);
//    echo "</pre>";

    include($_SERVER["DOCUMENT_ROOT"]. '/AlumniTracker/Database/Config.php');

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
    
    //post to person table
    $sql= "INSERT INTO person (FirstName, MiddleName, LastName, PrimaryEmail, SecondEmail, Tracked) "
         . " VALUES ('".$firstName."', '".$middleName."', '".$lastName."', '".$primEmail."', '".$secEmail."', '".$tracked."')";
    $pdo->query($sql);
    
        //security for sql statments
        $fk = $pdo->prepare("SELECT PersonID FROM person WHERE PrimaryEmail=?");
        $fk->execute(array($primEmail));
        $personId = $fk->fetchColumn();
     
    $sql= "INSERT INTO address (StreetAddress, City, State, ZipCode, Country, "
          . "CellNum, WorkNum, HomeNum, Person_PersonID) "
          . "VALUES ('".$street."', '".$city."', '".$state."', '".$zip."', '".$country."', "
          . "'".$cell."', '".$work."', '".$home."', '".$personId."')";
    $pdo->query($sql);
    
        $fk2 = $pdo->prepare("SELECT UniversityID FROM university WHERE UniName=?");
        $fk2->execute(array($schoolName));
        $sName = $fk2->fetchColumn();
        
             
    $sql= "INSERT INTO gradschool (Applied, Accepted, Status, Person_PersonID, University_UniversityID) "
          . "VALUES ('".$applied."', '".$accepted."', '".$status."', '".$personId."', '".$sName."') ";
    $pdo->query($sql);
    
        $fk3 = $pdo->prepare("SELECT DegreeID FROM degree WHERE Name=?");
        $fk3->execute(array($major));
        $majorId = $fk3->fetchColumn();

        /*get degreeID from degree table to insert into another table*/
        $sql = "SELECT DegreeID FROM degree WHERE Name = '".$minor."' ";
        $pdo->query($sql);

            $result = $pdo->query($sql);

            while($val=$result->fetch()):

            $minorId = $val['DegreeID'];

            endwhile;
            
    $sql= "INSERT INTO graduated (MonthGraduated, YearGraduated, Person_PersonID, Degree_MajorID, Degree_MinorID) "
          . "VALUES ('".$monthGrad."', '".$yearGrad."', '".$personId."', '".$majorId."', '".$minorId."') ";
    $pdo->query($sql);
    
        $fk4 = $pdo->prepare("SELECT EmployerID FROM employer WHERE EmployerName=?");
        $fk4->execute(array($employerName));
        $empName = $fk4->fetchColumn();

    $sql = "INSERT INTO employment (CurrentJob, InField, Person_PersonID, Employer_EmployerID) "
            . "VALUES ('".$currentJob."', '".$inField."', '".$personId."', '".$empName."' )";
    $pdo->query($sql);
    
    //send page back to Alumni.php
    header("Location: /AlumniTracker/View/Alumni.php");
?>