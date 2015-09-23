<?php

/* 
 * Create a department name for dropbox
 * 
 * @author: Robert Vines
 */

    include('Header.php');
?>

        <div id="body">
            <h2>Create Department</h2>
            <form method='post' action="CreateDepartmentController.php">
                <table id="formTable">
                    <tr>
                        <td>Department Name:</td><td><input type="text" name="DeptName" /></td>
                    </tr>
                </table>
                <br>
                <input type="submit" value="Create Department" />
            </form>
        </div>
    </body>
</html>
