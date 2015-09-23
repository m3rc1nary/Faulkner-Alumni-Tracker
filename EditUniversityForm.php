<?php
/* 
 * Editing a university name
 * 
 * @author: Robert Vines
 */

    include('Header.php');

    $uniID = $_GET['edit_id'];
    
    $sql="SELECT * FROM university WHERE UniversityID=".$uniID;
    $result = $pdo->query($sql);
    $val=$result->fetch();
    
    $uniId = $val['UniversityID'];
    $uniName = $val['UniName'];
?>

        <div id="body">
            <h2>Edit University</h2>
            <form method='post' action='EditUniversityController.php?edit_id=<?php echo $uniId ?>'>
                <table id="formTable">
                    <tr>
                        <td>University Name:</td>
                        <td><input type="text" name="uniName" value="<?php echo $uniName;?>" /></td>
                    </tr>
                </table>
                <br>
                <input type="submit" value="Save University" />
            </form>
        </div>
    </body>
</html>