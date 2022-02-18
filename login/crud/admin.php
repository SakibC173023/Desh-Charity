<?php
include_once '../Includes/dbh_connect.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>CRUD</title>
    <meta charset="UTF-8">
    <link href="#" rel="stylesheet"type="text/css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" type="text/css">
</head>
<body>
    <h3>All Registered Users</h3>
    <table border="1" style="margin-left: 350px;margin-top: 100px">
    <tr>
        <th>id</th>
        <th>Email</th>
        <th>Password</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>
        <?php
        $sql = "SELECT * FROM users";
        $stmt = connect()->query($sql);
        while($row = $stmt->fetch())
        {
        ?>
        <tr>
            <td><?php echo $row['userID'] ?></td>
            <td><?php echo $row['userEmail'] ?></td>
            <td><?php echo $row['userPass'] ?></td>
            <td><a href="edit_data.php?id=<?php echo $row['userID'] ?>">Update</a></td>
            <td><a href="delete_data.php?id=<?php echo $row['userID'] ?>">Delete</a></td>

        </tr>
            <?php
        }
            if (isset($_GET['error']) == 'userTaken')
            {
                echo "Username is Already Taken";
            }
            elseif (isset($_GET['value']) == 'success')
            {
                echo "Data inserted successfully";
            }
        ?>
    </table>

    <button type="submit" name="submit" class="btn btn-primary" style="margin-left: 350px;margin-top: 30px"><a style="color: white;text-decoration: none" href="add_data.php">Add Data</a></button>
</body>
</html>