<?php

/*
 * To create a major to be used in application
 *
 * @author Robert Vines
 */

    include('Headers/Header.php');
?>
<div id='page'>
        <div id="body">
            <h2>Create Major</h2>
            <form method='post' action="CreateMajorController.php">
                <table id="formTable">
                    <tr>
                        <td>College:</td>
                        <td><select name="College">
                                <option>College of Arts and Sciences</option>
                                <option>College of Business</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Type:</td><td><input type="text" name="Type" placeholder="Bachelors,etc." /></td>
                    </tr>
                    <tr>
                        <td>Degree:</td><td><input type="text" name="Degree" placeholder="Computer Science,etc." /></td>
                    </tr>
                    <tr>
                        <td>Department:</td>
                        <td><select name="Dept">
                                <?php 
                                    $sql = "SELECT DeptName FROM department";
                                    $result = $pdo->query($sql);

                                    while ($val = $result->fetch()):

                                    $deptName = $val['DeptName'];    
                                    {
                                        echo "<option>" . $deptName . "</option>";
                                    }endwhile;
                                ?>
                                </select></td>
                    </tr>
                </table>
                <br>
            <input type="submit" value="Create Major" />
            </form>
        </div>
</div>
    </body>
</html>
