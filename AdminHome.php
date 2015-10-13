<?php
/* 
 * Home page for an admin
 * 
 * @author: Robert Vines
 */
    
    include ('Headers/Header.php');
?>
    <div id="page">
    <div id='body' style=" float:left; width: 40%;">
        <h2><?php session_start();
                $fName = $_SESSION[fName];
                $lName = $_SESSION[lName];
                echo 'Hello '. $fName .' '. $lName .','; 
            ?></h2>
        <h3>Search Users</h3>
        <form method='post' action="AdminHome.php">
            <p>Department: 
                <select name="DeptName">
                    <option> </option>
                      <?php 
                          $sql = "SELECT DeptName FROM department ORDER BY DeptName";
                          $result = $pdo->query($sql);

                          while ($val = $result->fetch()):

                          $deptName = $val['DeptName'];    
                          {
                              echo "<option>" . $deptName . "</option>";
                          }endwhile;
                      ?>
                      </select></p>
            <p>Last Name: <input type="text" name="LastName"></p>
            <p><input type="submit" value="Search"></p>
        </form>
        <?php
        //maybe javascript for getting id from form name = oForm.elements["name"].value; name = "" in input
       ?>
        <table id = "adminHomeUserTable">
            <thead>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Department</th>
            </thead>
        </table>
        <?php

        ?>
        </div>
        <div id="body" style=" width: 40%;">
            <br /><br /><br />
            <h3>Search Alumni</h3>
            <form method='post' action="AdminHome.php">
                <p>Department: 
                    <select name="DeptName">
                        <option> </option>
                          <?php 
                              $sql = "SELECT DeptName FROM department ORDER BY DeptName";
                              $result = $pdo->query($sql);

                              while ($val = $result->fetch()):

                              $deptName = $val['DeptName'];    
                              {
                                  echo "<option>" . $deptName . "</option>";
                              }endwhile;
                          ?>
                          </select></p>
                <p>Last Name: <input type="text" name="LastName"></p>
                <p><input type="submit" value="Search"></p>
            </form>
            <?php
                //maybe javascript for getting id from form name = oForm.elements["name"].value; name = "" in input
           ?>
            <table id = "adminHomeAlumniTable">
                <thead>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Department</th>
                </thead>
            </table>
            <?php

            ?>
        </div>
    </div>
    </body>
</html>