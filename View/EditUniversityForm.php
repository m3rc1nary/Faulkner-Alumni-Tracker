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
<div id='page'>
        <div id="body">
            <h1>Edit A University</h1>
            <form method='post' action='/AlumniTracker/Controller/EditUniversityFormController.php?edit_id=<?php echo $uniId ?>'>
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
</div>
    </body>
</html>