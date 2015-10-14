<?php

/* 
 * Display user information to update and delete.
 * 
 * @author: Robert Vines
 */

    include('Header.php');
?>
<div id='page'>
        <div id="body">
            <?php
                if(isset($_GET['delete_id']))
                {               
                    $sql="DELETE FROM university WHERE UniversityID=".$_GET['delete_id'];
                    $pdo->query($sql);           

                    header("Location: EditUniversity.php");
                }
            ?>
            <h2>Select a University to Edit</h2>
            <p><a href="CreateUniversity.php"><button id="button">Add University</button></a></p>
            <table>
                <thead>
                    <tr id="tableHead">
                        <th>University Name</th>
                        <th> </th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        //get info from application

                        $sql = "SELECT * FROM university ORDER BY UniName";
                        $result = $pdo->query($sql);

                        while($val=$result->fetch()):

                        $uniId= $val['UniversityID'];
                        $uniName= $val['UniName'];                  
                    ?>
                    <tr id="tablebody">
                        <td><?php echo $uniName; ?></td>
                        <td><a href="EditUniversityForm.php?edit_id=<?php echo $uniId ?>"><input type="submit" value="Edit"></a></td>
                        <td><a href="EditUniversity.php?delete_id=<?php echo $uniId ?>" onclick="return confirm('Are you sure you want to delete this university?');"><input type="submit" value="Delete"></a></td>
                        <?php
                            endwhile;
                        ?>
                    </tr>
                </tbody>
            </table>
        </div>
</div>
    </body>
</html>
