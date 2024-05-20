<?php
    $conn = mysqli_connect("localhost","root", "","pms");

    $query = mysqli_query($conn, "SELECT * FROM drug WHERE drug_name LIKE '%".$_POST['name']."%'");
    while($row = mysqli_fetch_array($query)){
        ?>
        <tr>
            <td><?php echo $row['drug_name']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $row['expired_date']; ?></td>
        </tr>
        <?php
    }
?>