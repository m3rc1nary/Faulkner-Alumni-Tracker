 <?php

/* 
 * Form to create an university.
 * 
 * @author: Robert Vines
 */
 
    include('Header.php');
?>

        <div id="body">
            <h2>Create University</h2>
            <form method='post' action="CreateUniversityController.php">
                <table id="formTable">
                    <tr>
                        <td>University Name:</td><td><input type="text" name="UniName" /></td>
                    </tr>
                </table>
                <br>
                <input type="submit" value="Create University">
            </form>
        </div>
    </body>
</html>
