<?php

/* 
 * Form to create an alumni.
 * 
 * @author: Robert Vines
 */

    include('Headers/Header.php');  
?>
<div id='page'>
        <div id="body">
            <h2>Create Employer</h2>
            <form method='post' action="CreateEmployerController.php">
                <table id="formTable">
                    <tr>
                        <td>Employer Name:</td><td><input type="text" name="EmpName" /></td>
                    </tr>
                    <tr>
                        <td>Employer Number:</td><td><input type="text" name="EmpNum" placeholder="123-456-7890" /></td>
                    </tr>
                    <tr>
                        <td>Employer Company:</td><td><input type="text" name="EmpComp" /></td>
                    </tr>
                    <tr>
                        <td>Employer email:</td><td><input type="email" name="EmpEmail" /></td>
                    </tr>
                </table>
                <br>
                <input type="submit" value="Create Employer" />
            </form>
        </div>
</div>
    </body>
</html>
