<?php

/* 
 * Page that starts  login session and verifies login information
 * 
 * @author: Robert Vines
 */

    // Start Session because we will save some values to session varaible.
    session_start();
    ob_start();
    // include config file for php connection
            include("Config.php");
    // memebers table name
    $tbl_name="login";
    // Define $myusername and $mypassword
    $myusername=$_POST['UserName']; 
    $mypassword=$_POST['Password']; 
    // To protect MySQL injection
    $myusername = stripslashes($myusername);
    $mypassword = stripslashes($mypassword);
    $myusername = mysql_real_escape_string($myusername);
    $mypassword = mysql_real_escape_string($mypassword);
    //below query will check username and password exists in system or not
    $sql="SELECT * FROM $tbl_name WHERE UserName='$myusername' AND Password='$mypassword'";
    $result = $pdo->query($sql);
    // Mysql_num_row is used for counting table records
    $count = $result->rowCount();
    // If result matched $myusername and $mypassword, table record must be equal to 1 	
    if($count==1)
    {
            $sql2=mysql_query("SELECT UserName,Password FROM $tbl_name WHERE UserName='$myusername'");
            "SELECT schoolemployee.Role, department.DeptName, login.UserName, login.Password"
                                . " FROM schoolemployee "
                                . "JOIN department "
                                . "ON schoolemployee.Department_DepartmentID = department.DepartmentID "
                                . "JOIN login"
                                . " ON schoolemployee.Login_LoginID = login.LoginID"
                    . "WHERE ";
            
            $row=$pdo->query($sql2);
            $_SESSION[type]=$row[0];
            $_SESSION[myusername]=$row[1];
            $_SESSION[name]=$row[2];
    //Depending on type of user we will redirect to various pages		
            if($row[0] == 'abc')	 { header( "location:http://localhost/abc.php"); 	}
            else if($row[0] == 'xyz')	 { header( "location:http://localhost/xyz.php"); 	}
            else if($row[0] == 'Admin')	 { header( "location:Home.php"); 	}
            else    {   header( "location:http://localhost/index.php");  }
    }
    else
    {
            header("location:http://localhost/index.php");
    }
    ob_end_flush();
?>